<?php
/**
 * Created by PhpStorm.
 * User: Petri & Agung
 * Date: 20-Mar-18
 * Time: 21:42
 */


echo '<h3>DUMMY ADD/EDIT MEMBER HANDLER</h3>';

echo '<h2>To test stuff coming from the addmember.html & editmember.html form</h2>';


$name = $_POST['name'];
$username = $_POST['username'];
$team = $_POST['team'];
$drinkpreference = $_POST['drinkpreference'];
$workingdays = $_POST['workingdays'];
$destination = $_POST['destination'];


echo "Teamlid naam: ". $name . '<br>';
echo "JIRA gebruikersnaam: ". $username . '<br>';
echo "Assigned aan team: ". $team . '<br>';
echo "Drankvoorkeur: ". $drinkpreference . '<br>';
echo "Bestemming: ". $destination . '<br>';

echo '<br>';

echo "<strong>Werkdagen : </strong>" . '<br>';
foreach($workingdays as $item) {
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