<?php
/**
 * Created by PhpStorm.
 * User: carina_boom
 * Date: 21-3-2018
 * Time: 14:12
 */

require_once('models/Team.php');
require_once('models/Member.php');
require_once('handlers/Database.php');
require_once('handlers/TeamHandler.php');
require_once('handlers/MemberHandler.php');
require_once('handlers/TimeOffHandler.php');

$db = new Database();
$dbh = $db->getConnection();

$th = new TimeOffHandler($dbh);
$onLeave = $th->getByTeamThisWeek(1);
print_r($onLeave);