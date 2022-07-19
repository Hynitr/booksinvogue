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
                <div class="content-wrapper py-5 mt-3">
                    <!-- Content -->

                    <div id="allbook" class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">

                            <?php

                            $sql = "SELECT * FROM `books` ORDER BY RAND()";
                            $res = query($sql);

                            while($row = mysqli_fetch_array($res)) {

                                $category = "&nbsp;".$row['category_1'];

                                $det = strip_tags($row['description']);
                                $frv = wordwrap($det, 70, "\n", TRUE); 
                                $y = substr($frv, 0, 120).'... <a href="./bookdetails?id='.$row['books_id'].'">Read More</a>';

                                $descrp = ucfirst($y);
                                

                                $image = "assets/bookscover/".$row['book_cover'];

                                if(file_exists($image)){

                                    $imager = "assets/bookscover/".$row['book_cover'];
                                    
                                } else {

                                    $imager = "assets/img/cover.jpg";
                                }

                                $id = $row['books_id'];
                                $userid = $_SESSION['login'];

                                $sel = "SELECT sum(`id`) AS `bookbought` FROM `boughtbook` WHERE `bookid` = '$id'  AND `reading` = 'Yes'";
                                $rss = query ($sel);

                                if(row_count($rss) == '' || row_count($rss) == null) {

                                    $booktot = 0 ." copy sold";
                                    
                                } else {
                            
                                    $bow = mysqli_fetch_array($rss);

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




                                $sbl = "SELECT * FROM boughtbook WHERE `bookid` = '$id' AND `reading` = 'Yes' AND `userid` = '$userid'";
                                $rbs = query($sbl);

                                if(row_count($rbs) == '' || row_count($rbs) == null) {

                                    $nkbs = '<a href="./bookdetails?id='.$id.'" class="btn btn-primary me-1" type="button">
                                    Buy This Book
                                    </a>';
                                     
                            } else {

                                $nkbs = '<a href="./read?id='.$id.'" class="btn btn-primary me-1" type="button">
                                Read this book
                                </a>';

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
                                                            <?php echo $category ?> &nbsp;|&nbsp;
                                                            <?php echo $booktot ?>

                                                            <p class="demo-inline-spacing">


                                                                <?php echo $nkbs ?>

                                                                <a href="./bookdetails?id=<?php echo $row['books_id'] ?>"
                                                                    class="btn btn-primary me-1">
                                                                    View Details
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
                            ?>



                        </div>


                    </div>




                    <div style="display: none;" id="searchresult" class="container-xxl flex-grow-1 container-p-y">

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
    <script src="assets/js/ui-popover.js"></script>

    <script src="ajax.js"></script>
</body>

</html>