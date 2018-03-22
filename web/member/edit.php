<?php

require_once('././models/Member.php');
require_once('././handlers/Database.php');
require_once('././handlers/MemberHadler.php');

// GET 
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(isset($_GET['id'])){
        $id = parse_int($_GET['id']);
        $member = $memberHandler->get($id);
        require_once('././views/editmember.php');
    }
    else{
        $member = new Member();
        require_once('././views/addmember.php');
    }
}

// POST
else{
    // read form
    if($memberHandler->save($member)){
        // forward succes
    }
    // forward failure
}
