<link rel="stylesheet" href="widgets/timeOff.css">

<?php


$tabMembers = $allMembers;




?>

<<<<<<< development:widgets/daysOff.php
<div id="daysOff" class="widgetBoxSmall">
    <h2>&#127958 Vrije dagen</h2>
=======
<div id="timeOff" class="widgetBoxSmall">
    <h2><span>&#127958 Vrije dagen</span>
        <div class="tab">
            <button class="tablinks" onclick="<?php //currentWeekMembers()  ?>; <script> window.location.reload(); </script>">Huidige week</button>
            <button class="tablinks" onclick="<?php //nextWeekMembers()  ?>; ">Volgende week</button>
        </div>
    </h2>
>>>>>>> time off formatting:widgets/timeOff.php

    <div id="timeOff-list">
        <?php foreach ($tabMembers as $member): ?>
        <div class="timeOff-item">
            <span class="timeOff-box" ><img src="https://jira.local.mybit.nl/secure/useravatar?size=small&ownerId=<?= $member->getUsername(); ?>"/></span>
                <ul class="timeOff-box">
                    <li><?= $member->getName(); ?></li>
                    <li>&#128197 05-03-2018 &#128336 vanaf 12:30</li>
                </ul>
        </div>
        <?php endforeach; ?>

    </div>




</div>