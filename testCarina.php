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

//$db = new Database();
//$dbh = $db->getConnection();

//$th = new TeamHandler($dbh);
//$mh = new MemberHandler($dbh);
//
////$team = $th->get(1);
////$list = $th->getAll();
////var_dump($team);
////var_dump($list);
//
////$member1 = $mh->get(1);
////var_dump($member1);
//
//$memberList = $mh->getAll();
//var_dump($memberList);

$string2 = 'test';
$string1 = "'$string2'";
var_dump($string1);