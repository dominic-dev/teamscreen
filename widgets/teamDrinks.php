<link rel="stylesheet" href="/teamscreen/widgets/teamDrinks.css">

<div id="teamDrinks" class="widgetBoxSmall">
    <h2>Tijd voor koffie!</h2>
    <p/>
        <?php

        
        echo "<a><img src=https://jira.local.mybit.nl/secure/useravatar?size=large&ownerId=emiel.nijhuis&avatarId=13767>
              <span> Agung, het is jouw beurt om koffie te halen voor:</span></a>";
        ?>
    <ul id="drink-items">
        <?php foreach ($allMembers as $member) { ?>
         <li class='drink-item'>
                    <img src="https://jira.local.mybit.nl/secure/useravatar?size=small&ownerId=<?= $member->getUsername() ?>" />
                    <span><?= $member->getName() ?></span>
                    <span class='icon'><img src=https://image.flaticon.com/icons/svg/273/273048.svg>
                    <span><?= $member->getDrinkPreference() ?></span></span>
         </li>
        <?php } ?>
    </ul>
</div>



