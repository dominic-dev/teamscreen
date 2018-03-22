<?php
require_once('Handler.php');
require_once(dirname(__FILE__) . '/../models/Member.php');

/**
 * Class MemberHandler
 *
 * Authors: Dominic Dingena & Carina Boom
 */
class MemberHandler extends Handler {

    /**
     * Take a data row from the database, return it as object.
     *
     * @param array $row
     * @return mixed
     */
    protected function factory(array $row) {
        $member = new Member();
        $member->setId($row['id']);
        $member->setName($row['name']);
        $member->setUsername($row['username']);
        $member->setDestination($row['destination']);
        $member->setDrinkPreference($row['drink_preference']);
        $member->setWorkingDays($row['working_days']);
        $member->setTeamId($row['team_i']);
        return $member;
    }

    /**
     * Add a member object to the database
     *
     * @param Member $member
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

        $statement->execute();
        var_dump($statement);

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
     */
    public function update(Member $member) {
        $query = "UPDATE member SET name=:name, username=:username, destination=:destination, 
              drink_preference=:destination, working_days=:working_days, team_id=:team_id WHERE id= :id";
        $statement = $this->dbh->prepare($query);
        $statement->bindValue(':id', $member->getId(), PDO::PARAM_INT);
        $statement->bindValue(':name', $member->getName(), PDO::PARAM_STR);
        $statement->bindValue(':username', $member->getUsername(), PDO::PARAM_STR);
        $statement->bindValue(':destination', $member->getDestination(), PDO::PARAM_STR);
        $statement->bindValue(':drink_preference', $member->getDrinkPreference(), PDO::PARAM_STR);
        $statement->bindValue(':working_days', $member->getWorkingDays(), PDO::PARAM_STR);
        $statement->bindValue(':team_id', $member->getTeamId(), PDO::PARAM_STR);
        $statement->execute();
    }

}
