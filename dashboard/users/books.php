<?php
include("components/top.php");
user_details();
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

                            <?php

                            $sql = "SELECT * FROM `books` LIMIT 6";
                            $res = query($sql);

                            while($row = mysqli_fetch_array($res)) {
                                

                        ?>

                            <div class="col-lg-4 col-md-4 col-sm-6 order-0">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-center justify-content-center">
                                                    <div class="flex-shrink-0">
                                                        <img style="width: 200px; height: 200px;"
                                                            src="assets/bookscover/<?php  echo $row['book_cover'] ?>"
                                                            alt="<?php  echo $row['book_title'] ?>"
                                                            class="img-fluid justify-content-between align-items-center"
                                                            width="100px" />
                                                    </div>

                                                </div>
                                                <h5 class="fw-bold text-primary d-block mb-3">
                                                    <?php  echo $row['book_title'] ?></h5>

                                                <p style="font-size: 13px;" class="fw-semibold d-block mb-3">
                                                    <?php  echo $row['description'] ?></p>

                                                <p style="font-size: 13px;" class="fw-semibold d-block mb-4">
                                                    By: <span
                                                        class="text-dark fw-bold"><?php  echo $row['author'] ?></span>
                                                </p>
                                                <span class="mx-2 badge bg-label-primary p-2"><a target="_blank"
                                                        data-media="images/ico.png"
                                                        href="https://facebook.com/sharer.php?u=https://dotpedia.com.ng/preview?pdf="><i
                                                            class="bx bx-star"></i></a>
                                                </span>

                                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View More
                                                    Details</a>

                                                <span class="mx-2 badge bg-label-primary p-2"><a target="_blank"
                                                        data-media="images/ico.png"
                                                        href="https://facebook.com/sharer.php?u=https://dotpedia.com.ng/preview?pdf="><i
                                                            class="bx bx-share-alt"></i></a>
                                                </span>



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

                <!-- Footer -->
                <?php
                    include("components/footer.php"); 
                    ?>
                <!-- / Footer -->

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
</body>

</html>