<?php
include("components/top.php");
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

.digit-group input {
    width: 60px;
    height: 60px;
    background-color: lighten($BaseBG, 5%);
    border: none;
    line-height: 50px;
    text-align: center;
    font-size: 24px;
    font-family: 'Raleway', sans-serif;
    font-weight: 800;
    color: black;
    margin: 0 2px;
    border-radius: 18px;
    border: 3px solid #293886;
}

.prompt {
    margin-bottom: 20px;
    font-size: 20px;
    color: white;
}
</style>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Forgot Password -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="./" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder">Books In Vogue</span>
                            </a>
                        </div>
                        <!-- /Logo -->

                        <div id="forgot">
                            <form id="formAuthentication" class="mb-3" method="POST">
                                <h4 class="mb-2">Forgot your password? 🔒</h4>
                                <p class="mb-4">Enter your email and we'll send you instructions to reset your password
                                </p>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="femail" name="femail"
                                        placeholder="Enter your email" autofocus />
                                </div>

                                <h6 style="font-size: 15px" class="text-danger  text-center mt-1" id="fmsg"></h6>
                                <button type="button" id="fsub" class="btn btn-primary d-grid w-100">Send Reset
                                    Link</button>

                                <div class="text-center">
                                    <a href="./signin" class="d-flex align-items-center justify-content-center mt-2">
                                        <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                        Back to Sign-in
                                    </a>
                                </div>
                            </form>
                        </div>

                        <div style="display:none" id="verify">
                            <form method="get" class="digit-group" data-group-name="digits" data-autosubmit="false"
                                autocomplete="off">

                                <h4 class="mb-1" id="otptitle">We've sent you an OTP ✅ </h4>
                                <p class="mb-5">Please check your mail inbox and spam folders.</p>

                                <div class="row justify-content-center mb-5">
                                    <input type="number" class="form-control text-center font-weight-bold" id="digit-1"
                                        name="digit-1" data-next="digit-2" placeholder="-" autofocus />
                                    <input type="number" id="digit-2" name="digit-2" data-next="digit-3"
                                        data-previous="digit-1" placeholder="-" />
                                    <input type="number" id="digit-3" name="digit-3" data-next="digit-4"
                                        data-previous="digit-2" placeholder="-" />
                                    <input type="number" id="digit-4" name="digit-4" data-previous="digit-3"
                                        placeholder="-" />
                                </div>

                                <h6 style="font-size: 15px" class="text-danger  text-center mt-1" id="vmsg"></h6>
                                <button type="button" id="vsub" class="mb-3 btn btn-primary d-grid w-100">Recover my
                                    account </button>

                                <p class="text-center">
                                    <span>Didn't get an OTP?</span>
                                    <a href="#" id="rotp">
                                        <span>Resend OTP</span>
                                    </a>
                                </p>
                            </form>
                        </div>


                        <div style="display:none" id="updatepword">
                            <form id="formAuthentication" class="mb-3" method="POST">
                                <h4 class="mb-2">Update your password</h4>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Create new password</label>
                                    <input type="password" class="form-control" id="pword" name="pword"
                                        placeholder="create a new password" autofocus />
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Re-type the new password here</label>
                                    <input type="password" class="form-control" id="cpword" name="cpword"
                                        placeholder="re-type your password" autofocus />
                                </div>

                                <h6 style="font-size: 15px" class="text-danger  text-center mt-1" id="umsg"></h6>
                                <button type="button" id="updf" class="btn btn-primary d-grid w-100">Update
                                    Password</button>

                                <div class="text-center">
                                    <a href="./signin" class="d-flex align-items-center justify-content-center mt-2">
                                        <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                        Back to Sign-in
                                    </a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- /Forgot Password -->
            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>


    <script src="ajax.js"></script>

    <script>
    $('.digit-group').find('input').each(function() {
        $(this).attr('maxlength', 1);
        $(this).on('keyup', function(e) {
            var parent = $($(this).parent());

            if (e.keyCode === 8 || e.keyCode === 37) {
                var prev = parent.find('input#' + $(this).data('previous'));

                if (prev.length) {
                    $(prev).select();
                }
            } else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (
                    e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
                var next = parent.find('input#' + $(this).data('next'));

                if (next.length) {
                    $(next).select();
                } else {
                    if (parent.data('autosubmit')) {
                        parent.submit();
                    }
                }
            }
        });
    });
    </script>

    <!-- Page JS -->
    <script>
    //open verify page by default
    function otpVerify() {
        document.getElementById('verify').style.display = 'block';
    }

    //open update pword page
    function updatePword() {
        document.getElementById('updatepword').style.display = 'block';
        document.getElementById('verify').style.display = 'none';
        document.getElementById('forgot').style.display = 'none';
    }

    //close signup page
    function signupClose() {
        document.getElementById('forgot').style.display = 'none';
    }
    </script>

    <?php
    
    //declare the verification tab active
    if(isset($_SESSION['usermail']) && !isset($_SESSION['login'])) {

        echo'<script>otpVerify(); signupClose();</script>';
    }

    if(isset($_SESSION['vnext']) && !isset($_SESSION['login'])) {

        echo'<script>updatePword();</script>';
    }
    ?>
</body>

</html>