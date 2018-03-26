<?php

session_start();
if(!isset($_SESSION['time'])){
    $_SESSION['time'] = time();
}

if((time() - $_SESSION['time']) >= 5){
    echo "5 seconds have passed.<br />";
    $_SESSION['time'] = time();
}

echo "current time: " . time() . "<br />";
echo "stored time: " . $_SESSION['time'];
