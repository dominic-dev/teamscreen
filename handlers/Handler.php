<?php
abstract class Handler {
    protected $dbh;

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

    public function get(int $id) {
        $query = "select * from $this->tableName where id = :id";
        $sth = $this->dbh->prepare($query);
        $sth->bindParam('id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();
        return $this->factory($result);
    }

    abstract protected function factory(array $row);

}
