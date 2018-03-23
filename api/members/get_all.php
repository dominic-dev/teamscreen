<?php
require_once('../../handlers/Database.php');
require_once('../../handlers/MemberHandler.php');
require_once('JsonMember.php');
require_once('JiraUser.php');

$db = new Database();
$memberHandler = new MemberHandler($db->getConnection());
$members = $memberHandler->getAll();

$jsonMembers =  [];
foreach($members as $member){
    array_push(
        $jsonMembers,
        new JsonMember(
            new JiraUser($member->getUsername()),
            $member->getDestination())
    );
}


$json = json_encode($jsonMembers, JSON_UNESCAPED_SLASHES);
$json = json_encode($jsonMembers, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
echo $json;
// echo "<pre>$json</pre>";
