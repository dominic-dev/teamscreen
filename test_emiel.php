<!DOCTYPE html>
<html>
<head>
	<title>Test Emiel</title>
</head>
<body>

<p/>
<a href="views/addmember.php">Lid toevoegen</a>
<p/>

<?php
require_once('models/Member.php');
require_once('models/Team.php');
require_once('handlers/Database.php');
require_once('handlers/MemberHandler.php');
require_once('handlers/TeamHandler.php');

define("SEPARATOR", ',');

$team = new Team(1, 'testteam'); 
$member = new Member(1, 'user01', 'klaas', $team); 

// echo 'Naam: ' . $member->getName() ;
// echo '<br/><br/>';
// print_r($team);


echo implode(SEPARATOR, array("Monday", "Tuesday", "Wednesday", "Thursday"));

echo '<p/>';

$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

//var_dump(json_decode($json));
//var_dump(json_decode($json, true));

$array = json_decode( $json, true );
var_dump($array);

foreach($array as $item) {
    //echo $item['filename'];
    echo $item.'<br/>';
    echo $item['a'];
}


$db = new Database();
$conn = $db->getConnection();
$memberHandler = new MemberHandler($conn);
$teamHandler = new TeamHandler($conn);
$teams = $teamHandler->getAll();
if(empty($_GET['teamid'])){
    echo '<div id="select-a-team"><h1>Kies een team:</h1>';
    echo '<ul id="teams">';
    foreach($teams as $team){
        echo '<li><a href="?teamid=' . $team->getId() . '">'. $team->getLabel() . '</a></li>';
    }
    echo '</ul></div>';
    die();
}


?>

</body>
</html>