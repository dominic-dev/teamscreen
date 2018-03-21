<?php
/**
 * Created by PhpStorm.
 * User: VincentxH
 * Date: 2018-03-21
 * Time: 10:59
 */

require_once('models/Team.php');
require_once('models/Member.php');
require_once('models/Timeoff.php');
$team = new Team(5, "Pwap");
$member = new Member(1, 'user01', 'klaas', "Dam 1, Amsterdam", 'thee', 'maanda, dinsdag, woensdag');
$holli = new Timeoff(1, '2018-03-21', '2018-03-22');
$timeoff = array($holli);
$member->setTimeoff($timeoff);
var_dump($team);
var_dump($member);