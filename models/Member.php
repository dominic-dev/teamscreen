<?php

class Member {
    private $id;
    private $username;
    private $name;
    private $team;

    function __construct($id=null, $username=null, $name=null, $team=null){
        $this->id = $id;
        $this->username = $username;
        $this->name = $name;
        $this->team = $team;
    }

    function getId() : int {
        return $this->id;
    }

    function getUsername() : string {
        return $this->username;
    }

    function getName() : string {
        return $this->name;
    }

    function getTeam() : Team {
        return $this->team;
    }

    function setId(int $id){
        $this->id = $id;
    }

    function setUsername(string $username){
        $this->username = $username;
    }

    function setName(string $name){
        $this->name = $name;
    }

    function setTeam(Team $team){
        $this->team = $team;
    }

}
