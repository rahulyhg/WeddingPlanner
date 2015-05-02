<?php 
$mysqli = new mysqli("localhost","root","incorrect","mgmt_webapp_msc"); 
 
if (mysqli_connect_errno()) { 
    printf("Connect failed: %s\n", mysqli_connect_error()); 
    exit(); 
}else{
	printf("connected successfully!");
} 
$mysqli->set_charset("utf-8"); 
?> 