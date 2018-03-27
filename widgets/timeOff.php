<link rel="stylesheet" href="widgets/timeOff.css">

<?php
    $tabMembers = $teamMembers;
?>

<div id="timeOff" class="widgetBoxSmall">
    <h2>&#127958 Vrije dagen</h2>

    <div id="timeOff-list">
        <?php foreach ($tabMembers as $member): ?>
        <div class="timeOff-item">
            <span class="timeOff-box" "timeOff-avatar">
                <img class="userimg" src="http://tim.mybit.nl/jiraproxy.php/secure/useravatar?size=small&ownerId=<?= $member->getUsername(); ?>"/>
            </span>
            <span class="timeOff-box" "memberInfo">
                <span class="timeOff-name"><?= $member->getName(); ?></span>
                <span class="timeOff-date">&#128197 05-03-2018 &#128336 vanaf 12:30</span>
            </span>
        </div>
        <?php endforeach; ?>

    </div>




</div>