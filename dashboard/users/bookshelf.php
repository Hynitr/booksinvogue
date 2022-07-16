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


            <div style="display: none" id="pybst">
                <div class="bs-toast toast show bg-primary toast-placement-ex m-2" role="alert" aria-live="assertive"
                    aria-atomic="true" data-delay="20">
                    <div class="toast-header">
                        <i class="bx bx-bell me-2"></i>
                        <div class="me-auto fw-semibold">You've got a new book</div>
                        <small>Just now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">A new book has just been added to your bookshelf
                    </div>
                </div>
            </div>
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
                    include("components/navabr.php");
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

                                $ssl = "SELECT * FROM boughtbook WHERE `userid` = '$user' AND `reading` = 'Yes' ORDER BY `sn` desc";
                                $rss = query($ssl);

                                if(row_count($rss) == '' || row_count($rss) == null) {

                                $details = <<<DELIMITER

                                <!--Under Maintenance -->
                                <div class="container-xxl container-p-y text-center">
                                  <div class="misc-wrapper">
                                    <h2 class="mb-2 mx-2">Uh Oh 😢 </h2>
                                    <p class="mb-4 mx-2">You've not added any book to your bookshelf yet. </p>
                                    <a href="./books" class="btn btn-primary">Get some book(s) to your bookshelf</a>
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


                            } else {

                            while($rws = mysqli_fetch_array($rss)) {

                                $bkid = $rws['bookid'];

                                $sql = "SELECT * FROM books WHERE `books_id` = '$bkid'";
                                $res = query($sql);

                                $row = mysqli_fetch_array($res);

                                $category = "&nbsp;".$row['category_1'];

                                $det = strip_tags($row['description']);
                                $frv = wordwrap($det, 70, "\n", TRUE); 
                                $y = substr($frv, 0, 120).'... <a href="./read?id='.$row['books_id'].'">Read More</a>';

                                $descrp = ucfirst($y);
                                

                                $image = "assets/bookscover/".$row['book_cover'];

                                if(file_exists($image)){

                                    $imager = "assets/bookscover/".$row['book_cover'];
                                    
                                } else {

                                    $imager = "assets/img/cover.jpg";
                                }


                                $id = $row['books_id'];

                                $sel = "SELECT sum(`id`) AS `bookbought` FROM `boughtbook` WHERE `bookid` = '$id'";
                                $rfs = query ($sel);

                                if(row_count($rfs) == '' || row_count($rfs) == null) {

                                    $booktot = 0 ." copy sold";
                                    
                                } else {
                            
                                    $bow = mysqli_fetch_array($rfs);

                                    if($bow['bookbought'] == 0 || $bow['bookbought'] == null) {

                                        $booktot = 0 ." copy sold";

                                    } else {

                                        if($bow['bookbought'] == 1) {

                                            $booktot = 1 ." copy sold";
                                            
                                        } else {
                                            $booktot = number_format($bow['bookbought'])." copies sold";

                                        }
                                    }
                                    
                                }

                        ?>
                            <div class="container-xxl flex-grow-1 container-p-y">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card mb-3">

                                            <div class="card-body">

                                                <div class="card-text">
                                                    <div class="d-grid d-sm-flex p-3 ">
                                                        <img src="<?php echo $imager ?>" alt="collapse-image"
                                                            height="205"
                                                            class="me-4 mb-sm-0 mb-4 text-center justify-content-center" />

                                                        <span>
                                                            <b><?php echo escape($row['book_title']) ?></b>
                                                            <br />
                                                            by: <b><small><?php echo $row['author'] ?></small></b>
                                                            <br /><br />
                                                            <?php echo $descrp ?>

                                                            <br /><br />

                                                            <b>₦<?php echo number_format($row['selling_price']) ?></b>

                                                            <br /><br />
                                                            <?php echo $row['language'] ?> &nbsp;|&nbsp;
                                                            <?php echo $category ?>&nbsp;|&nbsp;
                                                            <?php echo $booktot ?>

                                                            <p class="demo-inline-spacing">

                                                                <a href="./read?id=<?php echo $row['books_id'] ?>"
                                                                    class="btn btn-primary me-1" type="button">Start
                                                                    Reading </a>

                                                                <a class="btn btn-primary me-1">
                                                                    <i class="bx bx-share-alt text-white"></i>
                                                                </a>
                                                            </p>

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
    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="node_modules/canvas-confetti/dist/confetti.browser.js"></script>
    <script>
    function shout() {

        var count = 1000;
        var defaults = {
            origin: {
                y: 0.7
            }
        };

        function fire(particleRatio, opts) {
            confetti(Object.assign({}, defaults, opts, {
                particleCount: Math.floor(count * particleRatio)
            }));
        }

        fire(0.25, {
            spread: 126,
            startVelocity: 95,
        });
        fire(0.2, {
            spread: 360,
        });
        fire(0.35, {
            spread: 360,
            decay: 0.91,
            scalar: 0.8
        });
        fire(0.1, {
            spread: 360,
            startVelocity: 25,
            decay: 0.92,
            scalar: 1.2
        });
        fire(0.1, {
            spread: 360,
            startVelocity: 45,
        });

    }
    </script>
    <?php
    if(isset($_SESSION['bookmsg'])) {
        
        if(isset($_SESSION['bookmsg']) == 'Your Wallet has been funded successfully') {
        
        echo "
        
        <script>
        $('#pybst').show(); shout();
        </script>
        ";
        } 

        unset($_SESSION['bookmsg']);
    }
    ?>
</body>

</html>