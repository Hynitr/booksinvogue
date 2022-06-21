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

                            <div class="col-lg-8 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">Welcome
                                                    <?php echo $t_users['usname'] ?> 😇 </h5>
                                                <?php 

                                                  //greet new users
                                                  if($t_users['status'] == '2') {

                                                    echo '<p class="mb-5">Here is an overview of your activities on Books In Vogue</p>';

                                                  } else {

                                                    echo '<p class="mb-4">Pick from where you left off... <br> Continue reading <span class="fw-bold">hsdhdh</span></p>';

                                                    echo ' <a href="javascript:;" class="btn btn-sm btn-outline-primary">Continue Reading...</a>';
                                                  }
                                                ?>
                                                </p>


                                            </div>
                                        </div>
                                        <div class="col-sm-5 text-center text-sm-left">
                                            <div class="card-body pb-0 px-0 px-md-4">
                                                <img src="assets/img/illustrations/man-with-laptop-light.png"
                                                    height="140" alt="View Badge User"
                                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 order-0">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="assets/img/icons/unicons/wallet-info.png"
                                                            alt="chart success" class="rounded" />
                                                    </div>

                                                </div>
                                                <span class="fw-semibold d-block mb-1">Wallet Balance</span>
                                                <h3 class="card-title mb-3">
                                                    ₦<?php echo number_format($t_users['wallet']) ?></h3>
                                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">Fund
                                                    Wallet</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>




                        <!-- Total Revenue -->
                        <div class="col-lg-12 mb-4">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6 col-md-6 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                                <div
                                                    class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                                    <div class="card-title">
                                                        <h5 class="text-nowrap mb-5">Total Books Bought</h5>
                                                        <h2 class="mb-4">8,258</h2>
                                                        <a href="javascript:;"
                                                            class="btn btn-sm btn-outline-primary">Buy New Book</a>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8 col-sm-6 col-md-6 mb-4">
                                    <div class="card">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Book Title</th>
                                                        <th>Author</th>
                                                        <th>Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    <tr>
                                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                            <strong>Angular Project</strong>
                                                        </td>
                                                        <td>Albert Cook</td>
                                                        <td>39848 </td>
                                                        <td><span class="badge bg-label-primary me-1">Tap to Read</span>
                                                        </td>

                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Total Revenue -->


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

    //welcome new users
    if($t_users['status'] == 2) {
      echo '<script>shout();</script>';
    }

    //dont welcome them again
    $user = $t_users['usname'];
    
    $sql = "UPDATE `users` SET `status` = '1' WHERE `usname` = '$user'";
    $rsl = query($sql);
    ?>
</body>

</html>