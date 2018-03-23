<div id="teamDrinks" class="widgetBoxSmall">
    <h2>Tijd voor koffie!</h2>

    <p/>
    <table border="0" cellpadding="5" >

        <tr>
            <td colspan="1""><img height="60" src="http://tim.mybit.nl/jiraproxy.php/secure/useravatar?ownerId=agung.udijana" ></td>
            <td colspan="2"><b>Agung</b>, het is jouw beurt om koffie te halen voor:</td>
        </tr>

        <?php


        foreach ($allMembers as $member) {

            //var_dump($member);  break;
            $username = $member->getUsername();

            echo "<tr>";

            echo "<td><img height=\"25\" src=\"http://tim.mybit.nl/jiraproxy.php/secure/useravatar?ownerId=$username\" ></td>";
            echo "<td>" . $member->getName() . "</td>";
            echo "<td>" . $member->getDrinkPreference(). "</td>";

            echo "</tr>";

        }

        ?>
    </table>

</div>
