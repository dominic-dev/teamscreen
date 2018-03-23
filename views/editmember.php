<?php
require_once('../header.php');

/*
 Authors: Petri van Niekerk & Agung Udijana
*/

// TODO ??
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
                    <?php
                    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                    foreach($days as $day){
                        echo "<input type='checkbox' name='workingDays[]' value='$day'";
                        if (in_array(strtolower($day), $workingdaysMemberToEdit)) echo " checked";
                        echo ">$day<br>";
                    }
                    ?>
                </td>
            </tr>
        </table>

        <br>
        <br>

        <button type="submit" name="editMemberButton">Sla wijzigingen op</button>
    </form>
                        <button name="deleteMemberButton" onclick="clicked(event)">Verwijder lid</button>


</div>

</body>


</html>

<!-- added by AU. 21.03.2018 - Delete confirmation -->
<script>
    function clicked(e)
    {
        if(!confirm('Weet je zeker dat je dit lid wilt verwijderen?'))e.preventDefault();
        var form = document.createElement('form');
        document.body.appendChild(form);
        form.method = 'post';
        form.action = 'delete.php';
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'id';
        input.value = <?= $member->getId() ?>;
        form.appendChild(input);
        form.submit();
    }
</script>


