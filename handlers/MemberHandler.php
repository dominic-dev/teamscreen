<?php
require_once('Handler.php');
require_once('./models/Member.php');

class MemberHandler extends Handler {

    /**
     * Take a data row from the database, return it as object.
     *
     * @param array $row
     * @return mixed
     */
    protected function factory(array $row) {
        $member = new Member($row['id'], $row['name'], $row['username'], $row['destination'], $row['drink_preference'], $row['workdays'], $row['Team_id']);
        return $member;
    }

    /**
     * Add a member object to the database
     *
     * @param Member $member
     */
    public function add(Member $member): int {
        $query = "INSERT INTO member(name, username, destination, drink_preference, workdays) 
              VALUES (:name, :username, :destination, :drink_preference, :workdays)";
        $statement = $this->dbh->prepare($query);
        $statement->bindParam(':name', $this->getName(), PDO::PARAM_STR);
        $statement->bindParam(':username', $this->getUsername(), PDO::PARAM_STR);
        $statement->bindParam(':destination', $this->getDestination(), PDO::PARAM_STR);
        $statement->bindParam(':drink_preference', $this->getDrinkpreference(), PDO::PARAM_STR);
        $statement->bindParam(':workdays', $this->getWorkdays(), PDO::PARAM_STR);
        $statement->execute();
        $id = $this->dbh->lastInsertId();
        return $id;
    }

    /**
     * Update a member in the database
     *
     * @param Member $member
     */
    public function update(Member $member) {
        $query = "UPDATE member SET name=:name, username=:username, destination=:destination, 
              drink_preference=:destination, workdays=:workdays WHERE id= :id";
        $statement = $this->dbh->prepare($query);
        $statement->bindParam(':id', $this->getId(), PDO::PARAM_INT);
        $statement->bindParam(':name', $this->getName(), PDO::PARAM_STR);
        $statement->bindParam(':username', $this->getUsername(), PDO::PARAM_STR);
        $statement->bindParam(':destination', $this->getDestination(), PDO::PARAM_STR);
        $statement->bindParam(':drink_preference', $this->getDrinkpreference(), PDO::PARAM_STR);
        $statement->bindParam(':workdays', $this->getWorkdays(), PDO::PARAM_STR);
        $statement->execute();
    }

}
