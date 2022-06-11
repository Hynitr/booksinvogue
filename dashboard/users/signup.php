<?php
include("components/top.php");
?>

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
                        <h4 class="mb-4">Let's get started 🚀</h4>

                        <form id="formAuthentication" class="mb-3" method="POST">
                            <div class="mb-3">
                                <label for="fullname" class="form-label">What should we call you?</label>
                                <input type="text" class="form-control" id="fname" name="fname"
                                    placeholder="Firstname Lastname" autofocus />
                                <h6 style="font-size: 10px" class="text-danger mt-3" id="fmsg"></h6>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Create a username</label>
                                <input type="text" class="form-control" id="usname" name="usname"
                                    placeholder="Create a unique username" autofocus />
                                <h6 style="font-size: 10px" class="text-danger mt-3" id="usmsg"></h6>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Can we have your email address?</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" />
                                <h6 style="font-size: 10px" class="text-danger mt-3" id="emmsg"></h6>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Create a strong password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="pword" class="form-control" name="pword"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <h6 style="font-size: 10px" class="text-danger mt-3" id="pwmsg"></h6>
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="confirmpassword">Please, repeat your password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="cpword" class="form-control" name="cpword"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <h6 style="font-size: 10px" class="text-danger mt-3" id="cpwmsg"></h6>
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
                            <button type="button" class="btn btn-primary d-grid w-100">Sign up</button>
                        </form>

                        <p class="text-center">
                            <span>Already have an account?</span>
                            <a href="./signin">
                                <span>Sign in instead</span>
                            </a>
                        </p>
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
</body>

</html>