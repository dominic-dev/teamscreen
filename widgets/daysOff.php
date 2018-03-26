<?php

?>

    <div id="daysOff" class="widgetBoxSmall">
    <h2><span>&#127958 Vrije dagen</span>
        <span class="weekButton">Huidige Week</span>
        <span class="weekButton">Volgende week</span>
    </h2>
    <div id="timeOff-list">
        <?php foreach ($allMembers as $member): ?>
        <div>
            <span><img src="https://jira.local.mybit.nl/secure/useravatar?size=small&ownerId=<?= $member->getUsername(); ?>"/></span>
            <span><?= $member->getName(); ?></span>
            <span>&#128197 05-03-2018 &#128336 vanaf 12:30</span>
        </div>
        <?php endforeach; ?>

    </div>

</div>