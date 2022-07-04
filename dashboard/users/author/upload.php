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
                            <h5 class="card-header">Upload a new book</h5>
                            <div class="col-xl-12 col-12">
                                <!-- HTML5 Inputs -->
                                <div class="card mb-4" id="bookdet">

                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Book
                                                Title<sup class="text-danger"> *</sup></label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" id="booktitle" />
                                                <p class="mt-2">What name do you want this book to be publicly
                                                    identified with? Type
                                                    it here exactly as it appears on the cover. Start the first letter
                                                    of each word with capital letter</p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Description <sup
                                                    class="text-danger"> *</sup></label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" id="bookdescp"></textarea>
                                                <p class="mt-2">Summarized details About The Book as it appears on the
                                                    back cover of the printed book. Write as you want it to appear on
                                                    your book detail’s page</p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Book Language<sup
                                                    class="text-danger"> *</sup></label>

                                            <div class="col-md-10">
                                                <select class="form-select" id="lang"
                                                    aria-label="Default select example">
                                                    <option id="lang">English</option>
                                                    <option id="lang">French</option>
                                                    <option id="lang">Yoruba</option>
                                                </select>
                                                <p class="mt-2">Select the language your book was written in</p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Series/Volume</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" id="series" />
                                                <p class="mt-2">If this book is part of a series or volume, please add
                                                    the volume or series number to help your audience locate other books
                                                    in the series</p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Author<sup
                                                    class="text-danger"> *</sup></label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" id="author" />
                                                <p class="mt-2">Name of the primary author of the book</p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Other Author</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" id="otherauthor" />
                                                <p class="mt-2">Name of other secondary authors</p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Copyright</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" id="copyright" />
                                                <p class="mt-2">Author's right is automatically protected. Uploaded
                                                    books can neither be copied nor downloaded</p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Select a
                                                Category<sup class="text-danger"> *</sup></label>

                                            <div class="col-md-10">
                                                <select class="form-select" id="category"
                                                    aria-label="Default select example">
                                                    <option id="category">Adventure</option>
                                                    <option id="category">Art</option>
                                                    <option id="category">Bible Study Outline</option>
                                                    <option id="category">Biographies</option>
                                                    <option id="category">Business</option>
                                                    <option id="category">Children</option>
                                                    <option id="category">Children</option>
                                                    <option id="category">Computers/Tech</option>
                                                    <option id="category">Contemporary</option>
                                                    <option id="category">Cooking</option>
                                                    <option id="category">Education/Reference</option>
                                                    <option id="category">Family and Relationship</option>
                                                    <option id="category">Fantasy</option>
                                                    <option id="category">Guide/How to</option>
                                                    <option id="category">Health/Fitness</option>
                                                    <option id="category">Historical Fiction</option>
                                                    <option id="category">History</option>
                                                    <option id="category">Horror</option>
                                                    <option id="category">Humor</option>
                                                    <option id="category">Law</option>
                                                    <option id="category">Leadership</option>
                                                    <option id="category">Marriage</option>
                                                    <option id="category">Medical</option>
                                                    <option id="category">Memoir</option>
                                                    <option id="category">Motivational</option>
                                                    <option id="category">Music</option>
                                                    <option id="category">Mystery</option>
                                                    <option id="category">Paranormal</option>
                                                    <option id="category">Parenting</option>
                                                    <option id="category">Personal Development</option>
                                                    <option id="category">Poetry</option>
                                                    <option id="category">Religious/Spirituality</option>
                                                    <option id="category">Romance</option>
                                                    <option id="category">Science Fiction</option>
                                                    <option id="category">Self-Help</option>
                                                    <option id="category">Sport</option>
                                                    <option id="category">Study-Materials</option>
                                                    <option id="category">Teens</option>
                                                    <option id="category">Textbooks</option>
                                                    <option id="category">Thriller</option>
                                                    <option id="category">Travel</option>
                                                    <option id="category">Young Adult</option>
                                                    <option id="category">Youths</option>
                                                    <option id="category">Young Adults</option>
                                                </select>
                                                <p class="mt-2">Please choose up a category</p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">ISBN</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" id="isbn" />
                                                <p class="mt-2">If you have an ISBN, type it here. If you don’t, do not
                                                    bother</p>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Price(₦)<sup
                                                    class="text-danger"> *</sup></label>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" id="price" />
                                                <p class="mt-2">How much do you want to sell your book on this platform?
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" value="70" id="authprofit"
                                                    disabled />
                                                <p class="mt-2">You will be credited 70% on every book purchased
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" value="30" id="bivprofit"
                                                    disabled />
                                                <p class="mt-2">We will charge 30% service fee on
                                                    every book purchased
                                                </p>
                                            </div>
                                        </div>
                                        <p class="fw-bold text-danger" id="msg"></p>

                                        <div class="align-right">
                                            <button class="btn btn-primary me-1" id="bkupld" type="button">Save draft
                                                and Next</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- File input -->
                                <div style="display: none" class="card" id="bokfile">
                                    <h5 class="card-header">File input</h5>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label fw-bold">Upload Book <sup
                                                    class="text-danger">*</sup></label>
                                            <input class="form-control" type="file" id="bkfile" />
                                            <p class="mt-2">Acceptable formats are ".pdf"</p>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formFile" class="form-label fw-bold">Upload Book Cover <sup
                                                    class="text-danger">*</sup></label>
                                            <input class="form-control" type="file" id="bkcov" />
                                            <p class="mt-2">Acceptable formats are jpeg, png, gif, jpg. Whatever size
                                                you upload, our
                                                system will convert your uploaded format to acceptable size.</p>
                                        </div>

                                        <p class="fw-bold text-danger" id="fmsg"></p>

                                        <div class="mt-4">
                                            <button type="button" class="btn btn-primary me-2" id="publ">Publish
                                                Book</button>
                                            <button type="button" class="btn btn-outline-secondary" id="svdft">Save to
                                                draft</button>
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
    <script src="ajax.js"></script>
    <script>
    //book file
    function book() {
        document.getElementById('bookdet').style.display = 'none';
        document.getElementById('bokfile').style.display = 'block';
    }
    </script>

    <?php 
    if(isset($_SESSION['bookupl'])) {

        echo "<script>book()</script>";
        
    }
    ?>
</body>

</html>