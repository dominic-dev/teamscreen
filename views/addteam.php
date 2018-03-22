<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link href="style.css" rel="stylesheet">

    <!- authors : Petri & Agung & Dominic
    21 March 2018
    -->

    <title>Nieuw team</title>
</head>
<body>

<div id="general">

    <h1>Nieuw team</h1>
    <form action="/admin/team/add.php" method="post">
        <table>
            <tr>
                <td><label for="name">Team naam</label> </td>
                <td> <input type="text" name="name"/></td>
            </tr>
        </table>

        <br>
        <br>

        <button type="submit" name="addTeam">Maak team aan</button>

    </form>


</div>

</body>


</html>
