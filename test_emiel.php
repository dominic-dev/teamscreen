<!DOCTYPE html>
<html>
<head>
	<title>Test Emiel</title>
</head>
<body>

<p/>
<a href="views/addmember.html">Lid toevoegen</a>
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

$workingdays = array("Monday", "Tuesday", "Wednesday", "Thursday");

echo '<strong>Werkdagen:</strong><br>';
echo implode(SEPARATOR, $workingdays);

?>

</body>
</html>