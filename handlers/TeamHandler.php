<?php
require_once('Handler.php');
class TeamHandler extends Handler {

    public function get(int $id) {
        $query = "select * from member where id = :id";
        $sth = $this->dbh->prepare($query);
        $sth->bindParam('id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();
        return $result;
    }
    
}
