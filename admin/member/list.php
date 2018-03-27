<?php
require_once('../header.php');
require_once('../../handlers/Database.php');
require_once('../../handlers/MemberHandler.php');

/**
 * CONTROLLER: EDIT A MEMBER
 *
 * Author: Dominic Dingena
 * Editor: Carina Boom
 */

$db = new Database();
$conn = $db->getConnection();
$memberHandler = new MemberHandler($conn);

$members = $memberHandler->getAll();

include('../../views/member/list.php');