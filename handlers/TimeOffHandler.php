<?php
require_once('Handler.php');
require_once('MemberHandler.php');
require_once(dirname(__FILE__) . '/../models/TimeOff.php');


/**
 * Class TimeOffHandler
 *
 * Authors: Dominic Dingena & Carina Boom
 */
class TimeOffHandler extends Handler {

    /**
     * Take a data row from the database, return it as object.
     *
     * @param array $row
     * @return mixed
     */
    protected function factory(array $row) {
        $timeOff = new TimeOff();
        $timeOff->setId($row['id']);
        $timeOff->setStartTime($row['start_time']);
        $timeOff->setEndTime($row['end_time']);
        $memberHandler = new MemberHandler($this->dbh);
        $member = $memberHandler->factory($row);
        $member->setId($row['member_id']);
        $timeOff->setMember($member);
        return $timeOff;
    }

    /**
     * Add a timeoff object to the database
     *
     * @param TimeOff $timeOff
     */
    public function add(TimeOff $timeOff): int {
        $query = "INSERT INTO time_off(start_time, end_time, member_id) VALUES (:start_time, :end_time, :member_id)";
        $statement = $this->dbh->prepare($query);
        $statement->bindValue(':start_time', $timeOff->getStartTime(), PDO::PARAM_STR);
        $statement->bindValue(':end_time', $timeOff->getEndTime(), PDO::PARAM_STR);
        $statement->bindValue(':member_id', $timeOff->getMemberId(), PDO::PARAM_STR);
        $statement->execute();
        $id = $this->dbh->lastInsertId();
        $timeOff->setId($id);
        return $id;
    }

    /**
     * Update a member in the database
     *
     * @param Member $member
     */
    public function update(TimeOff $timeOff) {
        $query = "UPDATE time_off SET start_time=:start_time, end_time=:end_time, member_id=:member_id WHERE id= :id";
        $statement = $this->dbh->prepare($query);
        $statement->bindValue(':id', $timeOff->getId(), PDO::PARAM_INT);
        $statement->bindValue(':start_time', $timeOff->getStartTime(), PDO::PARAM_STR);
        $statement->bindValue(':end_time', $timeOff->getEndTime(), PDO::PARAM_STR);
        $statement->bindValue(':member_id', $timeOff->getMemberId(), PDO::PARAM_STR);
        $statement->execute();
    }

    public function getByTeamThisWeek(int $id){
        $dt = new DateTime();
        $dt->modify('next saturday');
        $nextSaturday = $dt->format('Y-m-d h:m:s');

        $query = 'select *
            from member m
            inner join time_off t on m.id =  t.member_id
            where t.start_time between NOW() and :next_saturday 
            and m.working_days LIKE concat("%", lower(dayname(now())), "%")
            and team_id= :team_id';
        $sth = $this->dbh->prepare($query);
        $sth->bindValue('team_id', $id);
        $sth->bindValue('next_saturday', $nextSaturday);
        $sth->execute();
        $rows = $sth->fetchAll();
        return $this->rowsToObjects($rows);
    }
}
