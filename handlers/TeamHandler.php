<?php
require_once('./models/Team.php');
require_once('Handler.php');
class TeamHandler extends Handler {

    protected function factory(array $row) {
      $team = new Team($row['id'], $row['label']);
      return $team;
    }
    
}
