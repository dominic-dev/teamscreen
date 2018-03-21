<?php
require_once('./models/Team.php');
require_once('Handler.php');
class TeamHandler extends Handler {

    /**
     * Take a data row from the database, return it as object.
     *
     * @param array $row
     * @return mixed
     */
    protected function factory(array $row) {
      $team = new Team($row['id'], $row['label']);
      return $team;
    }
    
}
