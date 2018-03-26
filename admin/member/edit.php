<?php

require_once('../../handlers/Database.php');
require_once('../../models/Member.php');
require_once('../../handlers/MemberHandler.php');
require_once('../../handlers/TeamHandler.php');

/**
 * CONTROLLER: EDIT MEMBER
 *
 * Authors: Dominic Dingena & Agung Udijana
 * Editor: Carina Boom
 */

/**
 * GET
 */
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(!isset($_GET['id'])){
        die();
    }
    $id = (int) $_GET['id'];

    $db = new Database();
    $conn = $db->getConnection();
    $memberHandler = new MemberHandler($conn);
    $teamHandler = new TeamHandler($conn);

    $editSuccess ='';

    // TODO
    $member = $memberHandler->get($id);
    if(!$member) die("Member not found.");

    $members = $memberHandler->getAll();

    $editSuccess ='';

    $teams = $teamHandler->getAll();

    require_once('../../views/editmember.php');
}

/**
 * POST
 */
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

    $memberHandler->update($member);

    session_start();
    $_SESSION['editSuccess'] = "Lid succesvol gewijzigd";

    //TO DO : redirect
    header('Location: '. 'edit.php?id=' . $member->getId());

    die();

}
