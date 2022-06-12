<?php
include('functions/init.php');

$data = $_SESSION['login'];

//get last seen
$lastseen = date('Y-m-d h:i:s');

$sql = "UPDATE users SET `lastseen` = '$lastseen', `status` = '1', `active` = '0' WHERE `usname` = '$data'";
$res = query($sql);

//destroy session
session_destroy();

//redirect to login page
redirect("./signin");
?>