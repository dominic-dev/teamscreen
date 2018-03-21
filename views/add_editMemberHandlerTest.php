<?php
/**
 * Created by PhpStorm.
 * User: Petri & Agung
 * Date: 20-Mar-18
 * Time: 21:42
 */

require_once('../models/Team.php');
require_once('../models/Member.php');

echo '<h3>DUMMY ADD/EDIT MEMBER HANDLER</h3>';

echo '<h2>To test stuff coming from the addmember.html & editmember.html form</h2>';

$name = $_POST['membername'];
$username = $_POST['username'];
$teamId = $_POST['team'];
// klopt nog niet
$drinkpreference = $_POST['drinkpreference'];
$workingday = $_POST['workingday'];



$destination = 'Dam 1, Amsterdam';

$member = new Member();
$member->setUsername($username);
$member->setName($name);
$member->setDestination($destination);
$member->setDrinkpreference('koffie');
if(isset($workingday)){
    $member->setWorkdays(implode(',',$workingday));
}


$array = ['tim', 'test'];
$string = implode(',', $array);

function addMember($amember){

    if(isset($amember)){
        var_dump($amember);
    }


}

//show de stuff
echo "Teamlid naam: ". $name . '<br>';
echo "JIRA gebruikersnaam: ". $username . '<br>';
echo "Assigned aan team: ". $teamId . '<br>';
echo "Drankvoorkeur: ". $drinkpreference . '<br>';
echo '<br>';
echo "<strong>Werkdagen : </strong>" . '<br>';
if(isset($workingday)){
    foreach($workingday as $item) {
        echo $item. '<br>';
    }
}


echo 'MemberDump: <br/>';
addMember($member);
















?>