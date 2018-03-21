<?php
require_once('Handler.php');
require_once('./models/Timeoff.php');

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
        $timeOff = new Timeoff($row['id'], $row['starttime'], $row['endtime'], $row['memberId']);
        return $timeOff;
    }

    /**
     * Add a timeoff object to the database
     *
     * @param Timeoff $timeOff
     */
    public function add(Timeoff $timeOff): int {
        $query = "INSERT INTO time_off(start_time, end_time, member_id) VALUES (:start_time, :end_time, :member_id)";
        $statement = $this->dbh->prepare($query);
        $statement->bindParam(':start_time', $this->getStarttime(), PDO::PARAM_STR);
        $statement->bindParam(':end_time', $this->getEndtime(), PDO::PARAM_STR);
        $statement->bindParam(':member_id', $this->getMemberId(), PDO::PARAM_STR);
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
    public function update(Timeoff $timeOff) {
        $query = "UPDATE time_off SET start_time=:start_time, end_time=:end_time, member_id=:member_id WHERE id= :id";
        $statement = $this->dbh->prepare($query);
        $statement->bindParam(':id', $this->getId(), PDO::PARAM_INT);
        $statement->bindParam(':start_time', $this->getStarttime(), PDO::PARAM_STR);
        $statement->bindParam(':end_time', $this->getEndtime(), PDO::PARAM_STR);
        $statement->bindParam(':member_id', $this->getMemberId(), PDO::PARAM_STR);
        $statement->execute();
    }

}