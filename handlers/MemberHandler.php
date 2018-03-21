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
    protected function factory(array $row) : Member {
        $member = new Member($row['id'], $row['name'], $row['username'], $row['destination'], $row['drink_preference'], $row['workdays']);
        return $member;
    }

    /**
     * Add a member object to the database
     *
     * @param Member $member
     */
    public function add(Member $member) {
        $username = "'$this->getUsername()'";
        $name = "'$this->getName()'";
        $destination = "'$this->getDestination()'";
        $drink_preference = "'$this->getDrinkpreference()'";
        $workdays = "'$this->getWorkdays()'";
        $query = "INSERT INTO member(name, username, destination, drink_preference, workdays) 
              VALUES ($name, $username, $destination, $drink_preference, $workdays)";
        $statement = $this->dbh->prepare($query);
        $statement->execute();
    }


}
