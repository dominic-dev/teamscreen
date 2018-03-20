<?php
require_once('models/Team.php');
require_once('models/Member.php');
$team = new Team(5, "Pwap");
$member = new Member(1, 'user01', 'klaas', $team); 
var_dump($team);
var_dump($member);
