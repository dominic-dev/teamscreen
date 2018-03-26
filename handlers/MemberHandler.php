<?php
require_once('Handler.php');
require_once(dirname(__FILE__) . '/../models/Member.php');

/**
 * Class MemberHandler
 *
 * Authors: Dominic Dingena & Carina Boom
 * Editor: Agung Udijana
 *
 */
class MemberHandler extends Handler {

    /**
     * Take a data row from the database, return it as object.
     *
     * @param array $row the row from the database.
     * @return Member the member dom.
     */
    protected function factory(array $row) : Member {
        $member = new Member();

        $member->setId($row['id']);
        $member->setName($row['name']);
        $member->setUsername($row['username']);
        $member->setDestination($row['destination']);
        $member->setDrinkPreference($row['drink_preference']);
        $member->setWorkingDays($row['working_days']);
        $member->setTeamId($row['team_id']);

        return $member;
    }


    /**
     * Add a member object to the database
     *
     * @param Member $member the member to add.
     * @param int the id of the member on succes, 0 on failure.
     */
    public function add(Member $member): int {
        var_dump($member);
        $query = "INSERT INTO member(name, username, destination, drink_preference, working_days, team_id) 
              VALUES (:name, :username, :destination, :drink_preference, :working_days, :team_id)";
        $statement = $this->dbh->prepare($query);
        $statement->bindValue(':name', $member->getName(), PDO::PARAM_STR);
        $statement->bindValue(':username', $member->getUsername(), PDO::PARAM_STR);
        $statement->bindValue(':destination', $member->getDestination(), PDO::PARAM_STR);
        $statement->bindValue(':drink_preference', $member->getDrinkPreference(), PDO::PARAM_STR);
        $statement->bindValue(':working_days', $member->getWorkingDays(), PDO::PARAM_STR);
        $statement->bindValue(':team_id', $member->getTeamId(), PDO::PARAM_STR);
    
        $this->dbh->beginTransaction();
        try{
            $statement->execute();
            $id = $this->dbh->lastInsertId();
            $this->dbh->commit();
        } catch (Exception $e){
            var_dump($e);
            $this->dbh->rollback();
            return 0;
        }
        $member->setId($id);
        return $id;
    }


    /**
     * Update a member in the database
     *
     * @param Member $member
     * @return bool true if successful, else otherwise
     */
    public function update(Member $member) : bool {
        // Prepare query
        $query = "UPDATE member SET name=:name, username=:username,
                  destination=:destination, drink_preference=:drink_preference,
                  working_days=:working_days, team_id=:team_id WHERE id= :id";
        $statement = $this->dbh->prepare($query);

        // Bind parameters
        $statement->bindValue(':id', $member->getId(), PDO::PARAM_INT);
        $statement->bindValue(':name', $member->getName(), PDO::PARAM_STR);
        $statement->bindValue(':username', $member->getUsername(), PDO::PARAM_STR);
        $statement->bindValue(':destination', $member->getDestination(), PDO::PARAM_STR);
        $statement->bindValue(':drink_preference', $member->getDrinkPreference(), PDO::PARAM_STR);
        $statement->bindValue(':working_days', $member->getWorkingDays(), PDO::PARAM_STR);
        $statement->bindValue(':team_id', $member->getTeamId(), PDO::PARAM_STR);
        $statement->execute();

        // Transact
        $this->dbh->beginTransaction();
        try{
            $result = $statement->execute();
            $this->dbh->commit();
            return $result;
        } catch (Exception $e){
            // var_dump($e);
            $this->dbh->rollback();
            return false;
        }
    }

    /**
     * Get member by Team-Id
     *
     * @param int $teamId
     * @return array
     */
    public function getByTeam(int $teamId){
        $query = "select * from member where team_id = :id";
        $sth = $this->dbh->prepare($query);
        $sth->bindParam(':id', $teamId, PDO::PARAM_INT);
        $sth->execute();
        $rows = $sth->fetchAll();
        $result = [];

        foreach ($rows as $row){
            array_push($result, $this->factory($row));
        }
        return $result;
    }

    /**
     * Get members that are not present NOW.
     * @return array
     */
    public function getAbsent(){
        $query = 'select m.name, m.username, m.destination, m.drink_preference, m.working_days, m.team_id
            from member m
            inner join time_off t on m.id =  t.member_id
            where NOW() between t.start_time and t.end_time
            or m.working_days NOT LIKE concat("%", lower(dayname(now())), "%")
            group by m.name, m.username, m.destination, m.drink_preference, m.working_days, m.team_id';
        $sth = $this->dbh->prepare($query);
        $sth->execute();
        $rows = $sth->fetchAll();
        return $this->rowsToObjects($rows);
    }

    /**
     * Get members that are not present NOW.
     * @return array
     */
    public function getAbsentByTeam(int $id){
        $query = 'select m.name, m.username, m.destination, m.drink_preference, m.working_days, m.team_id
            from member m
            inner join time_off t on m.id =  t.member_id
            where NOW() between t.start_time and t.end_time
            or m.working_days NOT LIKE concat("%", lower(dayname(now())), "%")
            and team_id=:team_id
            group by m.name, m.username, m.destination, m.drink_preference, m.working_days, m.team_id';
        $sth = $this->dbh->prepare($query);
        $sth->bindParam('team_id', $id);
        $sth->execute();
        $rows = $sth->fetchAll();
        return $this->rowsToObjects($rows);
    }

    /**
     * Get members that are present NOW.
     * @return array
     */
    public function getPresent(){
        $query = 'select m.name, m.username, m.destination, m.drink_preference, m.working_days, m.team_id
            from member m
            inner join time_off t on m.id =  t.member_id
            where NOW() not between t.start_time and t.end_time
            and m.working_days LIKE concat("%", lower(dayname(now())), "%")
            group by m.name, m.username, m.destination, m.drink_preference, m.working_days, m.team_id';
        $sth = $this->dbh->prepare($query);
        $sth->execute();
        $rows = $sth->fetchAll();
        return $this->rowsToObjects($rows);
    }

    /**
     * Get members that are not present NOW.
     * @return array
     */
    public function getPresentByTeam(int $id){
        $query = 'select m.name, m.username, m.destination, m.drink_preference, m.working_days, m.team_id
            from member m
            inner join time_off t on m.id =  t.member_id
            where NOW() not between t.start_time and t.end_time
            and m.working_days LIKE concat("%", lower(dayname(now())), "%")
            and team_id=:team_id
            group by m.name, m.username, m.destination, m.drink_preference, m.working_days, m.team_id';
        $sth = $this->dbh->prepare($query);
        $sth->bindParam('team_id', $id);
        $sth->execute();
        $rows = $sth->fetchAll();
        return $this->rowsToObjects($rows);
    }


}
