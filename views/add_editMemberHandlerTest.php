<?php
/**
 * Created by PhpStorm.
 * User: Petri & Agung
 * Date: 20-Mar-18
 * Time: 21:42
 */


echo '<h3>DUMMY ADD/EDIT MEMBER HANDLER</h3>';

echo '<h2>To test stuff coming from the addmember.html & editmember.html form</h2>';


$membername = $_POST['membername'];
$username = $_POST['username'];
$team = $_POST['team'];
$drinkpreference = $_POST['drinkpreference'];
$workingday = $_POST['workingday'];

echo "Teamlid naam: ". $membername . '<br>';
echo "JIRA gebruikersnaam: ". $username . '<br>';
echo "Assigned aan team: ". $team . '<br>';
echo "Drankvoorkeur: ". $drinkpreference . '<br>';

echo '<br>';

echo "<strong>Werkdagen : </strong>" . '<br>';
foreach($workingday as $item) {
    echo $item. '<br>';
}






/*

for add team purposes :


 echo "yeah!";

echo "<br>";
echo "<br>";

$newteam = $_POST['teamlabel'];

 echo $newteam;

*/

?>