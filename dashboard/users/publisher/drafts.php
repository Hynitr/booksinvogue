<?php
include("components/top.php");
user_details();


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

                <!-- Content wrapper -->
                <div class="content-wrapper py-5 mt-5">
                    <!-- Content -->

                    <div id="allbook" class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">

                            <?php

                            $user =  $t_users['email'];

                                $ssl = "SELECT * FROM books WHERE `email_address` = '$user' AND `book_status` = 'draft' ORDER BY `books_id` desc";
                                $rss = query($ssl);

                                if(row_count($rss) == '' || row_count($rss) == null) {

                                $details = <<<DELIMITER

                                <!--Under Maintenance -->
                                <div class="container-xxl container-p-y text-center">
                                  <div class="misc-wrapper">
                                    <h2 class="mb-2 mx-2">Uh Oh 😢 </h2>
                                    <p class="mb-1 mx-2">You have no draft. </p>
                                    <a href="./upload" class="btn btn-primary">Upload your first book</a>
                                    <div class="mt-0">
                                      <img
                                        src="../assets/img/search.gif"
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


                                $category = "&nbsp;".$rws['category_1'];

                                $book = $rws['book_title'];

                                $redbb = str_replace(' ', '-', $book);

                                $det = strip_tags($rws['description']);
                                $frv = wordwrap($det, 70, "\n", TRUE); 
                                $y = substr($frv, 0, 120).'... <a href="./editdrafts?book='.$redbb.'">Read More</a>';

                                $descrp = ucfirst($y);
                                

                                $image = "../assets/bookscover/".$rws['book_cover'];

                                if(file_exists($image)){

                                    $imager = "../assets/bookscover/".$rws['book_cover'];
                                    
                                } else {

                                    $imager = "../assets/img/cover.jpg";
                                }

                        ?>
                            <div class="container-xxl flex-grow-1 container-p-y">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card mb-3">

                                            <div class="card-body">

                                                <div class="card-text">
                                                    <div class="d-grid d-sm-flex p-3 ">

                                                        <span>
                                                            <b><?php echo escape($rws['book_title']) ?></b>
                                                            <br /><br />
                                                            <?php echo $descrp ?>

                                                            <br /><br />



                                                            <p class="demo-inline-spacing">

                                                                <a href="./editdrafts?book=<?php echo $redbb ?>" class=" btn
                                                                    btn-primary me-1 text-white">
                                                                    Edit</i>
                                                                </a>
                                                                <a href="./deletedraft?book=<?php echo $redbb ?>&emal=<?php echo $rws['email_address'] ?>"
                                                                    class="btn btn-primary me-1 text-white">
                                                                    Delete
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
</body>

</html>