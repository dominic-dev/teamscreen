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


?>

</body>
</html>