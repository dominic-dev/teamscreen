<?php
require_once('Handler.php');
require_once('../models/Member.php');

class MemberHandler extends Handler {

    /** Get Member by ID */
    public function get(int $id) : array {
        //Extend PDO connection with prepared statement
        $querySql = "SELECT * from member where idTeamMember = :id";
        $statementHandler = $this->dbHandler->prepare($querySql);
        //Bind parameters
        $statementHandler->bindParam('id', $id, PDO::PARAM_INT);
        $statementHandler->execute();
        //Catch result by fetch
        $result = $statementHandler->fetch();
        return $result;
    }

    /** Get All Members */
    public function getAll() : array {
        //Extend PDO connection with prepared statement
        $querySql = "SELECT * from member";
        $statementHandler = $this->dbHandler->prepare($querySql);
        $statementHandler->execute();
        //Catch result by fetch
        $result = $statementHandler->fetchAll();
                return $result;
    }

    /** Parse a row into an object a factory */
    protected function factory(array $row) : Member {
        $member = new Member($row['idTeamMember'], $row['name'], $row['username'], $row['destination'], $row['drink_preferences'], $row['workdays']);
        return $member;
    }

}