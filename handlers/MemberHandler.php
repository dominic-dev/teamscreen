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
        $member = new Member($row['id'], $row['name'], $row['username'], $row['destination'], $row['drink_preferences'], $row['workdays']);
        return $member;
    }

}
