<?php
require_once('./models/Team.php');
require_once('Handler.php');
class TeamHandler extends Handler {

    public function get(int $id) {
        $query = "select * from team where idteam = :id";
        $sth = $this->dbh->prepare($query);
        $sth->bindParam('id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();
        return $this->factory($result);
    }


    protected function factory(array $row) {
      $team = new Team($row['idteam'], $row['label']);
      return $team;
    }
    
}
