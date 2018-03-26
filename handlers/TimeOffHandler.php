<?php
require_once('Handler.php');
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
        $timeOff = new TimeOff($row['id'], $row['starttime'], $row['endtime'], $row['memberId']);
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

}
