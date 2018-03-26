<?php
include('../header.php');
require_once('../../handlers/Database.php');
require_once('../../handlers/MemberHandler.php');

$db = new Database();
$conn = $db->getConnection();
$memberHandler = new MemberHandler($conn);
$members = $memberHandler->getAll();

include('../../views/listmember.php');