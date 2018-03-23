<?php
require_once('../../handlers/Database.php');
require_once('../../handlers/MemberHandler.php');

$db = new Database();
$memberHandler = new MemberHandler($db->getConnection());
$members = $memberHandler->getAll();
$json = json_encode($members);
var_dump($json);
