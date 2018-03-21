<?php
require_once('models/Team.php');
require_once('models/Member.php');
require_once('handlers/Database.php');
require_once('handlers/TeamHandler.php');
require_once('handlers/MemberHandler.php');

$team = new Team(5, "Pwap");
$member = new Member(1, 'user01', 'klaas', $team); 
// var_dump($team);
// var_dump($member);

$db = new Database();
$dbh = $db->getConnection();

$th = new TeamHandler($dbh);
$mh = new MemberHandler($dbh);

$team = $th->get(1);
var_dump($team);

$member1 = $mh->get(1);
var_dump($member1);

$memberArray = $mh->getAll();
var_dump($memberArray);

