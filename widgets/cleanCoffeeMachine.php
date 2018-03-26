<?php

$refresh=false;
$set = isset($_SESSION['timeCleanCoffeeMachine']);

if($set){
    $refresh = (time() - $_SESSION['timeCleanCoffeeMachine']) >= 10;
}
else{
    $_SESSION['timeCleanCoffeeMachine'] = time();
    $refresh = true;
}

if($refresh){
    echo 'refresh<br/>';
    $randomIndex = array_rand($allMembers,1);
    $_SESSION['indexMember'] = $randomIndex;
    $_SESSION['timeCleanCoffeeMachine'] = time();
}

$cleaner = ($allMembers[$_SESSION['indexMember']]);

echo "current time: " . time() . "<br />";
echo "stored time: " . $_SESSION['timeCleanCoffeeMachine'];


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

