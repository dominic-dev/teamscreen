<?php

class Member {
    private $username;
    private $name;
    private $destination;
    private $avatar;

    private $id;
    // ENUM('koffie', 'thee', 'water')
    private $drinkPreference;
    // workday set, permitted values:
    // SET ('maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag') NULL,
    private $workingDays;
    private $teamId;

    private $timeOff;

    public function __construct($id=null, $username=null, $name=null, $destination=null,
                         $drinkPreference=null, $workingDays=null, $timeOff=null, $teamId=null){
        $this->id = $id;
        $this->username = $username;
        $this->name = $name;
        $this->destination = $destination;
        $this->drinkPreference = $drinkPreference;
        $this->workingDays = $workingDays;
        $this->timeOff = $timeOff;
        $this->teamId = $teamId;

        $this->avatar = "http://tim.mybit.nl/jiraproxy.php/secure/useravatar?ownerId=" . $username;
    }

    /**
     * @return null
     */
    public function getTeamId()
    {
        return $this->teamId;
    }

    /**
     * @param null $teamId
     */
    public function setTeamId($teamId)
    {
        $this->teamId = $teamId;
    }

    /**
     * @return null
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param null $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    public function setTimeOff(array $timeOff){
        $this->timeOff = $timeOff;
    }

    public function getTimeOff(){
        return $this->timeOff;
    }

    public function getDrinkPreference() {
        return $this->drinkPreference;
    }

    function setDrinkPreference(string $drinkPreference){
        $this->drinkPreference = $drinkPreference;
    }

    public function getWorkingDays() : string {
        return $this->workingDays;
    }

    public function setWorkingDays(string $workingDays) {
        $this->workingDays = $workingDays;
    }

    public function getId() : int {
        return $this->id;
    }

    public function getUsername() : string {
        return $this->username;
    }

    public function getName() : string {
        return $this->name;
    }


    public function setId(int $id){
        $this->id = $id;
    }

    public function setUsername(string $username){
        $this->username = $username;
        $this->avatar = "http://tim.mybit.nl/jiraproxy.php/secure/useravatar?ownerId=" . $username;
    }

    public function setName(string $name){
        $this->name = $name;
    }
}
