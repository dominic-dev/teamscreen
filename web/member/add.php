<?php

// Get
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    require_once($_SERVER["DOCUMENT_ROOT"] . '../../views/addmember.php');
    die();
}

// Post
elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once($_SERVER["DOCUMENT_ROOT"] . '../../handlers/Database.php');
    require_once($_SERVER["DOCUMENT_ROOT"] . '../../models/Member.php');
    require_once($_SERVER["DOCUMENT_ROOT"] . '../../handlers/MemberHandler.php');

    $name = $_POST['name'];
    $username = $_POST['username'];
    $destination = $_POST['destination'];
    $teamId = $_POST['team'];
    $drinkPreference = $_POST['drinkPreference'];
    $workingDays = $_POST['workingDays'];

    $member = new Member();
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

    if($memberHandler->add($member)){
        // TODO redirect
        header('Location: '. '/member/add.php');
        die();
    }
    die("fatal error");

}
