<?php
include("functions/init.php");

if(!isset($_SESSION['admin'])) {  

redirect("./login");

} else {


include("include/sidebar.php"); 
}
?>

<!-- Modal -->
<div class="modal fade" id="ModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">

    </div>
</div>