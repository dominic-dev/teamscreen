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

$team = new Team(1, 'testteam'); 
$member = new Member(1, 'user01', 'klaas', $team); 

// echo 'Naam: ' . $member->getName() ;
// echo '<br/><br/>';
// print_r($team);

// $workingdays = array(
//     1  => "a",
//     2  => "b",
//     3  => "c",
//     4  => "d",
// );

$workingdays = array("Monday", "Tuesday", "Wednesday", "Thursday");

echo '<strong>Werkdagen:</strong><br>';
echo merge_array_to_string($workingdays);


/*
* Merge an one dimensional array into a string, separatint the 
* array-values by the SEPARATOR (constant).
*/
function merge_array_to_string($workingdays): string
{
	define("SEPARATOR", ',');

	$value = null;

	for ($i=0; $i < sizeof($workingdays); $i++) { 
		$value = $value.$workingdays[$i];

		if($i < sizeof($workingdays)-1){
			$value = $value.SEPARATOR;
		}
	}
	return $value;
}

?>

</body>
</html>