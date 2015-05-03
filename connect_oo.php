<?php 
$mysqli = new mysqli("lamp.ecs.soton.ac.uk","MANG6180_student","tintin1830","mgmt_webapp_msc"); 
$sqlError=false;
if (mysqli_connect_errno()) { 
    $sqlError=true;
    exit(); 
}

$mysqli->set_charset("utf-8"); 
?> 