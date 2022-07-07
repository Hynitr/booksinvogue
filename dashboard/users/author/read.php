<?php
include("components/top.php");
user_details();

if(!isset($_GET['book'])) {

    redirect("./books");

} else {

    $book = clean(escape($_GET['book']));
    $data = str_replace('-', ' ', $book);

}

$sql = "SELECT * FROM books WHERE `book_title` = '$data'";
$res = query($sql);
$row = mysqli_fetch_array($res);

$_SESSION['file'] = $row['book_file'];
?>


<body>
    <style>
    /* We are stopping user from
         printing our webpage */
    @media print {

        html,
        body {

            /* Hide the whole page */
            display: none;
        }
    }
    </style>
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

                            <div class="col-lg-12 mb-4 order-0 h-100">
                                <iframe src="../softbooks/viewer.php"
                                    style="width: 100%; height: 80vh; z-index: 9999; border: none"></iframe>
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
    <script src="../assets/js/ui-toasts.js"></script>
    <script src="ajax.js"></script>
    <script>
    $(document).bind("contextmenu", function(e) {
        return false;
    });
    </script>
</body>

</html>