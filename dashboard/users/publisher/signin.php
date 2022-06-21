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
            <div class="authentication-inner">
                <!-- Register -->
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

                        <div id="signin">
                            <form id="formAuthentication" class="mb-3" action="index.html" method="POST"
                                autocomplete="off">
                                <h4 class="mb-4">Welcome back! 👋</h4>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Please, input your username</label>
                                    <input type="text" class="form-control" id="luname" name="luname"
                                        placeholder="Enter your username" autofocus />
                                    <h6 style="font-size: 12px" class="text-danger mt-1" id="lumsg"></h6>
                                </div>

                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Type in your password</label>
                                        <a href="./forgot">
                                            <small>Forgot Password?</small>
                                        </a>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="lpword" class="form-control" name="lpword"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                    <h6 style="font-size: 12px" class="text-danger mt-1" id="lupmsg"></h6>
                                </div>
                                <!--<div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-me" />
                                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                                    </div>
                                </div>-->
                                <div class="mt-4">
                                    <h6 style="font-size: 12px" class="text-danger text-center mt-1" id="lmsg">
                                    </h6>
                                    <button class="btn btn-primary d-grid w-100" type="button" id="lsub">Take me to my
                                        dashboard</button>
                                </div>

                                <p class="text-center mt-3">
                                    <span>Are you new here?</span>
                                    <a href="./signup">
                                        <span>Create an account</span>
                                    </a>
                                </p>
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
                                <button type="button" id="vsub" class="mb-3 btn btn-primary d-grid w-100">Activate
                                    Account </button>

                                <p class="text-center">
                                    <span>Didn't get an OTP?</span>
                                    <a href="#" id="rotp">
                                        <span>Resend OTP</span>
                                    </a>
                                </p>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- /Register -->
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

    //close signup page
    function signupClose() {
        document.getElementById('signin').style.display = 'none';
    }
    </script>

    <?php
    
    //declare the verification tab active
    if(isset($_SESSION['usermail']) && !isset($_SESSION['login'])) {

        echo'<script>otpVerify(); signupClose();</script>';
    }
    ?>
</body>

</html>