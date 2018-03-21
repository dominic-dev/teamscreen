<?php

class Member {
    private $id;
    private $username;
    private $name;
    private $destination;
    // ENUM('koffie', 'thee', 'water')
    private $drinkpreference;
    // workday set, permitted values:
    // SET ('maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag') NULL,
    private $workdays;

    private $timeoff;

    function __construct($id=null, $username=null, $name=null, $destination=null, $drinkpreference=null, $workdays=null, $timeoff=null){
        $this->username = $username;
        $this->name = $name;
        $this->destination = $destination;
        $this->drinkpreference = $drinkpreference;
        $this->workdays = $workdays;
        $this->timeoff = $timeoff;
    }

    function setTimeoff(array $timeoff){
        $this->timeoff = $timeoff;
    }

    function getTimeoff(){
        return $this->timeoff;
    }

    function getDrinkpreference() {
        return $this->drinkpreference;
    }

    function setDrinkpreference(string $drinkpreference){
        $this->drinkpreference = $drinkpreference;
    }

    function getWorkdays() : string {
        return $this->workdays;
    }

    function setWorkdays(string $workdays) {
        $this->workdays = $workdays;
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


    function setId(int $id){
        $this->id = $id;
    }

    function setUsername(string $username){
        $this->username = $username;
    }

    function setName(string $name){
        $this->name = $name;
    }


}
