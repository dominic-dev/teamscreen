<?php
// MOCK DATA - TO REMOVE WHEN HANDLER IS ABLE TO PASS IN ARRAYS
$usernames = array('petri.van.niekerk', 'agung.udijana');
$teams = array('1' => 'Team Chappie', '2' => 'Team Screen');
$drinkpreferences = array ('tea', 'coffee', 'water');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link href="style.css" rel="stylesheet">

    <!- authors : Petri & Agung
    21 March 2018
    -->

    <title>Nieuw teamlid</title>
</head>
<body>

<div id="general">

    <h1>Nieuw teamlid</h1>

    <!-- to do : replace add_editMemberHandlerTest.php with the actual handler name -->
    <form action="add_editMemberHandlerTest.php" method="post">
        <table>
            <tr>
                <td><label for="name">Naam</label> </td>
                <td> <input type="text" name="membername"/></td>
            </tr>
            <tr>
                <td><label for ="username">Jira gebruikersnaam</td>
                <td><select name = "username">
                    <option selected="selected">Kies een jira gebruikersnaam</option>
                     <?php
                     // Iterating through the array that contains JIRA usernames which are passed on by the handler
                     foreach($usernames as $item){
                     ?>
                     <option value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option>
                     <?php
                     }
                     ?>

                </select>
                </td>
            </tr>
            <tr>
                <td><label for ="team">Team</td>
                <td><select name ="team">
                    <option selected="selected">Voeg toe aan team</option>
                    <?php
                    // Iterating through the array that contains the teams which are passed on by the handler
                    foreach($teams as $key => $value){
                    ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php
                    }
                    ?>
                </select>
                </td>
            </tr>

            <tr>
                <td><label for ="destination">Bestemming</td>
                <td><input type="text" name="destination"/></td>
            </tr>
            <tr>
                <td><label for ="drinkpreference">Drankvoorkeur</td>
                <td><select name="drinkpreference">
                    <option selected="selected">Kies een drankvoorkeur</option>


                    <?php
                    // Iterating through the array that contains the drink preferences which are passed on by the handler
                    foreach($drinkpreferences as $item){
                    ?>
                    <option value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option>
                    <?php
                    }
                    ?>
                </select>
                </td>
            </tr>

            <tr>
                <td><label for ="workingdays[]">Werkdagen</td>
                <td>
                    <input type="checkbox" name="workingdays[]" value="Monday" checked>Maandag<br>
                    <input type="checkbox" name="workingdays[]" value="Tuesday" checked>Dinsdag<br>
                    <input type="checkbox" name="workingdays[]" value="Wednesday" checked>Woensdag<br>
                    <input type="checkbox" name="workingdays[]" value="Thursday" checked>Donderdag<br>
                    <input type="checkbox" name="workingdays[]" value="Friday" checked>Vrijdag<br>
                </td>
            </tr>
        </table>

        <br>
        <br>

        <button type="submit" name="addMemberButton">Maak teamlid aan</button>

    </form>


</div>

</body>


</html>