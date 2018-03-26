<?php

$refresh=false;

if(isset($_SESSION['timeCleanCoffeeMachine'])){
    $refresh = (time() - $_SESSION['timeCleanCoffeeMachine']) >= 86400;
}
else{
    $_SESSION['timeCleanCoffeeMachine'] = time();
    $refresh = true;
}

if($refresh){
    $randomIndex = array_rand($allMembers,1);
    $_SESSION['indexMember'] = $randomIndex;
    $_SESSION['timeCleanCoffeeMachine'] = time();
}

$cleaner = ($allMembers[$_SESSION['indexMember']]);

?>
<div id="cleanCoffeeMachine" class="widgetBoxSmall">
    <h2>Schoonmaken koffie</h2>

    <div id="cleanerAvatar">

        <img src="http://tim.mybit.nl/jiraproxy.php/secure/useravatar?ownerId=<?= $cleaner->getUsername() ?>" />

    </div>


    <div id="txt">

        <span class="fat"><?=$cleaner->getName()?>,</span> jij gaat vandaag het koffieapparaat schoonmaken
        //echo "current time: " . time() . "<br />";
        //echo "stored time: " . $_SESSION['timeCleanCoffeeMachine'];

    </div>



</div>

