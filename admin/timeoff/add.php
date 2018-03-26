<?php

require_once('../../handlers/Database.php');
require_once('../../models/TimeOff.php');
require_once('../../handlers/MemberHandler.php');
require_once('../../handlers/TimeOffHandler.php');

/**
 *
 * Authors: Dominic Dingena & Carina Boom
 */

$db = new Database();
$conn = $db->getConnection();
$memberHandler = new MemberHandler($conn);
$timeOffHandler = new TimeOffHandler($conn);

function checkExists($member){
    if(empty($member)){
        die("Member not found");
    }
}

// Get
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(empty($_GET['id'])){
        die("No member id specified.");
    }

    $member = $memberHandler->get((int) $_GET['id']);

    checkExists($member);

    include('../../views/timeoff/add.php');
    die();
}


//POST
elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
    $member = $memberHandler->get((int)$_POST['id']);
    checkExists($member);

    $timeOff = new TimeOff();
    $timeOff->setStartTime($_POST['start']);
    $timeOff->setEndTime($_POST['end']);
    $timeOff->setMemberId($member->getId());
    $timeOffHandler->add($timeOff);

    $_SESSION['message'] = 'Verlof toegevoegd voor ' . $member->getName();
    header('Location : add.php');
    die();
}