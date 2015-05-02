<?php 
$mysqli = new mysqli("localhost","root","incorrect","mgmt_webapp_msc"); 
$sqlError=false;
if (mysqli_connect_errno()) { 
    $sqlError=true;
    exit(); 
}

$mysqli->set_charset("utf-8"); 
?> 