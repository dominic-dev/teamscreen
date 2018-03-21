<?php

/**
 * Class Database
 *
 * Authors: Dominic Dingena & Carina Boom
 */
class Database{
    private $dbh;

    public function __construct(){
        $this->connect();
    }

    private function connect(){
        $dsn = 'mysql:host=localhost;dbname=teamscreen';
        $this->dbh = new PDO($dsn, 'teamscreen', 'tsadmin');
    }

    public function getConnection() : PDO {
        return $this->dbh;
    }
}

