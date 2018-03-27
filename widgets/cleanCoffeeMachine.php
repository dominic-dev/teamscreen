<!--
    CLEAN COFFEE MACHINE WIDGET
    This widget periodically appoints a present team member ('the cleaner')
    to clean the coffee machine
    @authors: Paul
-->

<?php

$refresh = false;

if(isset($_SESSION['timeCleanCoffeeMachine'])){
    //24 hr refresh
    $refresh = (time() - $_SESSION['timeCleanCoffeeMachine']) >= 86400;
}
else{
    $_SESSION['timeCleanCoffeeMachine'] = time();
    $refresh = true;
}

if($refresh){
    //picks a random index of the allMembers list
    $randomIndex = array_rand($allMembers,1);
    $_SESSION['indexMember'] = $randomIndex;
    $_SESSION['timeCleanCoffeeMachine'] = time();
}

//picks the Member-object that belongs to the random index
$cleaner = ($allMembers[$_SESSION['indexMember']]);

?>

<link rel="stylesheet" href="widgets/cleanCoffeeMachine.css">

<div id="cleanCoffeeMachine" class="widgetBoxSmall">
    <h2>Koffieapparaat schoonmaken</h2>

    <div id="cleanerAvatar">

        <img src="http://tim.mybit.nl/jiraproxy.php/secure/useravatar?ownerId=<?= $cleaner->getUsername() ?>" />

    </div>

    <div id="cleanerTxt">

        <span class="fat"><?=$cleaner->getName()?></span>, jij gaat vandaag het koffieapparaat schoonmaken!

    </div>
</div>

