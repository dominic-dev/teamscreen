<?php
require_once('../header.php');

// MOCK DATA - TO REMOVE WHEN HANDLER IS ABLE TO PASS IN ARRAYS
$usernames = array('petri.van.niekerk', 'agung.udijana');
$teams = array('1' => 'Team Chappie', '2' => 'Team Screen');
$drinkPreferences = array ('coffee', 'tea', 'water');
$nameMemberToEdit ='Agung Udijana';
$keyOfTeamOfMemberToEdit ='2';
$usernameMemberToEdit = 'agung.udijana';
$drinkPreferenceMemberToEdit = 'water';
$destinationMemberToEdit ='Amsterdam Dapperbuurt';
$workingdaysMemberToEdit = array('Tuesday', 'Wednesday', 'Friday');
?>

    <title>Wijzig teamlid</title>
</head>
<body>

<div id="general">

    <h1>Wijzig teamlid</h1>

    <!-- to do : replace add_editMemberHandlerTest.php with the actual handler name -->
    <form action="add_editMemberHandlerTest.php" method="post">
        <table>
            <tr>
                <td><label for="name">Naam</label> </td>
                <td> <input type="text" name="name" value="<?php echo $nameMemberToEdit; ?>"></td>
            </tr>
            <tr>
                <td><label for ="username">Jira gebruikersnaam</td>
                <td><select name = "username">
                        <?php
                        // Iterating through the array that contains JIRA usernames which are passed on by the handler
                        foreach($usernames as $item){
                            ?>
                            <option value="<?php echo strtolower($item); ?>" <?php if($item == $usernameMemberToEdit){echo "selected";}?> > <?php echo $item; ?></option>
                            <?php
                        }
                        ?>

                    </select>
                </td>
            </tr>
            <tr>
                <td><label for ="team">Team</td>
                <td><select name ="team">
                        <?php
                        // Iterating through the array that contains the teams which are passed on by the handler
                        foreach($teams as $key => $value){
                            ?>
                            <option value="<?php echo $key; ?>" <?php if($key == $keyOfTeamOfMemberToEdit){echo "selected";}?> > <?php echo $value; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for ="destination">Bestemming</td>
                <td><input type="text" name="destination" value="<?php echo $destinationMemberToEdit; ?>"></td>
            </tr>
            <tr>
                <td><label for ="drinkpreference">Drankvoorkeur</td>
                <td><select name="drinkpreference">
                        <?php
                        // Iterating through the array that contains the drink preferences which are passed on by the handler
                        foreach($drinkPreferences as $item){
                            ?>
                            <option value="<?php echo strtolower($item); ?>" <?php if($item == $drinkPreferenceMemberToEdit){echo "selected";}?> ><?php echo $item; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for ="workingdays[]">Werkdagen</td>
                <td>
                    <input type="checkbox" name="workingdays[]" value="Monday" <?php if(in_array("Monday", $workingdaysMemberToEdit)){echo "checked";}?> >Maandag<br>
                    <input type="checkbox" name="workingdays[]" value="Tuesday" <?php if(in_array("Tuesday", $workingdaysMemberToEdit)){echo "checked";}?> >Dinsdag<br>
                    <input type="checkbox" name="workingdays[]" value="Wednesday" <?php if(in_array("Wednesday", $workingdaysMemberToEdit)){echo "checked";}?> >Woensdag<br>
                    <input type="checkbox" name="workingdays[]" value="Thursday" <?php if(in_array("Thursday", $workingdaysMemberToEdit)){echo "checked";}?> >Donderdag<br>
                    <input type="checkbox" name="workingdays[]" value="Friday" <?php if(in_array("Friday", $workingdaysMemberToEdit)){echo "checked";}?> >Vrijdag<br>
                </td>
            </tr>
        </table>

        <br>
        <br>

        <button type="submit" name="editMemberButton">Sla wijzigingen op</button>
        <button type="submit" name="deleteMemberButton" onclick="clicked(event)">Verwijder lid</button>


    </form>


</div>

</body>


</html>

<!-- added by AU. 21.03.2018 - Delete confirmation -->
<script>
    function clicked(e)
    {
        if(!confirm('Weet je zeker dat je dit lid wilt verwijderen?'))e.preventDefault();
    }
</script>
