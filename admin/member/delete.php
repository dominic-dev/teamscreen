<?php

require_once('../../handlers/Database.php');
require_once('../../handlers/MemberHandler.php');

/**
 * CONTROLLER: DELETE A MEMBER
 *
 * Authors: Dominic Dingena & Carina Boom
 */

if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
    // Only allow post requests.
    die();
}
if(!isset($_POST['id'])){
    die();
}

$db = new Database();
$conn = $db->getConnection();

$memberHandler = new MemberHandler($conn);
$id = (int) $_POST['id'];
$member = $memberHandler->get($id);

if($memberHandler->delete($id)){
    session_start();
    $_SESSION['message'] =  $member->getName() . ' succesvol verwijderd';
    header('Location: ../member/list.php');
    //If DELETE did not succeed:
    die("fatal error");
}

