 <?php
//Including Database configuration file.
include "functions/init.php";
//Getting value of "search" variable from "script.js".
if (isset($_POST['searchword'])) {
//Search box value assigning to $Name variable.
   $Name = $_POST['searchword'];
//Search query.
   $Query = "SELECT * FROM books WHERE book_title LIKE '%$Name%'";
//Query execution
   $ExecQuery = query($Query);
//Creating unordered list to display result.

if(row_count($ExecQuery) == '' || row_count($ExecQuery) == null) {

    $details = <<<DELIMITER

    <!--Under Maintenance -->
    <div class="container-xxl container-p-y text-center">
      <div class="misc-wrapper">
        <h2 class="mb-2 mx-2">Uh Oh 😢 </h2>
        <p class="mb-4 mx-2">We could not this book </p>
        <a href="./books" class="btn btn-primary">Get some book(s) from our library</a>
        <div class="mt-4">
          <img
            src="assets/img/illustrations/girl-doing-yoga-light.png"
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
    
} else {

echo '
<div class="row">
';

   //Fetching result from database.
   while ($row = MySQLi_fetch_array($ExecQuery)) {

        $category = "&nbsp;".$row['category_1']."&nbsp; &nbsp;| &nbsp; &nbsp;".$row['category_2'];

        $det = strip_tags($row['description']);
        $frv = wordwrap($det, 70, "\n", TRUE); 
        $y = substr($frv, 0, 120).'... <a href="./bookdetails?id='.$row['books_id'].'">Read More</a>';

        $descrp = ucfirst($y);
        

        $image = "assets/bookscover/".$row['book_cover'];

        if(file_exists($image)){

            $imager = "assets/bookscover/".$row['book_cover'];
            
        } else {

            $imager = "assets/img/cover.jpg";
        }

        $id = $row['books_id'];


        $ssl = "SELECT * FROM boughtbook WHERE `bookid` = '$id' AND `reading` = 'wishlist'";
        $rss = query($ssl);

        if(row_count($rss) == '' || row_count($rss) == null) {

            $nks = <<<DELIMITER

            <a class="btn btn-primary me-1" id="btwsh" data-bs-toggle="popover"
            data-bs-offset="0,14" data-bs-placement="top"
            data-bs-html="true"
            data-bs-content="<p>We just added this book to your wishlist</p>"
            title="Add to Wishlist">

             <i class="bx bx-star text-white"></i>

           
             </a>

             <input type="text" value='$id' id='srchid' hidden>

            DELIMITER;

            
            
        } else {

            $nks = <<<DELIMITER
            <a class="btn btn-primary me-1" id="lksd" data-bs-toggle="popover"
            data-bs-offset="0,14" data-bs-placement="top"
            data-bs-html="true"
            data-bs-content="<p>This Book has been added to your wishlist</p>"
            title="Added to wishlist already">

            <i class="bx bx-check text-white"></i>
             </a>

            DELIMITER;
            
        }


       ?>
 <!-- Creating unordered list items.
        Calling javascript function named as "fill" found in "script.js" file.
        By passing fetched result as parameter. -->
 <div class="container-xxl flex-grow-1 container-p-y">
     <div class="row">
         <div class="col-12">
             <div class="card mb-3">

                 <div class="card-body">

                     <div class="card-text">
                         <div class="d-grid d-sm-flex p-3 ">
                             <img src="<?php echo $imager ?>" alt="collapse-image" height="205"
                                 class="me-4 mb-sm-0 mb-4 text-center justify-content-center" />

                             <span>
                                 <b><?php echo escape($row['book_title']) ?></b>
                                 <br />
                                 by: <b><small><?php echo $row['author'] ?></small></b>
                                 <br /><br />
                                 <?php echo $descrp ?>

                                 <br /><br />

                                 <b>₦<?php echo number_format($row['selling_price']) ?></b>

                                 <br /><br />
                                 <?php echo $row['language'] ?> &nbsp;|&nbsp;
                                 <?php echo $category ?>

                                 <p class="demo-inline-spacing">

                                     <?php  echo $nks ?>

                                     <a style="display: none;" class="btn btn-primary me-1" id="addtwh">
                                         <i class="bx bx-check text-white"></i>
                                     </a>


                                     <a href="./bookdetails?id=<?php echo $row['books_id'] ?>"
                                         class="btn btn-primary me-1" type="button">Buy
                                         this book </a>

                                     <a class="btn btn-primary me-1">
                                         <i class="bx bx-share-alt text-white"></i>
                                     </a>
                                 </p>

                             </span>
                         </div>
                     </div>

                 </div>
             </div>
         </div>

     </div>
 </div>
 <!-- Below php code is just for closing parenthesis. Don't be confused. -->
 <?php
}}
}
?>
 </div>

 <script src="ajax.js"></script>
 <!-- Page JS -->
 <script src="assets/js/ui-popover.js"></script>