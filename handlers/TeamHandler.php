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
    public function add(Team $team) : int {
        $query = "INSERT INTO team(label) VALUES (:label)";
        $statement = $this->dbh->prepare($query);
        $statement->bindParam(':label', $this->getLabel(), PDO::PARAM_STR);
        $statement->execute();
        $id = $this->dbh->lastInsertId();
        return $id;
    }

    /**
     * Update a team in the database
     *
     * @param Member $member
     */
    public function update(Team $team) {
        $query = "UPDATE team SET label=:label WHERE id= :id";
        $statement = $this->dbh->prepare($query);
        $statement->bindParam(':id', $this->getId(), PDO::PARAM_INT);
        $statement->bindParam(':label', $this->getLabel(), PDO::PARAM_STR);
        $statement->execute();
    }


}
