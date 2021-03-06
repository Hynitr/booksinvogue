<?php
include("components/top.php");
?>

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

                            <?php
                            if($t_users['act no'] == null || $t_users['act no'] == 0 || $t_users['act no'] == '' && $t_users['bio'] == '') {

                                ?>

                            <div id="acctname">
                                <form id="formAuthentication" class="mb-3" method="POST" autocomplete="off">
                                    <h4 class="mb-4">How should we credit you? ???? </h4>

                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Select your bank name</label>

                                        <select id="bank" class="form-control">
                                            <?php

                                            $banks = array(
                                            array('id' => '1','name' => 'Access Bank','code'=>'044'),
                                            array('id' => '2','name' => 'Citibank','code'=>'023'),
                                            array('id' => '3','name' => 'Diamond Bank','code'=>'063'),
                                            array('id' => '4','name' => 'Dynamic Standard Bank','code'=>''),
                                            array('id' => '5','name' => 'Ecobank Nigeria','code'=>'050'),
                                            array('id' => '6','name' => 'Fidelity Bank Nigeria','code'=>'070'),
                                            array('id' => '7','name' => 'First Bank of Nigeria','code'=>'011'),
                                            array('id' => '8','name' => 'First City Monument Bank','code'=>'214'),
                                            array('id' => '9','name' => 'Guaranty Trust Bank','code'=>'058'),
                                            array('id' => '10','name' => 'Heritage Bank Plc','code'=>'030'),
                                            array('id' => '11','name' => 'Jaiz Bank','code'=>'301'),
                                            array('id' => '12','name' => 'Keystone Bank Limited','code'=>'082'),
                                            array('id' => '13','name' => 'Providus Bank Plc','code'=>'101'),
                                            array('id' => '14','name' => 'Polaris Bank','code'=>'076'),
                                            array('id' => '15','name' => 'Stanbic IBTC Bank Nigeria Limited','code'=>'221'),
                                            array('id' => '16','name' => 'Standard Chartered Bank','code'=>'068'),
                                            array('id' => '17','name' => 'Sterling Bank','code'=>'232'),
                                            array('id' => '18','name' => 'Suntrust Bank Nigeria Limited','code'=>'100'),
                                            array('id' => '19','name' => 'Union Bank of Nigeria','code'=>'032'),
                                            array('id' => '20','name' => 'United Bank for Africa','code'=>'033'),
                                            array('id' => '21','name' => 'Unity Bank Plc','code'=>'215'),
                                            array('id' => '22','name' => 'Wema Bank','code'=>'035'),
                                            array('id' => '23','name' => 'Zenith Bank','code'=>'057'),
                                            array('id' => '24','name' => 'HighStreet MFB bank','code'=>'090175'),
                                            array('id' => '25','name' => 'TCF MFB','code' => '90115'),
                                            array(
                                            'id' => 132,
                                            'code' => '560',
                                            'name' => 'Page MFBank'
                                            ),
                                            array(
                                            'id' => 133,
                                            'code' => '304',
                                            'name' => 'Stanbic Mobile Money'
                                            ),
                                            array(
                                            'id' => 134,
                                            'code' => '308',
                                            'name' => 'FortisMobile'
                                            ),
                                            array(
                                            'id' => 135,
                                            'code' => '328',
                                            'name' => 'TagPay'
                                            ),
                                            array(
                                            'id' => 136,
                                            'code' => '309',
                                            'name' => 'FBNMobile'
                                            ),
                                            array(
                                            'id' => 137,
                                            'code' => '011',
                                            'name' => 'First Bank of Nigeria'
                                            ),
                                            array(
                                            'id' => 138,
                                            'code' => '326',
                                            'name' => 'Sterling Mobile'
                                            ),
                                            array(
                                            'id' => 139,
                                            'code' => '990',
                                            'name' => 'Omoluabi Mortgage Bank'
                                            ),
                                            array(
                                            'id' => 140,
                                            'code' => '311',
                                            'name' => 'ReadyCash (Parkway)'
                                            ),
                                            array(
                                            'id' => 143,
                                            'code' => '306',
                                            'name' => 'eTranzact'
                                            ),
                                            array(
                                            'id' => 145,
                                            'code' => '023',
                                            'name' => 'CitiBank'
                                            ),
                                            array(
                                            'id' => 147,
                                            'code' => '323',
                                            'name' => 'Access Money'
                                            ),
                                            array(
                                            'id' => 148,
                                            'code' => '302',
                                            'name' => 'Eartholeum'
                                            ),
                                            array(
                                            'id' => 149,
                                            'code' => '324',
                                            'name' => 'Hedonmark'
                                            ),
                                            array(
                                            'id' => 150,
                                            'code' => '325',
                                            'name' => 'MoneyBox'
                                            ),
                                            array(
                                            'id' => 151,
                                            'code' => '301',
                                            'name' => 'JAIZ Bank'
                                            ),
                                            array(
                                            'id' => 153,
                                            'code' => '307',
                                            'name' => 'EcoMobile'
                                            ),
                                            array(
                                            'id' => 154,
                                            'code' => '318',
                                            'name' => 'Fidelity Mobile'
                                            ),
                                            array(
                                            'id' => 155,
                                            'code' => '319',
                                            'name' => 'TeasyMobile'
                                            ),
                                            array(
                                            'id' => 156,
                                            'code' => '999',
                                            'name' => 'NIP Virtual Bank'
                                            ),
                                            array(
                                            'id' => 157,
                                            'code' => '320',
                                            'name' => 'VTNetworks'
                                            ),
                                            array(
                                            'id' => 159,
                                            'code' => '501',
                                            'name' => 'Fortis Microfinance Bank'
                                            ),
                                            array(
                                            'id' => 160,
                                            'code' => '329',
                                            'name' => 'PayAttitude Online'
                                            ),
                                            array(
                                            'id' => 161,
                                            'code' => '322',
                                            'name' => 'ZenithMobile'
                                            ),
                                            array(
                                            'id' => 162,
                                            'code' => '303',
                                            'name' => 'ChamsMobile'
                                            ),
                                            array(
                                            'id' => 163,
                                            'code' => '403',
                                            'name' => 'SafeTrust Mortgage Bank'
                                            ),
                                            array(
                                            'id' => 164,
                                            'code' => '551',
                                            'name' => 'Covenant Microfinance Bank'
                                            ),
                                            array(
                                            'id' => 165,
                                            'code' => '415',
                                            'name' => 'Imperial Homes Mortgage Bank'
                                            ),
                                            array(
                                            'id' => 166,
                                            'code' => '552',
                                            'name' => 'NPF MicroFinance Bank'
                                            ),
                                            array(
                                            'id' => 167,
                                            'code' => '526',
                                            'name' => 'Parralex'
                                            ),
                                            array(
                                            'id' => 169,
                                            'code' => '084',
                                            'name' => 'Enterprise Bank'
                                            ),
                                            array(
                                            'id' => 187,
                                            'code' => '314',
                                            'name' => 'FET'
                                            ),
                                            array(
                                            'id' => 188,
                                            'code' => '523',
                                            'name' => 'Trustbond'
                                            ),
                                            array(
                                            'id' => 189,
                                            'code' => '315',
                                            'name' => 'GTMobile'
                                            ),
                                            array(
                                            'id' => 182,
                                            'code' => '327',
                                            'name' => 'Pagatech'
                                            ),
                                            array(
                                            'id' => 183,
                                            'code' => '559',
                                            'name' => 'Coronation Merchant Bank'
                                            ),
                                            array(
                                            'id' => 184,
                                            'code' => '601',
                                            'name' => 'FSDH'
                                            ),
                                            array(
                                            'id' => 185,
                                            'code' => '313',
                                            'name' => 'Mkudi'
                                            ),
                                            array(
                                            'id' => 171,
                                            'code' => '305',
                                            'name' => 'Paycom'
                                            ),
                                            array(
                                            'id' => 172,
                                            'code' => '100',
                                            'name' => 'SunTrust Bank'
                                            ),
                                            array(
                                            'id' => 173,
                                            'code' => '317',
                                            'name' => 'Cellulant'
                                            ),
                                            array(
                                            'id' => 174,
                                            'code' => '401',
                                            'name' => 'ASO Savings and & Loans'
                                            ),
                                            array(
                                            'id' => 176,
                                            'code' => '402',
                                            'name' => 'Jubilee Life Mortgage Bank'
                                            ),
                                            );

                                            $row = 0; 

                                            while($row < 68) {

                                            echo '<option id="bank">'.$banks[$row]['name'].'</option>';

                                            $row++;
                                            } 
                                            ?>
                                        </select>
                                        <h6 style="font-size: 12px" class="text-danger mt-1" id="fmsg"></h6>
                                    </div>

                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Account Number</label>
                                        <input type="number" class="form-control" id="acctn" name="acctn"
                                            placeholder="0123456789" autofocus />
                                    </div>


                                    <div class="mb-3">
                                        <label for="actname" class="form-label">Account Name</label>
                                        <input type="text" class="form-control" id="actn" name="actn"
                                            placeholder="Retrieving your account name..." disabled />
                                    </div>


                                    <div class="mb-3">
                                        <label for="bio" class="form-label">Tell us about yourself</label>
                                        <textarea id="bio" class="form-control"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-lg-2 col-sm-12">
                                            <label for="tel" class="form-label">Telephone Number</label>
                                            <input type="number" class="form-control" id="tel" name="tel" />
                                        </div>

                                        <div class="mb-3 col-lg-3 col-sm-12">
                                            <label for="fb" class="form-label">Facebook Username</label>
                                            <input type="text" class="form-control" id="fb" name="fb" />
                                        </div>

                                        <div class="mb-3 col-lg-2 col-sm-12">
                                            <label for="wapn" class="form-label">Whatsapp Number</label>
                                            <input type="number" class="form-control" id="wapn" name="wapn" />
                                        </div>

                                        <div class="mb-3 col-lg-3 col-sm-12">
                                            <label for="twt" class="form-label">Twitter Username</label>
                                            <input type="text" class="form-control" id="twt" name="twt" />
                                        </div>

                                        <div class="mb-3 col-lg-2 col-sm-12">
                                            <label for="ig" class="form-label">Instagram Username</label>
                                            <input type="text" class="form-control" id="ig" name="ig" />
                                        </div>

                                    </div>

                                    <h6 style="font-size: 13px" class="text-danger text-center mt-1" id="arpaymsg"></h6>
                                    <button type="button" id="actsub"
                                        class="mb-3 btn btn-primary d-grid w-100">Submit</button>

                                </form>
                            </div>
                            <?php


                    } else {

                    ?>



                            <div class="col-lg-12 col-md-12 col-sm-12 order-0">
                                <div class="row">

                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="../assets/img/icons/unicons/wallet-info.png"
                                                            alt="chart success" class="rounded" />
                                                    </div>

                                                </div>
                                                <span class="fw-semibold d-block mb-1">Total Book(s) Sold</span>
                                                <h3 class="card-title mb-3">
                                                    <?php echo $totbook ?></h3>
                                                <a href="./mybooks" class="btn btn-sm btn-outline-primary">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="../assets/img/icons/unicons/wallet-info.png"
                                                            alt="chart success" class="rounded" />
                                                    </div>

                                                </div>
                                                <span class="fw-semibold d-block mb-1">Total Book(s) Bought</span>
                                                <h3 class="card-title mb-3">
                                                    <?php echo number_format($bookbought) ?></h3>
                                                <a href="./bookshelf" class="btn btn-sm btn-outline-primary">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
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

                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between">
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
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Cancel
                                        </button>
                                        <button type="button" id="paybtn" class="btn btn-primary">Fund Wallet</button>
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
                                                        <h5 class="text-nowrap mb-5">My Royalty</h5>
                                                        <h2 class="mb-4">???<?php echo number_format($royal) ?></h2>
                                                        <a href="./transactions"
                                                            class="btn btn-sm btn-outline-primary">View Details</a>
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

                                                    <?php 

                                                    $data = $_SESSION['login'];
                                                    
                                                    $sl = "SELECT * FROM boughtbook WHERE `userid` = '$data' AND `reading` = 'Yes'";
                                                    $rs = query($sl);
                                                
                                                    while($rrw = mysqli_fetch_array($rs)) {

                                                        $nkid = $rrw['bookid'];

                                                        $bl = "SELECT * FROM books WHERE `books_id` = '$nkid'";
                                                        $lb = query($bl);

                                                        while($rw = mysqli_fetch_array($lb)) {

                                                    ?>



                                                    <tr>
                                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                            <strong><?php echo ucfirst($rw['book_title']) ?></strong>
                                                        </td>
                                                        <td><?php echo ucfirst($rw['author']) ?></td>
                                                        <td>???<?php echo number_format($rw['selling_price']) ?></td>
                                                        <td> <a href="./read?id=<?php echo $rw['books_id'] ?>"><span
                                                                    class="badge bg-label-primary me-1">Tap to
                                                                    Read</span> </a>
                                                        </td>


                                                    </tr>

                                                    <?php
                                                        }
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

                        <?php
                            }
                            ?>

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

    <!-- Page JS -->
    <script src="ajax.js"></script>
    <script src="https://checkout.flutterwave.com/v3.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="../node_modules/canvas-confetti/dist/confetti.browser.js"></script>
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
        shout();
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