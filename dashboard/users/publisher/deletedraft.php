<?php
include("components/top.php");
user_details();

if(!isset($_GET['book']) && !isset($_GET['emal'])) {

    redirect("./drafts");

} else {

    $data = clean(escape($_GET['book']));
    $emal = clean(escape($_GET['emal']));

}


if(isset($_SESSION['eddbooknew'])) {

    unset($_SESSION['eddbooknew']);
}

if(isset($_SESSION['bookupl'])) {

    unset($_SESSION['bookupl']);
}

if(isset($_SESSION['booknew'])) {

    unset($_SESSION['booknew']);
}

if(isset($_SESSION['eddbookupl'])) {

    unset($_SESSION['eddbookupl']);
}
?>


<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">


            <!-- Menu -->

            <?php
            include("components/sidebar.php");            
            ?>


            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <div id="custom">

                    <!-- Navbar -->

                    <?php 
                    include("components/navabr.php");
                    ?>

                    <!-- / Navbar -->

                </div>



                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalCenter" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">
                        Are you sure you want to delete this drafted book?

                    </h5>
                    <br />


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">


                            <p class="text-danger">This process is irreversible.
                            </p>
                        </div>
                    </div>


                    <p id="bkpymsg" class="text-danger"></p>
                    <p id="bkid" hidden><?php echo $data; ?></p>
                    <p id="authoremail" hidden><?php echo $emal ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" id="deldraft" class="btn btn-primary">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js ../assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <script src="ajax.js"></script>

    <script>
    $(document).ready(function() {
        $("#modalCenter").modal("show");
    });
    </script>
</body>

</html>