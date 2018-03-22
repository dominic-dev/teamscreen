<?php

require_once('../../handlers/Database.php');
require_once('../../models/Member.php');
require_once('../../handlers/MemberHandler.php');
require_once('../../handlers/TeamHandler.php');

/**
 *
 * Authors: Dominic Dingena & Agung Udijana
 */


// Get

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $db = new Database();
    $conn = $db->getConnection();
    $memberHandler = new MemberHandler($conn);
    $teamHandler = new TeamHandler($conn);

    $usernames = [];
    $members = $memberHandler->getAll();
    foreach($members as $member){
        array_push($usernames, $member->getUsername());
    }
    $teams = $teamHandler->getAll();

    // TODO get enum from database
    $drinkPreferences = array ('tea', 'coffee', 'water');
    require_once('../../views/addmember.php');
    die();
}

// Post
elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
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
        header('Location: '. 'add.php');
        die();
    }
    die("fatal error");

}
