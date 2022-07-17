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
                <!-- Register Card -->
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


                        <div id="signup">
                            <form id="formAuthentication" class="mb-3" method="POST" autocomplete="off">
                                <h4 class="mb-4">Let's get started 🚀</h4>
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">What should we call you?</label>
                                    <input type="text" class="form-control" id="fname" name="fname"
                                        placeholder="Firstname Lastname" autofocus />
                                    <h6 style="font-size: 12px" class="text-danger mt-1" id="fmsg"></h6>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">What do you want others to call
                                        you?</label>
                                    <input type="text" class="form-control" id="usname" name="usname"
                                        placeholder="Create a username" />
                                    <h6 style="font-size: 12px" class="text-danger mt-1" id="usmsg"></h6>
                                </div>

                                <div class="mb-3">
                                    <label for="category" class="form-label">Choose a category</label>
                                    <select id="catgy" class="form-select color-dropdown">
                                        <option id="catgy" selected>User (I am here to read books)</option>
                                        <option id="catgy">Author (I just want to publish my books and read other author
                                            books)</option>
                                        <option id="catgy">Publisher (I want to publish books for other authors)
                                        </option>
                                    </select>
                                    <h6 style="font-size: 12px" class="text-danger mt-1" id="catsmsg"></h6>
                                </div>


                                <div class="mb-3">
                                    <label for="email" class="form-label">Can we have your email address?</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter your email" />
                                    <h6 style="font-size: 12px" class="text-danger mt-1" id="emmsg"></h6>
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <label class="form-label" for="password">Create a strong password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="pword" class="form-control" name="pword"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                    <h6 style="font-size: 12px" class="text-danger mt-1" id="pwmsg"></h6>
                                </div>

                                <div class="mb-3 form-password-toggle">
                                    <label class="form-label" for="confirmpassword">Please, repeat your password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="cpword" class="form-control" name="cpword"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                    <h6 style="font-size: 12px" class="text-danger mt-1" id="cpwmsg"></h6>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Who told you about us?</label>
                                    <select id="ref" class="form-select color-dropdown">
                                        <option id="ref">instagram</option>
                                        <option id="ref">Facebook</option>
                                        <option id="ref">Google</option>
                                        <option id="ref">A friend</option>
                                        <option id="ref">Adverts</option>
                                        <option id="ref">Others</option>

                                    </select>
                                </div>

                                <div style="display: none" class="mb-3" id="anref">
                                    <label for="email" class="form-label">Others? Please specify</label>
                                    <input type="text" class="form-control" id="nref" name="nref"
                                        placeholder="Who told you about Books in Vogue" />
                                    <h6 style="font-size: 12px" class="text-danger mt-1" id="nref"></h6>
                                </div>
                                <!--<div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions"
                                        name="terms" />
                                    <label class="form-check-label" for="terms-conditions">
                                        I agree to
                                        <a href="javascript:void(0);">privacy policy & terms</a>
                                    </label>
                                </div>
                                </div>-->
                                <h6 style="font-size: 13px" class="text-danger  text-center mt-1" id="msg"></h6>
                                <button type="button" id="sub" class="mb-3 btn btn-primary d-grid w-100">Sign
                                    up</button>


                                <p class="text-center">
                                    <span>Already have an account?</span>
                                    <a href="./signin">
                                        <span>Sign in instead</span>
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
                <!-- Register Card -->
            </div>
        </div>
    </div>

    <!-- / Content -->


    <!-- Core JS -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>

    <!--- AJAX JS -->
    <script src="ajax.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

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

    <script>
    //open verify page by default
    function otpVerify() {
        document.getElementById('verify').style.display = 'block';
    }

    //close signup page
    function signupClose() {
        document.getElementById('signup').style.display = 'none';
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