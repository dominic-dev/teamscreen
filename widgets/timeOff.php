<link rel="stylesheet" href="widgets/timeOff.css">

<?php

$timeOffItems = array_merge($timeOffThisWeek, $timeOffNextWeek);

$islandIcon = '&#127958';
$calendarIcon = '&#128197';
$clockIcon = '&#128336';
$workDayEnd = 17;
$workDayStart = 9;

// returns different formatted strings based on start and enddate of leave
// multiple days = startdate t/m enddate
// single day = startdate
// single day back before end = enddate + time
// not yet implemented: arriving later, arriving later and return before day end
function dateString($startDate, $endDate) {

    global $workDayEnd, $workDayStart, $clockIcon;

    $sameDay = date_format($startDate, 'd-m') === date_format($endDate, 'd-m');
    $goneBeforeEnd = ((int)date_format($startDate, 'H')) > $workDayStart && ((int)date_format($endDate, 'H')) > $workDayEnd;
    //not yet implemented
    $startLater = ((int)date_format($startDate, 'H')) < $workDayStart && ((int)date_format($endDate, 'H')) < $workDayEnd;;
    $goneAfterStartBackBeforeEnd = ((int)date_format($startDate, 'H')) > $workDayStart && ((int)date_format($endDate, 'H')) < $workDayEnd;;

    $result = null;

    if($sameDay && $goneBeforeEnd){
        $result = date_format($startDate, 'd-m') . ' ' . $clockIcon . ' vanaf ' . date_format($startDate, 'H:i');
    } elseif ($sameDay){
        $result =  date_format($endDate, 'd-m');
    } else {
        $result =  date_format($startDate, 'd-m') . ' t/m ' . date_format($endDate, 'd-m');

    }
    return $result;
}
?>

<<<<<<< development:widgets/daysOff.php
<div id="daysOff" class="widgetBoxSmall">
    <h2>&#127958 Vrije dagen</h2>
=======
<div id="timeOff" class="widgetBoxSmall">
    <h2><?= $islandIcon; ?> Vrije dagen</h2>

    <div id="timeOff-list">
        <?php foreach ($timeOffItems as $unit) : ?>
        <div class="timeOff-item">
            <span class="timeOff-box" "timeOff-avatar">
                 <img class="userimg" src="http://tim.mybit.nl/jiraproxy.php/secure/useravatar?size=small&ownerId=<?= $unit->getMember()->getUsername(); ?>"/>
            </span>
            <span class="timeOff-box" "memberInfo">
                <span class="timeOff-name"><?= $unit->getMember()->getName(); ?></span>
            <span class="timeOff-date">
                <?= $calendarIcon; ?>
                <?= dateString(new DateTime($unit->getStartTime()),new DateTime($unit->getEndTime())); ?> </span>
            </span>
        </div>
        <?php endforeach; ?>
    </div>




</div>