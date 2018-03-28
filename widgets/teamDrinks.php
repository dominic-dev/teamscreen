<!--
    TEAM DRINKS WIDGET
    This widget periodically appoints a present team member ('the waiter')
    to fetch the drinks for his/her team.
    @authors: Emiel and Petri
-->
<link rel="stylesheet" href="widgets/teamDrinks.css">

<div id="teamDrinks" class="widgetBoxSmall">
    <h2><img src="widgets/coffee.png">
        Tijd voor koffie!</h2>
    <div id="current-waiter">

        <?php
        // Determine if a new 'waiter' needs to be appointed.
        $refresh=false;

        if(isset($_SESSION['timeTeamDrinks'])){
            $refresh = (time() - $_SESSION['timeTeamDrinks']) >= 3600;
        }
        // Session variable is not set.
        else{
            $_SESSION['timeTeamDrinks'] = time();
            $refresh = true;
        }
        //Randomly appoint the new waiter
        if($refresh){
            foreach($teams as $team) {
                $presTeamMembers = $memberHandler->getPresentByTeam($team->getId());
                if(!empty($presTeamMembers)) {
                    $randomPresentTeamMember = $presTeamMembers[array_rand($presTeamMembers, 1)];
                    $_SESSION['teams'][$team->getId()]['waiterId'] = $randomPresentTeamMember->getId();
                }
            }
            $_SESSION['timeTeamDrinks'] = time();
        }
        // Are team members present?
        if(empty($presentTeamMembers)) {
            echo '<img src="widgets/void.jpg">Er is niemand aanwezig om koffie te halen...';
        }
        else{
            $waiter = $presentTeamMembers[$_SESSION['teams'][$teamId]['waiterId']];
            echo '<img src="http://tim.mybit.nl/jiraproxy.php/secure/useravatar?size=large&ownerId=' . $waiter->getUsername() . '">';
            echo '<span class="name">' . $waiter->getName() . '</span>, het is jouw beurt om koffie te halen voor:';
        }
        ?>
    </div>
    <div class="scrollable" id="drink-list">
        <ul id="drink-items">
            <!-- List the team member that are present today-->
            <?php foreach ($presentTeamMembers as $member): ?>
                <li class='drink-item'>
                    <img class="userimg"
                         src="http://tim.mybit.nl/jiraproxy.php/secure/useravatar?size=small&ownerId=<?= $member->getUsername(); ?>"/>
                    <span><?= $member->getName(); ?></span>
                    <span class='icon'><img
                                src="widgets/<?= $member->getDrinkPreference(); ?>.png"/>(<?= $member->getDrinkPreference(); ?>
                        )</span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<script src="widgets/WidgetFrameControl.js" type="text/javascript"></script>