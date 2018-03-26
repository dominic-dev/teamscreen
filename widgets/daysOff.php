<?php


$tabMembers = $allMembers;




?>

<div id="daysOff" class="widgetBoxSmall">
    <h2><span>&#127958 Vrije dagen</span>
        <div class="tab">
            <button class="tablinks" onclick="<?php //currentWeekMembers()  ?>; <script> window.location.reload(); </script>">Huidige week</button>
            <button class="tablinks" onclick="<?php //nextWeekMembers()  ?>; ">Volgende week</button>
        </div>
    </h2>

    <div id="timeOff-list">
        <?php foreach ($tabMembers as $member): ?>
        <div class="timeOff-item">
            <span><img src="https://jira.local.mybit.nl/secure/useravatar?size=small&ownerId=<?= $member->getUsername(); ?>"/></span>
            <ul>
                <li><span><?= $member->getName(); ?></span></li>
                <li><span>&#128197 05-03-2018 &#128336 vanaf 12:30</span></li>
            </ul>
        </div>
        <?php endforeach; ?>

    </div>




</div>