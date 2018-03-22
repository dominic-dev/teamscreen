<?php
require_once(dirname(__FILE__) .'./models/Team.php');
require_once('Handler.php');

/**
 * Class TeamHandler
 *
 * Authors: Dominic Dingena & Carina Boom
 */
class TeamHandler extends Handler {

    /**
     * Take a data row from the database, return it as object.
     *
     * @param array $row
     * @return mixed
     */
    protected function factory(array $row) {
      $team = new Team();
      $team->setId($row['id']);
      $team->setLabel($row['label']);
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
        $statement->bindValue(':label', $team->getLabel(), PDO::PARAM_STR);

        $this->dbh->beginTransaction();
        try{
            $statement->execute();
            $id = $this->dbh->lastInsertId();
            $this->dbh->commit();
        } catch (Exception $e){
            $this->dbh->rollback();
            return 0;
        }
        $team->setId($id);
        return $id;
    }

    /**
     * Update a team in the database
     *
     * @param Member $member
     */
    public function update(Team $team) : bool {
        $query = "UPDATE team SET label=:label WHERE id= :id";
        $statement = $this->dbh->prepare($query);
        $statement->bindValue(':id', $team->getId(), PDO::PARAM_INT);
        $statement->bindValue(':label', $team->getLabel(), PDO::PARAM_STR);
        return $statement->execute();
    }


}
