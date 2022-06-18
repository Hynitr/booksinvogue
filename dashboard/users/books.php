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

                            $sql = "SELECT * FROM `books` ORDER BY RAND()";
                            $res = query($sql);

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

                                                        <span class="mx-2 badge bg-label-primary col-2 p-1"
                                                            data-bs-toggle="popover" data-bs-offset="0,14"
                                                            data-bs-placement="left" data-bs-html="true"
                                                            data-bs-content="<p>This is a very beautiful popover, show some love.</p> <div class='d-flex justify-content-between'><button type='button' class='btn btn-sm btn-outline-secondary'>Skip</button><button type='button' class='btn btn-sm btn-primary'>Read More</button></div>"
                                                            title="Popover Title"><i class="bx bx-star"></i></a>
                                                        </span>

                                                        <button
                                                            class="btn col-6 btn-primary justify-content-center align-item-center offcanvasr"
                                                            type="button" data-bs-toggle="offcanvas"
                                                            data-bs-target="#offcanvasBackdrop"
                                                            data-id="<?php echo $row['books_id'] ?>"
                                                            aria-controls="offcanvasBackdrop">
                                                            More
                                                            Details
                                                        </button>

                                                        <span class="mx-2 badge bg-label-primary col-2 p-1"><i
                                                                class="bx bx-share-alt"></i></a>
                                                        </span>

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

                    <div style="display: none;" id="searchresult">
                        <div id="bookres" class="container-xxl flex-grow-1 container-p-y">


                            <div class="row">

                                <?php

                                $bookk = '<p id="resnsg"></p>';


                            $sql = "SELECT * FROM `books` WHERE `book_title` = '$bookk'";
                            $res = query($sql);

                            echo $bookk."<br/> hshs"; 
                            
                            $my_array = [];
                            
                            while($row = mysqli_fetch_array($res)) {

                                $my_array[] = $myvar;
                            }

                            $js_array = json_encode($my_array);


                            //echo $js_array;

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
                                                                alt="<?php  echo $$js_array['book_title'] ?>"
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

                                                        <p style="font-size: 13px;" class="fw-semibold d-block mb-3">
                                                            <?php  echo "&#8226; &nbsp;".ucwords($row['category_1'])."&nbsp; &#8226; &nbsp;".ucwords($row['category_2']) ?>
                                                        </p>

                                                    </div>


                                                    <div
                                                        class="mt-0 p-0 justify-content-center text-center align-item-center">

                                                        <h4 class="fw-semibold d-block">
                                                            Price: <span
                                                                class="text-dark fw-bold">₦<?php  echo number_format($row['selling_price']) ?></span>
                                                        </h4>

                                                        <button
                                                            class="btn btn-primary justify-content-center align-item-center offcanvasr"
                                                            type="button" data-bs-toggle="offcanvas"
                                                            data-bs-target="#offcanvasBackdrop"
                                                            data-id="<?php echo $row['books_id'] ?>"
                                                            aria-controls="offcanvasBackdrop">View
                                                            More
                                                            Details
                                                        </button>
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


                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBackdrop"
                    aria-labelledby="offcanvasBackdropLabel">
                    <div class="canvastale" id="canvastale">
                    </div>
                </div>



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