<?php
require_once('Handler.php');
class MemberHandler extends Handler {

    /** Get by ID */
    public function get(int $id)
    {
        //Extend PDO connection with prepared statement
        $querySql = "SELECT * from member where id = :id";
        $statementHandler = $this->dbHandler->prepare($querySql);
        //Bind parameters
        $statementHandler->bindParam('id', $id, PDO::PARAM_INT);
        $statementHandler->execute();
        //Catch result by fetch
        $result = $statementHandler->fetch();
        return $result;
    }

}