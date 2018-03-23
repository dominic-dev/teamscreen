<?php
class JsonMember {
    public $user;
    public $destination;

    public function __construct(JiraUser $user, string $destination){
        $this->user = $user;
        $this->destination = $destination;
    }
}
