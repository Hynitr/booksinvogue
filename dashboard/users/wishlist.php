<?php
include("components/top.php");
user_details();
?>


<style>
.booksec {
    height: 30vh;
}

#custom {

    position: fixed;
    z-index: 999;
    width: 80%;
}

/* smart phone screen */
@media only screen and (max-width:600px) {
    .booksec {
        height: 20vh;
    }

    #custom {

        width: 100%;
    }
}
</style>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">


            <!-- Menu -->

            <?php
            include("components/sidded.php");            
            ?>

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <div id="custom">

                    <!-- Navbar -->

                    <?php 
                    include("components/navy.php");
                    ?>

                    <!-- / Navbar -->

                </div>

                <!-- Content wrapper -->
                <div class="content-wrapper py-5 mt-5">
                    <!-- Content -->

                    <div id="allbook" class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">

                            <?php

                            $user =  $_SESSION['login'];

                            $sql = "SELECT * FROM `boughtbook` WHERE `userid` = '$user' AND `reading` = 'wishlist'";
                            $res = query($sql);

                            if(row_count($res) == null) {

                                $details = <<<DELIMITER

                                <!--Under Maintenance -->
                                <div class="container-xxl container-p-y text-center">
                                  <div class="misc-wrapper">
                                    <h2 class="mb-2 mx-2">Uh Oh 😢 </h2>
                                    <p class="mb-4 mx-2">You've not added any book to your wishlist yet. </p>
                                    <a href="./books" class="btn btn-primary">Get some book(s) to my wishlist</a>
                                    <div class="mt-4">
                                      <img
                                        src="assets/img/illustrations/girl-doing-yoga-light.png"
                                        alt="girl-doing-yoga-light"
                                        width="500"
                                        class="img-fluid"
                                        data-app-dark-img="illustrations/girl-doing-yoga-dark.png"
                                        data-app-light-img="illustrations/girl-doing-yoga-light.png"
                                      />
                                    </div>
                                  </div>
                                </div>
                                <!-- /Under Maintenance -->


                                DELIMITER;

                                echo $details;


                            }

                            while($row = mysqli_fetch_array($res)) {

                                $det = strip_tags($row['description']);
                                $frv = wordwrap($det, 70, "\n", TRUE); 
                                $y = substr($frv, 0, 120).'... ';
                                

                                $image = "assets/bookscover/".$row['book_cover'];

                                if(file_exists($image)){

                                    $imager = "assets/bookscover/".$row['book_cover'];
                                    
                                } else {

                                    $imager = "assets/img/cover.jpg";
                                }

                        ?>

                            <div class="col-lg-4 col-md-4 col-sm-12 order-0">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-4 text-md-left text-lg-left">
                                        <div class="card">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-center justify-content-center">
                                                    <div class="flex-shrink-0">
                                                        <img style="width: 200px; height: 200px;"
                                                            src="<?php  echo $imager ?>"
                                                            alt="<?php  echo $row['book_title'] ?>"
                                                            class="img-fluid justify-content-between align-items-center d-block mx-auto mx-md-0"
                                                            width="100px" />
                                                    </div>

                                                </div>

                                                <div class="booksec col-lg-12 col-md-12 col-sm-12 text-center">
                                                    <h4 class="fw-bold text-primary d-block mt-4 mb-3">
                                                        <?php  echo ucwords($row['book_title']) ?>
                                                    </h4>

                                                    <p style="font-size: 13px;" class="fw-semibold d-block mb-4">
                                                        By: <span
                                                            class="text-dark fw-bold"><?php  echo ucwords($row['author']) ?></span>
                                                    </p>

                                                    <p style="font-size: 13px; text-align: left;"
                                                        class="fw-semibold text-align-left d-block mb-4">
                                                        <?php  echo $y ?>
                                                    </p>

                                                </div>


                                                <div
                                                    class="mt-0 p-0 justify-content-center text-center align-item-center">

                                                    <h4 class="fw-semibold d-block">
                                                        Price: <span
                                                            class="text-dark fw-bold">₦<?php  echo number_format($row['selling_price']) ?></span>
                                                    </h4>

                                                    <div
                                                        class="row text-center justify-content-center align-item-center">

                                                        <button
                                                            class="btn col-6 btn-primary justify-content-center align-item-center offcanvasr"
                                                            type="button" data-bs-toggle="offcanvas"
                                                            data-bs-target="#offcanvasBackdrop"
                                                            data-id="<?php echo $row['books_id'] ?>"
                                                            aria-controls="offcanvasBackdrop">
                                                            Read Now
                                                        </button>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <?php
                            }
                            ?>



                        </div>


                    </div>



                </div>
                <!-- / Content -->


                <div class="content-backdrop fade"></div>
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

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <script src="ajax.js"></script>
</body>

</html>