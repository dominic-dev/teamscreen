<!--
    TEAM DRINKS WIDGET
    This widget periodically appoints a present team member ('the waiter')
    to fetch the drinks for his/her team.
    @authors: Emiel and Petri
-->
<link rel="stylesheet" href="widgets/teamDrinks.css">

<div id="teamDrinks" class="widgetBoxSmall">
    <h2><img src="widgets/coffee.png">
        Tijd voor koffie!</h2>
    <div id="current-waiter">

        <?php


        // $_SESSION['teams'][$teamId]]['waiterId'] = ??? ;

        var_dump($_SESSION['indexTeamMember']);
        // Determine if a new 'waiter' needs to be appointed.
        $refresh=false;

        if(isset($_SESSION['timeTeamDrinks'])){
            $refresh = (time() - $_SESSION['timeTeamDrinks']) >= 3600;
        }
        // Session variable is not set.
        else{
            $_SESSION['timeTeamDrinks'] = time();
            $refresh = true;
        }

        //$refresh = true; // For testing/demo purposes only; comment out when code complete

        //Randomly appoint the new waiter
        if($refresh){
            $randomIndex = array_rand($presentTeamMembers, 1);
            $_SESSION['indexTeamMember'] = $randomIndex;
            $_SESSION['timeTeamDrinks'] = time();
        }
        var_dump($presentTeamMembers);
        $waiter = ($presentTeamMembers[$_SESSION['indexTeamMember']]);
        var_dump($waiter);
        ?>

        <img src="http://tim.mybit.nl/jiraproxy.php/secure/useravatar?size=large&ownerId=<?= $waiter->getUsername(); ?>">
        <span class="name"><?= $waiter->getName(); ?></span>, het is jouw beurt om koffie te halen voor:
    </div>

    <div class="scrollable" id="drink-list">
        <ul id="drink-items">
            <!-- List the team member that are present today-->
            <?php foreach ($presentTeamMembers as $member): ?>
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
    /**
     * Animate the list if the list is longer than the defined widget height.
     * @type {HTMLElement | null}
     */
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
