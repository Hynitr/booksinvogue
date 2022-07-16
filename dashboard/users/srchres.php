 <?php
//Including Database configuration file.
include "functions/init.php";
//Getting value of "search" variable from "script.js".
if (isset($_POST['searchword'])) {
//Search box value assigning to $Name variable.
   $Name = $_POST['searchword'];
//Search query.
   $Query = "SELECT * FROM books WHERE book_title LIKE '%$Name%' OR `author` LIKE '%$Name%' OR `other_author` = '%$Name%'";
//Query execution
   $ExecQuery = query($Query);
//Creating unordered list to display result.

if(row_count($ExecQuery) == '' || row_count($ExecQuery) == null) {

    $details = <<<DELIMITER

    <!--Under Maintenance -->
    <div class="container-xxl container-p-y text-center">
      <div class="misc-wrapper">
        <h2 class="mb-2 mx-2">Uh Oh 😢 </h2>
        <p class="mb-4 mx-2">We could not find this book </p>
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

        $category = "&nbsp;".$row['category_1']."&nbsp; &nbsp;";

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
        $userid = $_SESSION['login'];

        $sel = "SELECT sum(`id`) AS `bookbought` FROM `boughtbook` WHERE `bookid` = '$id'";
        $rss = query ($sel);

        if(row_count($rss) == '' || row_count($rss) == null) {

            $booktot = 0 ." copy sold";
            
        } else {
    
            $bow = mysqli_fetch_array($rss);

            if($bow['bookbought'] == 0 || $bow['bookbought'] == null) {

                $booktot = 0 ." copy sold";

            } else {

                if($bow['bookbought'] == 1) {

                    $booktot = 1 ." copy sold";
                    
                } else {
                    $booktot = number_format($bow['bookbought'])." copies sold";

                }
            }
            
        }



        $sbl = "SELECT * FROM boughtbook WHERE `bookid` = '$id' AND `reading` = 'Yes' AND `userid` = '$userid'";
        $rbs = query($sbl);

        if(row_count($rbs) == '' || row_count($rbs) == null) {

            $nkbs = '<a href="./bookdetails?id='.$id.'" class="btn btn-primary me-1" type="button">
            Buy this book
            </a>';
             
    } else {

        $nkbs = '<a href="./read?id='.$id.'" class="btn btn-primary me-1" type="button">
        Read this book
        </a>';

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
                                 <?php echo $category ?> &nbsp;|&nbsp;
                                 <?php echo $booktot ?>

                                 <p class="demo-inline-spacing">


                                     <?php echo $nkbs ?>

                                     <a href="./bookdetails?id=<?php echo $row['books_id'] ?>"
                                         class="btn btn-primary me-1">
                                         View Details
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