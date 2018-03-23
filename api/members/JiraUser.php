<?php

class JiraUser {

    public $name;
    public $avatar;

    public function __construct(string $name){
        $this->name = $name;
        $this->avatar = "http://tim.mybit.nl/jiraproxy.php/secure/useravatar?ownerId=" . $name;
    }

}
