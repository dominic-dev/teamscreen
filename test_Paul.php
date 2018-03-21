<!DOCTYPE html>
<html>
<head>
	<title>TEST PAUL!!!</title>
</head>
<body>


<?php
require_once('models/Member.php');
require_once('models/Team.php');

$team = new Team(1, 'testteam'); 
$member = new Member(1, 'user01', 'klaas', $team); 

echo 'Naam: ' . $member->getName() ;
echo '<br/><br/>';
print_r($team);

?>

</body>
</html>