<?php 
$mysqli = new mysqli("linuxproj.ecs.soton.ac.uk","mak1g11","incorrect","db_mak1g11"); 
$sqlError=false;
if (mysqli_connect_errno()) { 
    $sqlError=true;
    exit(); 
}

$mysqli->set_charset("utf-8"); 
?> 