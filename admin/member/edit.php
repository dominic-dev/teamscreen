<?php

require_once('../../models/Member.php');
require_once('../../handlers/Database.php');
require_once('../../handlers/MemberHandler.php');

// GET 
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(!isset($_GET['id'])){
        die();
    }
    $id = (int) $_GET['id'];

    $db = new Database();
    $conn = $db->getConnection();
    $memberHandler = new MemberHandler($conn);
    $member = $memberHandler->get($id);
    require_once('../../views/editmember.php');
}

// POST
else{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $destination = $_POST['destination'];
    $teamId = $_POST['team'];
    $drinkPreference = $_POST['drinkPreference'];
    $workingDays = $_POST['workingDays'];

    $member = new Member();
    $member->setId($id);
    $member->setUsername($username);
    $member->setName($name);
    $member->setDestination($destination);
    $member->setDrinkPreference($drinkPreference);
    $member->setTeamId($teamId);
    if(isset($workingDays)){
        $member->setWorkingDays(implode(',',$workingDays));
    }

    $db = new Database();
    $dbh = $db->getConnection();
    $memberHandler = new MemberHandler($dbh);

    if($memberHandler->update($member)){
        header('Location: '. 'edit.php?id=' . $member->getId());
        die();
    }
    die("fatal error");
}
