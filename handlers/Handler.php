<?php
abstract class Handler {
    protected $dbh;

    public function __construct(PDO $dbh){
        $this->dbh = $dbh;
    }
}
