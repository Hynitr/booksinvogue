<?php 
include("functions/init.php");

if(!isset($_SESSION['login'])) {

    redirect("./logout");
 
     }

include("head.php");
?>