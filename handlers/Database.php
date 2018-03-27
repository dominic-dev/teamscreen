<?php

/** Constant variables */
define("USERNAME", 'teamscreen');
define("PASSWORD", 'tsadmin');

/**
 * Class Database
 *
 * Authors: Dominic Dingena & Carina Boom
 */
class Database{
    /** @var */
    private $dbh;

    /**
     * Database constructor
     */
    public function __construct(){
        $this->connect();
    }

    /**
     * Connecting database
     */
    private function connect(){
        $dsn = 'mysql:host=localhost;dbname=teamscreen';
        $this->dbh = new PDO($dsn, USERNAME, PASSWORD);
    }

    /**
     * Return current connection
     *
     * @return PDO
     */
    public function getConnection() : PDO {
        return $this->dbh;
    }
}

