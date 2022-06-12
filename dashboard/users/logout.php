<?php
include('functions/init.php');

$data = $_SESSION['login'];

//get last seen
$lastseen = date('Y-m-d h:i:sa');

$sql = "UPDATE users SET `lastseen` = '$lastseen' WHERE `email` = '$data'";
$res = query($sql);

//destroy session
session_destroy();

//redirect to login page
redirect("./signup");
?>