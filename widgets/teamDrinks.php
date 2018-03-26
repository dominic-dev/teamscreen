<link rel="stylesheet" href="/teamscreen/widgets/teamDrinks.css">

<div id="teamDrinks" class="widgetBoxSmall">
    <h2>Tijd voor koffie!</h2>
    <p/>
        <?php
        echo "<a><img src=http://tim.mybit.nl/jiraproxy.php/secure/useravatar?ownerId=agung.udijana>
              <span> Agung, het is jouw beurt om koffie te halen voor:</span></a>";
        ?>
    <ul id="drink-items">
        <?php foreach ($allMembers as $member) { ?>
         <li class='drink-item'>
                    <img src="http://tim.mybit.nl/jiraproxy.php/secure/useravatar?ownerId=<?= $member->getUsername() ?>" />
                    <span><?= $member->getName() ?></span>
                    <span class='icon'><img src=https://image.flaticon.com/icons/svg/273/273048.svg>
                    <span><?= $member->getDrinkPreference() ?></span></span>
         </li>
        <?php } ?>
    </ul>
</div>



