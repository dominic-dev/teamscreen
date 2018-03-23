<?php
require_once('handlers/Database.php');
require_once('handlers/MemberHandler.php');
require_once('handlers/TeamHandler.php');

$db = new Database();
$conn = $db->getConnection();
$memberHandler = new MemberHandler($conn);
$teamHandler = new TeamHandler($conn);
$teams = $teamHandler->getAll();

$allMembers = $memberHandler->getAll();
$teamMembers = $memberHandler->getByTeam((int) $_GET['teamid']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
         var allMembers = JSON.parse('<?= json_encode($allMembers)?>');
         var teamMembers = JSON.parse('<?= json_encode($teamMembers)?>');
       </script>
    <script src="main.js"></script>
    <title>Board</title>
</head>
<body>

<div id="header" >
    <div id="dateTime" class="headerline" >
        <span id="date" class="headerBox">&#128197 5 maart 2018</span>
        <span id="time" class="headerBox">&#128336 12:05</span></div>
    <div id="bordHeader" class="headerline">
        <span id="name"  class="headerBox"><strong>John Doe</strong></span>
        <span class="headerBox"><strong>|</strong></span>
        <span class="headerBox">
              <label for="boardSelector">Laat bord zien van:</label>
             <select name="boardSelector" id="boardSelector">
                         <option value="">Kies een team</option>
        <?php
                         foreach($teams as $team){
                             echo '<option value="' . $team->getId() . '">' . $team->getLabel() . '</option>';
                         }
        ?>
            </select>
        </span>
    </div>
</div>

<?php
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

<div id="board">
    <?php include('widgets/teamDrinks.php'); ?>
    <?php include('widgets/cleanCoffeeMachine.php'); ?>
    <?php include('widgets/daysOff.php'); ?>
    <?php include('widgets/delays.php'); ?>
    <?php include('widgets/scrumboard.php'); ?>
    <?php include('widgets/scrumboard.php'); ?>
</div>
</body>
</html>
