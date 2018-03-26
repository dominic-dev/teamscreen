<?php

$randomNumber = array_rand($allMembers,1);
$cleaner = ($allMembers[$randomNumber]);

?>
<div id="cleanCoffeeMachine" class="widgetBoxSmall">
    <h2>Schoonmaken koffie</h2>

    <div id="cleanerAvatar">

        <?=$cleaner->getName()?>

    </div>


    <div id="txt">
        <strong><?=$cleaner->getName()?>,</strong> jij gaat vandaag het koffieapparaat schoonmaken

    </div>



</div>

