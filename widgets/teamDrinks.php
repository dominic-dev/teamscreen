<link rel="stylesheet" href="widgets/teamDrinks.css">

<div id="teamDrinks" class="widgetBoxSmall">
    <h2><img src="widgets/coffee.png">
        Tijd voor koffie!</h2>
    <div id="current-getter">
        <img src="http://tim.mybit.nl/jiraproxy.php/secure/useravatar?size=large&ownerId=petri"><span class="name">Agung</span>, het is jouw beurt om
        koffie te halen voor:
    </div>

    <div class="scrollable" id="drink-list">
        <ul id="drink-items">
            <?php foreach ($presentCoffeeMachineUsers as $member): ?>
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
