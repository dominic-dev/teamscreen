<?php
require_once('Handler.php');
require_once('../models/Member.php');

class MemberHandler extends Handler {

    /** Parse a row into an object a factory */
    protected function factory(array $row) : Member {
        $member = new Member($row['id'], $row['name'], $row['username'], $row['destination'], $row['drink_preferences'], $row['workdays']);
        return $member;
    }

}
