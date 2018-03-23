<div id="teamDrinks" class="widgetBoxSmall">
    <h2>Tijd voor koffie!</h2>

    <p/>
    <table border="0" cellpadding="8" >

        <?php


        foreach ($allMembers as $member) {

            //var_dump($member);  break;
            $username = $member->getUsername();

            echo "<tr>";

            echo "<td><img height=\"30\" src=\"http://tim.mybit.nl/jiraproxy.php/secure/useravatar?ownerId=$username\" ></td>";
            echo "<td>" . $member->getName() . "</td>";
            echo "<td>" . $member->getDrinkPreference(). "</td>";

            echo "</tr>";

        }

        ?>
    </table>

</div>
