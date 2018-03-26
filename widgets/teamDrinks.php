<link rel="stylesheet" href="widgets/teamDrinks.css">

<div id="teamDrinks" class="widgetBoxSmall">
    <h2>Tijd voor koffie!</h2>
    <div id="current-getter">

        <?php

        $refresh=false;

        if(isset($_SESSION['timeTeamDrinks'])){
            $refresh = (time() - $_SESSION['timeTeamDrinks']) >= 3600;
        }
        else{
            $_SESSION['timeTeamDrinks'] = time();
            $refresh = true;
        }

        //$refresh = true; // TODO comment out when code complete

        if($refresh){
            $randomIndex = array_rand($teamMembers, 1);
            $_SESSION['indexTeamMember'] = $randomIndex;
            $_SESSION['timeTeamDrinks'] = time();
        }
        $waiter = ($teamMembers[$_SESSION['indexTeamMember']]);
        ?>

        <img src="http://tim.mybit.nl/jiraproxy.php/secure/useravatar?size=large&ownerId=<?= $waiter->getUsername(); ?>"><span class="name"><?= $waiter->getName(); ?></span>, het is jouw beurt om
        koffie te halen voor:
    </div>

    <div class="scrollable" id="drink-list">
        <ul id="drink-items">
            <?php foreach ($teamMembers as $member): ?>
                <li class='drink-item'>
                    <img class="userimg"
                         src="http://tim.mybit.nl/jiraproxy.php/secure/useravatar?size=small&ownerId=<?= $member->getUsername(); ?>"/>
                    <span><?= $member->getName(); ?></span>
                    <span class='icon'><img
                                src="widgets/<?= $member->getDrinkPreference(); ?>.png"/>(<?= $member->getDrinkPreference(); ?>
                        )</span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<script>

    var drinklist = document.getElementById('drink-list');
    function step() {
        console.log(drinklist.scrollTop+2);
        console.log((drinklist.scrollHeight - drinklist.offsetHeight ));
        if (drinklist.scrollTop<=0) {
            direction = 1;
        } else if (drinklist.scrollTop+2 > ((drinklist.scrollHeight - drinklist.offsetHeight ))) {
            direction = -1;
        }
        drinklist.scrollTop += direction;
        window.requestAnimationFrame(step);
    }
    window.requestAnimationFrame(step);
</script>
