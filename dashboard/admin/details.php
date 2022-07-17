<?php
include("components/top.php");
user_details();

if(!isset($_GET['book'])) {

    redirect("./books");
} else {
    
    $book = clean(escape($_GET['book']));
    $data = str_replace('-', ' ', $book);
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
                <div class="content-wrapper py-5 mt-3">
                    <!-- Content -->

                    <div id="allbook" class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">

                            <?php

                            $user =  $t_users['email'];

                            $sql = "SELECT * FROM `books` WHERE `book_title` = '$data' AND `email_address` = '$user'";
                            $res = query($sql);

                            $row = mysqli_fetch_array($res);

                                $category = "&nbsp;".$row['category_1'];

                                $descrp = ucfirst($row['description']);
                                

                                $image = "../assets/bookscover/".$row['book_cover'];

                                if(file_exists($image)){

                                    $imager = "../assets/bookscover/".$row['book_cover'];
                                    
                                } else {

                                    $imager = "../assets/img/cover.jpg";
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
                                                        <img src="<?php echo $imager ?>"
                                                            alt="<?php echo $row['book_title'] ?>" height="205"
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

                                                                <a href="./read?book=<?php echo $book ?>"
                                                                    class="btn btn-primary me-1" type="button"><i
                                                                        class="bx bx-share text-white"></i></a>

                                                                <a href="./editdrafts?book=<?php echo $book ?>"
                                                                    class=" btn btn-primary me-1">
                                                                    <i class="bx bx-edit text-white"></i>
                                                                </a>
                                                                <a class="btn trash btn-primary me-1"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalCenter">
                                                                    <i class="bx bx-trash text-white"></i>
                                                                </a>
                                                                <a class="btn btn-primary me-1">
                                                                    <i class="bx bx-share-alt text-white"></i>
                                                                </a>
                                                            <p style="display: none" class="trash">
                                                                <?php echo $rws['books_id'] ?></p>
                                                            </p>

                                                        </span>


                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalCenter"
                                                            data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalCenterTitle">
                                                                            Are you sure you want to delete this book?

                                                                        </h5>
                                                                        <br />


                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col mb-3">
                                                                                <p class="text-danger">Your book wil be
                                                                                    deleted but please note that users
                                                                                    who have previously purchased this
                                                                                    book will still be able to view it.
                                                                                </p>

                                                                                <p class="text-danger">It will no longer
                                                                                    be available for further purchase
                                                                                    for new users on our platform.
                                                                                </p>
                                                                            </div>
                                                                        </div>

                                                                        <p id="bkpymsg" class="text-danger"></p>
                                                                        <p id="bkid" hidden>
                                                                            <?php echo $row['books_id']; ?></p>
                                                                        <p id="authoremail" hidden>
                                                                            <?php echo $row['email_address'] ?></p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-outline-secondary"
                                                                            data-bs-dismiss="modal">
                                                                            Cancel
                                                                        </button>
                                                                        <button type="button" id="bkkdelt"
                                                                            class="btn btn-primary">Yes, Delete</button>
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
    <script src="../assets/js/ui-popover.js"></script>
    <script src="../assets/js/ui-toasts.js"></script>

    <script src="https://checkout.flutterwave.com/v3.js"></script>

    <script src="ajax.js"></script>
</body>

</html>