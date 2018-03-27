<link rel="stylesheet" href="widgets/timeOff.css">

<?php


$tabMembers = $teamMembers;




?>

<<<<<<< development:widgets/daysOff.php
<div id="daysOff" class="widgetBoxSmall">
    <h2>&#127958 Vrije dagen</h2>
=======
<div id="timeOff" class="widgetBoxSmall">
    <h2><span class="timeOff-box" id="title">&#127958 Vrije dagen</span>
        <span class="tab" "timeOff-box">
            <button class="tablinks" onclick="">Huidige week</button>
            <button class="tablinks" onclick="">Volgende week</button>
        </span>
    </h2>
>>>>>>> time off formatting:widgets/timeOff.php

    <div id="timeOff-list">
        <?php foreach ($tabMembers as $member): ?>
        <div class="timeOff-item">
            <div class="timeOff-box">
                <span ><img class="userimg" src="http://tim.mybit.nl/jiraproxy.php/secure/useravatar?size=small&ownerId=<?= $member->getUsername(); ?>"/></span>
            </div>
            <div class="timeOff-box">
                <span id="timeOff-name"><?= $member->getName(); ?></span>
                <span id="timeOff-date">&#128197 05-03-2018 &#128336 vanaf 12:30</span>
            </div>
        </div>
        <?php endforeach; ?>

    </div>




</div>