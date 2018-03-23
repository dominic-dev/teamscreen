<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Board</title>
</head>
<body>
<div id="header">
    <div id="datumtijd"><span class="date">5 maart 2018</span><span class="time">12:05</span></div>
    <div id="bordHeader">
        <span>BordNaam</span>

        <label for="boardSelector">Laat bord zien van:</label>
        <select name="" id="boardSelector">
            <option value="">Bord 1</option>
            <option value="">Bord 2</option>
            <option value="">Bord 4</option>
        </select>
    </div>
</div>
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