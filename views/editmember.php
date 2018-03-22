<?php
require_once('../header.php');

/*
 Authors: Petri van Niekerk & Agung Udijana
*/

$memberId = $member->getId();
$drinkPreferences = array ('coffee', 'tea', 'water');
$teamMemberToEdit = $member->getTeamId();
$nameMemberToEdit = $member->getName();
$usernameMemberToEdit = $member->getUsername();
$drinkPreferenceMemberToEdit = $member->getDrinkPreference();
$destinationMemberToEdit = $member->getDestination();
$workingdaysMemberToEditString = $member->getWorkingDays();
$workingdaysMemberToEdit = explode(',', $workingdaysMemberToEditString);

session_start();
if(isset($_SESSION['editSuccess'])) {
    $success = $_SESSION['editSuccess'];
}
else {
    $success ='';
}
unset($_SESSION['editSuccess']);

?>

    <title>Wijzig teamlid</title>
</head>
<body>

<div id="general">

    <h1>Wijzig teamlid</h1>

    <h2><?= $success ?></h2>

    <form action="./edit.php" method="post">


        <table>
            <input type="hidden" value="<?= $memberId; ?>" name="id" />
            <tr>
                <td><label for="name">Naam</label> </td>
                <td> <input type="text" name="name" value="<?php echo $nameMemberToEdit; ?>"></td>
            </tr>
            <tr>
                <td><label for ="username">Jira gebruikersnaam</td>
                <td><input type="text" name="username" value ="<?php echo $usernameMemberToEdit; ?>"></td>
            </tr>
            </tr>
            <tr>
                <td><label for ="team">Team</td>
                <td><select name ="team">
                        <?php
                        // Iterating through the array that contains the teams which are passed on by the handler
                        foreach($teams as $team){
                            $teamId = $team->getId();
                            ?>
                            <option value="<?= $teamId ?>" <?php if($teamId == $teamMemberToEdit){echo "selected";}?> > <?= $team->getLabel() ?></option>
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
                <td><label for ="drinkPreference">Drankvoorkeur</td>
                <td><select name="drinkPreference">
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
                <td><label for ="workingDays[]">Werkdagen</td>
                <td>
                    <input type="checkbox" name="workingDays[]" value="Monday" <?php if(in_array("monday", $workingdaysMemberToEdit)){echo "checked";}?> >Maandag<br>
                    <input type="checkbox" name="workingDays[]" value="Tuesday" <?php if(in_array("tuesday", $workingdaysMemberToEdit)){echo "checked";}?> >Dinsdag<br>
                    <input type="checkbox" name="workingDays[]" value="Wednesday" <?php if(in_array("wednesday", $workingdaysMemberToEdit)){echo "checked";}?> >Woensdag<br>
                    <input type="checkbox" name="workingDays[]" value="Thursday" <?php if(in_array("thursday", $workingdaysMemberToEdit)){echo "checked";}?> >Donderdag<br>
                    <input type="checkbox" name="workingDays[]" value="Friday" <?php if(in_array("friday", $workingdaysMemberToEdit)){echo "checked";}?> >Vrijdag<br>
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
