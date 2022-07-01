<?php
include("components/top.php");
user_details();

if(!isset($_GET['id'])) {

    redirect("./books");

} else {

    $data = $_GET['id'];

}

$sql = "SELECT * FROM books WHERE `books_id` = '$data'";
$res = query($sql);
$row = mysqli_fetch_array($res);

$_SESSION['file'] = $row['book_file'];
?>

<style>
#read {

    position: fixed;
    z-index: 999;
    height: 100vh;
    width: 77%;
}

/* smart phone screen */
@media only screen and (max-width:600px) {
    #read {
        width: 93%;
    }
}
</style>

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
                <!-- Navbar -->

                <?php 
              include("components/navabr.php");
              ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">

                            <div style="position: fixed;" class="col-lg-8 mb-4 order-0 w-100">
                                <div class="card" id="read">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">You are currently reading
                                                    <br />
                                                    <span class="mt-5"><b
                                                            class="text-dark"><?php echo $row['book_title'] ?></b></span>
                                                </h5>
                                                <div class="">
                                                    <div class="container">
                                                        <div style="height: 80vh;" class=" block-quick-info-2-inner">
                                                            <div class="row">

                                                                <iframe src="softbooks/viewer.php"
                                                                    style="width: 100%; height: 75vh; z-index: 9999"></iframe>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>
                <!-- / Content -->





                <!-- Footer -->
                <?php
                    include("components/footer.php"); 
                    ?>
                <!-- / Footer -->

                <div class=" content-backdrop fade">
                </div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/ui-toasts.js"></script>
    <script src="ajax.js"></script>
</body>

</html>