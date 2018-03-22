<?php
/**
 * Created by PhpStorm.
 * User: Petri & Agung
 * Date: 20-Mar-18
 * Time: 21:42
 */

require_once('../models/Team.php');
require_once('../models/Member.php');
require_once('../handlers/Database.php');
require_once('../handlers/MemberHandler.php');

echo '<h3>DUMMY ADD/EDIT MEMBER HANDLER</h3>';

echo '<h2>To test stuff coming from the addmember.html & editmember.html form</h2>';

$name = $_POST['membername'];
$username = $_POST['username'];
$teamId = $_POST['team'];
// klopt nog niet
$drinkpreference = $_POST['drinkpreference'];
$workingdays = $_POST['workingdays'];



$destination = 'Dam 1, Amsterdam';

$member = new Member();
$member->setUsername($username);
$member->setName($name);
$member->setDestination($destination);
$member->setDrinkpreference('koffie');
if(isset($workingdays)){
    $member->setWorkdays(implode(',',$workingdays));
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
echo "Bestemming: ". $destination . '<br>';
echo '<br>';
echo "<strong>Werkdagen : </strong>" . '<br>';
if(isset($workingdays)){
    foreach($workingdays as $item) {
        echo $item. '<br>';
    }
}

//test connection
$db = new Database();
$dbh = $db->getConnection();
$memberHandler = new MemberHandler($dbh);
$memberHandler->add($member);


//echo 'MemberDump: <br/>';
//addMember($member);
//















?>