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

    /**
     * Add a team object to the database
     *
     * @param Team $team
     */
    public function add(Team $team) {
        $label = "'$this->getLabel()'";
        $query = "INSERT INTO team(label) VALUES ($label)";
        $statement = $this->dbh->prepare($query);
        $statement->execute();
    }

}
