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
    <div id="koffie" class="widgetBoxSmall">
        <h2>Koffie Halen</h2>
    </div>
    <div id="schoonmaken" class="widgetBoxSmall">
        <h2>Schoonmaken koffie</h2>
    </div>
    <div id="offdays" class="widgetBoxSmall">
        <h2>Vrije dagen</h2>
    </div>
    <?php include('widgets/delays.php'); ?>
    <div id="scrumboard" class="widgetBoxLarge">
        <h2>Scrumboard</h2>
    </div>
</div>
</body>
</html>