<?php
include("components/top.php");
user_details();
?>

<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type=number] {
    -moz-appearance: textfield;
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
                        <div class="me-auto fw-semibold">Credit Alert</div>
                        <small>Just now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">Your Wallet has been funded successfully
                    </div>
                </div>
            </div>

            <div style="display: none" id="pybstdd">
                <div class="bs-toast toast show bg-danger toast-placement-ex m-2" role="alert" aria-live="assertive"
                    aria-atomic="true" data-delay="20">
                    <div class="toast-header">
                        <i class="bx bx-bell me-2"></i>
                        <div class="me-auto fw-semibold">Payment Error</div>
                        <small>Just now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">There was an error processing your payment
                    </div>
                </div>
            </div>



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


                            <div class="col-lg-3 col-md-4 col-sm-6 order-0">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="../assets/img/icons/unicons/wallet-info.png"
                                                            alt="chart success" class="rounded" />
                                                    </div>

                                                </div>
                                                <span class="fw-semibold d-block mb-1">Wallet Balance</span>
                                                <h3 class="card-title mb-3">
                                                    ???<?php echo number_format($t_users['wallet']) ?></h3>
                                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                    data-bs-target="#modalCenter">Fund
                                                    Wallet</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="../assets/img/icons/unicons/wallet-info.png"
                                                    alt="chart success" class="rounded" />
                                            </div>

                                        </div>
                                        <span class="fw-semibold d-block mb-1">Active Advert(s)</span>
                                        <h3 class="card-title mb-3">
                                            ???<?php echo number_format($t_users['wallet']) ?></h3>
                                        <a href="./ads" class="btn btn-sm btn-outline-primary">Fund
                                            Wallet</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="../assets/img/icons/unicons/wallet-info.png"
                                                    alt="chart success" class="rounded" />
                                            </div>

                                        </div>
                                        <span class="fw-semibold d-block mb-1">My Royalty</span>
                                        <h3 class="card-title mb-3">???<?php echo number_format($royal) ?></h3>
                                        <a href="#" class="btn btn-sm btn-outline-primary">Withdraw
                                            Funds</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="../assets/img/icons/unicons/wallet-info.png"
                                                    alt="chart success" class="rounded" />
                                            </div>

                                        </div>
                                        <span class="fw-semibold d-block mb-1">Total Book(s) Sold</span>
                                        <h3 class="card-title mb-3">
                                            <?php echo number_format($totbook) ?></h3>
                                        <a href="./mybooks" class="btn btn-sm btn-outline-primary">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="modalCenter" data-bs-backdrop="static" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Fund your wallet</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="amount" class="form-label">Enter an amount</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">???</span>
                                                        <input type="number" class="form-control"
                                                            placeholder="Minimum of ???100" id="amrp" />
                                                    </div>
                                                </div>
                                            </div>

                                            <p id="pymsg" class="text-danger"></p>


                                            <p id="txt" hidden><?php  echo md5(rand(0, 9999)); ?></p>
                                            <p id="email" hidden><?php echo $t_users['email'] ?></p>
                                            <p id="fname" hidden><?php echo $t_users['fullname'] ?></p>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                            <button type="button" id="paybtn" class="btn btn-primary">Fund
                                                Wallet</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?php 
                        $data = $_SESSION['login'];
                        $sql = "SELECT sum(`id`) AS booktoal FROM boughtbook WHERE `userid` = '$data' AND `reading` = 'Yes'";
                        $res = query($sql);
                       
                        $row = mysqli_fetch_array($res);

                        ?>


                        </div>


                        <!-- Total Revenue -->
                        <div class="col-lg-12 mb-4">
                            <div class="row">


                                <div class="col-lg-12 col-sm-12 col-md-12 mb-4">
                                    <div class="card">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Transaction ID</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                        <th>Payment Details</th>
                                                        <th>Payment Date</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">

                                                    <?php 
                                                    
                                                    $sl = "SELECT * FROM t_his WHERE `username` = '$data' ";
                                                    $rs = query($sl);

                                                    if(row_count($rs) == null) {

                                                        $details = <<<DELIMITER

                                                        <!--Under Maintenance -->
                                                        <div class="container-xxl container-p-y text-center">
                                                        <div class="misc-wrapper">
                                                            <h2 class="mb-2 mx-2">Uh Oh ???? </h2>
                                                            <p class="mb-4 mx-2">You've not added any book to your wishlist yet. </p>
                                                            <a href="./books" class="btn btn-primary">Get some book(s) to my wishlist</a>
                                                            <div class="mt-4">
                                                            <img
                                                                src="../assets/img/illustrations/girl-doing-yoga-light.png"
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
                                                
                                                    while($rrw = mysqli_fetch_array($rs)) {

                                                       

                                                    ?>



                                                    <tr>
                                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                            <strong><?php echo $rrw['t_ref'] ?></strong>
                                                        </td>
                                                        <td>???<?php echo number_format($rrw['amt']) ?></td>
                                                        <td><?php echo ucwords($rrw['status']) ?> </td>
                                                        <td><?php echo $rrw['paynote'] ?>
                                                        </td>
                                                        <td><?php echo date('l, F d, Y', strtotime($rrw['datepaid'])); ?>
                                                        </td>
                                                        <td> <a href="./receipt?id=<?php echo $rrw['t_ref'] ?>"><span
                                                                    class="badge bg-label-primary me-1">Download
                                                                    Receipt</span> </a>
                                                        </td>


                                                    </tr>

                                                    <?php
                                                    }
                                                    ?>

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

    <script src="https://checkout.flutterwave.com/v3.js"></script>

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

    //welcome new users
    if($t_users['status'] == 2) {
      echo '<script>shout();</script>';
    }

    //dont welcome them again
    $user = $t_users['usname'];
    
    $sql = "UPDATE `users` SET `status` = '1' WHERE `usname` = '$user'";
    $rsl = query($sql);


    if(isset($_SESSION['paymsg'])) {
        
        if(isset($_SESSION['paymsg']) == 'Your Wallet has been funded successfully') {
        
        echo "
        
        <script>
        $('#pybst').show();
        </script>
        ";
        } else {

            echo  "
          
            <script>
            $('#pybstdd').show();
            </script>
            ";
        
        }

        unset($_SESSION['paymsg']);
    }
    ?>
</body>

</html>