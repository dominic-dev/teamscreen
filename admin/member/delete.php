<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
    // Only allow post requests.
    die();
}

require_once('././handlers/Database.php');
require_once('././handlers/MemberHadler.php');

$db = new Database();
$conn = $db->getConnection();

$memberHandler = new MemberHandler($conn);
$id = parse_int($_GET['id']);

if($memberHandler->delete()){
    // forward success
}
// forward failure
