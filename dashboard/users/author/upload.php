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

                            <div class="col-xl-12 col-12">
                                <!-- HTML5 Inputs -->
                                <div class="card mb-4">
                                    <h5 class="card-header">Upload a new book</h5>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Book
                                                Title</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" value="Sneat"
                                                    id="html5-text-input" />
                                                <p class="mt-2">What name do you want this book to be publicly
                                                    identified with? Type
                                                    it here exactly as it appears on the cover. Start the first letter
                                                    of each word with capital letter</p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Description</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control"></textarea>
                                                <p class="mt-2">Summarized details About The Book as it appears on the
                                                    back cover of the printed book. Write as you want it to appear on
                                                    your book detail’s page</p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Series/Volume</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" value="Sneat"
                                                    id="html5-text-input" />
                                                <p class="mt-2">If this book is part of a series or volume, please add
                                                    the volume or series number to help your audience locate other books
                                                    in the series</p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Author</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" value="Sneat"
                                                    id="html5-text-input" />
                                                <p class="mt-2">Name of the primary author of the book</p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Other Author</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" value="Sneat"
                                                    id="html5-text-input" />
                                                <p class="mt-2">Name of other secondary authors</p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Copyright</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" value="Sneat"
                                                    id="html5-text-input" />
                                                <p class="mt-2">Author's right is automatically protected. Uploaded
                                                    books can neither be copied nor downloaded</p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Select a
                                                Category</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" value="Sneat"
                                                    id="html5-text-input" />
                                                <p class="mt-2">Please choose up to a category</p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">ISBN</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" value="Sneat"
                                                    id="html5-text-input" />
                                                <p class="mt-2">If you have an ISBN, type it here. If you don’t, do not
                                                    bother</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- File input -->
                                <div class="card" hidden>
                                    <h5 class="card-header">File input</h5>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Default file input example</label>
                                            <input class="form-control" type="file" id="formFile" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFileMultiple" class="form-label">Multiple files input
                                                example</label>
                                            <input class="form-control" type="file" id="formFileMultiple" multiple />
                                        </div>
                                        <div>
                                            <label for="formFileDisabled" class="form-label">Disabled file input
                                                example</label>
                                            <input class="form-control" type="file" id="formFileDisabled" disabled />
                                        </div>
                                    </div>
                                </div>
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
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

</body>

</html>