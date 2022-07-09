<?php
include("components/top.php");
user_details();

if(!isset($_GET['book'])) {

    redirect("./books");
} else {

    $book = clean(escape($_GET['book']));
    $data = str_replace('-', ' ', $book);

    book_details($data);
}
?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <div style="display: none" id="pybst">
                <div class="bs-toast toast show bg-primary toast-placement-ex m-2" role="alert" aria-live="assertive"
                    aria-atomic="true" data-delay="20">
                    <div class="toast-header">
                        <i class="bx bx-check me-2"></i>
                        <div class="me-auto fw-semibold">Book Uploaded Successfully</div>
                        <small>Just now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">You just uploaded a new book. <br>Kindly check your bookshelf to view the
                        book
                    </div>
                </div>
            </div>



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
                                <div class="card mb-4" id="bookdet">
                                    <h5 class="card-header mb-4">Make changes to - <b><?php echo $data ?></b></h5>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Book
                                                Title<sup class="text-danger"> *</sup></label>
                                            <div class="col-md-10">
                                                <input class="form-control" value="<?php echo $data ?>" type="text"
                                                    id="booktitle" />
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
                                                <textarea class="form-control"
                                                    id="bookdescp"><?php echo $editdraft['description'] ?></textarea>
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
                                                    <option id="lang"><?php echo $editdraft['language'] ?></option>
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
                                                <input class="form-control"
                                                    value="<?php echo $editdraft['series_volume'] ?>" type="text"
                                                    id="series" />
                                                <p class="mt-2">If this book is part of a series or volume, please add
                                                    the volume or series number to help your audience locate other books
                                                    in the series</p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Author<sup
                                                    class="text-danger"> *</sup></label>
                                            <div class="col-md-10">
                                                <input class="form-control" value="<?php echo $editdraft['author'] ?>"
                                                    type="text" id="author" />
                                                <p class="mt-2">Name of the primary author of the book</p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Other Author</label>
                                            <div class="col-md-10">
                                                <input class="form-control"
                                                    value="<?php echo $editdraft['other_author'] ?>" type="text"
                                                    id="otherauthor" />
                                                <p class="mt-2">Name of other secondary authors</p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Copyright</label>
                                            <div class="col-md-10">
                                                <input class="form-control"
                                                    value="<?php echo $editdraft['copyright'] ?>" type="text"
                                                    id="copyright" />
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
                                                    <option id="category"><?php echo $editdraft['category_1'] ?>
                                                    </option>
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
                                                <input class="form-control" value="<?php echo $editdraft['isbn'] ?>"
                                                    type="text" id="isbn" />
                                                <p class="mt-2">If you have an ISBN, type it here. If you don’t, do not
                                                    bother</p>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-2 fw-bold">Price(₦)<sup
                                                    class="text-danger"> *</sup></label>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text"
                                                    value="<?php echo $editdraft['selling_price'] ?>" id="price" />
                                                <p class="mt-2">How much do you want to sell your book on this platform?
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text"
                                                    value="<?php echo $editdraft['royalty_price'] ?>" id="authprofit"
                                                    disabled />
                                                <p class="mt-2">You will be credited 70% on every book purchased
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text"
                                                    value="<?php echo $editdraft['selling_price'] - $editdraft['royalty_price'] ?>"
                                                    id="bivprofit" disabled />
                                                <p class="mt-2">We will charge 30% service fee on
                                                    every book purchased
                                                </p>

                                                <input class="form-control" type="text"
                                                    value="<?php echo $editdraft['books_id'] ?>" id="bookdtta" hidden />
                                            </div>
                                        </div>
                                        <p class="fw-bold text-danger" id="msg"></p>

                                        <div class="row mt-4 mb-4">
                                            <div class="col-sm-12 col-lg-3">
                                                <button class="btn btn-primary" id="edbkupld" type="button">Save and
                                                    Publish</button>

                                            </div>
                                            <div class="col-sm-6 col-lg-6">
                                                <button class="btn btn-outline-primary" id="eddft" type="button">Save to
                                                    Draft</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- File input -->
                                <div style="display: none" class="card" id="bokfile" enctype="multipart/form-data">
                                    <h5 class="card-header">Upload Book Images</h5>
                                    <div class="card-body">


                                        <div class="mb-3">
                                            <label for="formFile" class="form-label fw-bold">Upload Book Cover <sup
                                                    class="text-danger">*</sup></label>

                                            <div class="row">
                                                <div class="col-lg-3 col-sm-12">
                                                    <?php 
                                                    if($editdraft['book_cover'] != '') {

                                                    ?>
                                                    <img id="previewImg" class="img-fluid" width="150px"
                                                        src="../assets/bookscover/<?php echo $editdraft['book_cover'] ?>"
                                                        alt="Book Cover">
                                                    <?php
                                                    } else {
                                                        ?>

                                                    <img style="display: none" id="previewImg" class="img-fluid"
                                                        width="150px" src="" alt="Book Cover">
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                                <div class="col-lg-9 mb-lg-5 mt-lg-5 col-sm-12">
                                                    <input class="form-control" type="file"
                                                        onchange="previewFile(this);" id="bkcov" />
                                                </div>
                                            </div>
                                            <p class="mt-2">Acceptable formats are jpeg, png, gif, jpg. Whatever size
                                                you upload, our
                                                system will convert your uploaded format to acceptable size.</p>
                                        </div>


                                        <div class="mb-3">
                                            <label for="formFile" class="form-label fw-bold">Upload Book <sup
                                                    class="text-danger">*</sup></label>
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-12">
                                                    <?php
                                                    if($editdraft['book_file'] != '') {

                                                      ?>
                                                    <img id="previewImg" class="img-fluid" width="150px"
                                                        src="../assets/img/file.png" alt="Book Cover">
                                                    <?php

                                                    } else {
                                                    ?>
                                                    <canvas id="pdfViewer"></canvas>
                                                    <?php
                                                    }
                                                    ?>

                                                    <div id="pload"></div>
                                                </div>
                                                <div class="col-lg-9 mb-lg-5 mt-lg-5 col-sm-12">
                                                    <input class="form-control" type="file" id="bkfile" />
                                                </div>
                                            </div>


                                            <p class="mt-2">Acceptable formats are ".pdf"</p>
                                        </div>


                                        <p class="fw-bold text-danger" id="fmsg"></p>

                                        <div class="mt-4">
                                            <button type="button" class="btn btn-primary me-2" id="publ">Publish
                                                Book</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->


                    <!-- Modal -->
                    <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <form class="modal-content">
                                <h2 class="modal-title text-center py-4 px-5">Your book is live!</h2>
                                <img src="../assets/img/75_smile.gif" class="img-fluid">
                                <div class="modal-footer">
                                    <a href="./mybooks"> <button type="button" class="btn btn-outline-secondary">
                                            Continue
                                        </button></a>
                                    <button type="button" class="btn btn-primary" onclick="statemgt();">View
                                        Book</button>
                                </div>
                        </div>

                        </form>
                    </div>
                </div>


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
    <script src="../assets/js/ui-toasts.js"></script>
    <script src="../build/pdf.js"></script>
    <script>
    //preview pdf
    // Loaded via <script> tag, create shortcut to access PDF.js exports.
    var pdfjsLib = window['pdfjs-dist/build/pdf'];
    // The workerSrc property shall be specified.
    pdfjsLib.GlobalWorkerOptions.workerSrc = '../build/pdf.worker.js';

    $("#bkfile").on("change", function(e) {
        var file = e.target.files[0]
        if (file.type == "application/pdf") {
            var fileReader = new FileReader();
            fileReader.onload = function() {
                var pdfData = new Uint8Array(this.result);
                // Using DocumentInitParameters object to load binary data.
                var loadingTask = pdfjsLib.getDocument({
                    data: pdfData
                });
                loadingTask.promise.then(function(pdf) {
                    //console.log('PDF loaded');

                    $("#pload").html(
                        '<img style="width: 100px; height: 100px" src="../assets/img/loading.gif">'
                    );

                    // Fetch the first page
                    var pageNumber = 1;
                    pdf.getPage(pageNumber).then(function(page) {
                        //console.log('Page loaded');
                        $("#pload").html(
                            '<img style="width: 100px; height: 100px" src="../assets/img/loading.gif">'
                        );

                        /*var scale = 1.5;
                        var viewport = page.getViewport({
                            scale: scale
                        });*/

                        var desiredWidth = 200;
                        var viewport = page.getViewport({
                            scale: 1,
                        });
                        var scale = desiredWidth / viewport.width;
                        var scaledViewport = page.getViewport({
                            scale: scale,
                        });


                        // Prepare canvas using PDF page dimensions
                        var canvas = $("#pdfViewer")[0];
                        var context = canvas.getContext('2d');
                        canvas.width = Math.floor(viewport.width * scale);
                        canvas.height = Math.floor(viewport.height * scale);
                        //canvas.height = viewport.height;
                        //canvas.width = viewport.width;

                        // Render PDF page into canvas context
                        var renderContext = {
                            canvasContext: context,
                            viewport: viewport
                        };
                        var renderTask = page.render(renderContext);
                        renderTask.promise.then(function() {
                            //console.log('Page rendered');
                            $("#pload").html('');
                        });
                    });
                }, function(reason) {
                    // PDF loading error
                    alert(reason);
                });
            };
            fileReader.readAsArrayBuffer(file);
        }
    });

    //preview images
    function previewFile(input) {
        document.getElementById('previewImg').style.display = 'block';

        var file = $("input[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }

    //book file
    function book() {
        document.getElementById('bookdet').style.display = 'none';
        document.getElementById('bokfile').style.display = 'block';
    }

    function regbook() {
        document.getElementById('bookdet').style.display = 'block';
        document.getElementById('bokfile').style.display = 'none';
    }
    </script>

    <?php 
    if(isset($_SESSION['eddbookupl'])) {

        echo "<script>book()</script>";          
    } else {

        echo "<script>regbook()</script>";
    }
    
    if (isset($_SESSION['eddbooknew'])) {

        $code = $_SESSION['eddbooknew'];

        echo '
        <script>
        function statemgt() {
            window.open("https://bookinvogue.com/'.$code.'","_blank");
        }</script>';
    }

    //create notification
    
    ?>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="../node_modules/canvas-confetti/dist/confetti.browser.js"></script>
    <script>
    function shout() {

        $(document).ready(function() {
            $("#backDropModal").modal("show");
        });

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


</body>

</html>