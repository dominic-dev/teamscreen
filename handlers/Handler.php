<?php

/**
 * Class Handler
 *
 * Authors: Dominic Dingena & Carina Boom
 */
abstract class Handler {
    protected $dbh;

    /**
     * Handler constructor.
     * @param PDO $dbh
     * @param string|null $table_name
     */
    public function __construct(PDO $dbh, string $table_name=null){
        $this->dbh = $dbh;

        if (isset($tableName)){
            $this->tableName = $tableName;
        }
        else {
            $className = get_class($this);
            $tableName= str_replace("Handler", "", $className);
            $this->tableName = strtolower($tableName);
        }
    }

    /**
     * Get an object from the database by id.
     *
     * @param int $id
     * @return mixed
     */
    public function get(int $id) {
        $query = "select * from $this->tableName where id = :id";
        $sth = $this->dbh->prepare($query);
        $sth->bindParam('id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();
        return $this->factory($result);
    }

    /**
     * Get an array of all objects in the database.
     *
     * @return array
     */
    public function getAll() : array {
        $query = "select * from $this->tableName";
        $sth = $this->dbh->prepare($query);
        $sth->execute();
        $rows = $sth->fetchAll();
        $result = [];

        foreach ($rows as $row){
            array_push($result, $this->factory($row));
        }
        return $result;
    }

    /**
     * Delete an object from the database by id.
     *
     * @param int $id
     */
    public function delete(int $id) {
        $sql = "DELETE FROM $this->tableName WHERE id =  :id";
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();
    }

    /**
     * Take a data row from the database, return it as object.
     *
     * @param array $row
     * @return mixed
     */
    abstract protected function factory(array $row);

}
