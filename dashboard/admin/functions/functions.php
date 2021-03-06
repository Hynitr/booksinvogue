<?php

/*************helper functions***************/

function clean($string) {

	return htmlentities($string);
}

function redirect($location) {

	return header("Location: {$location}");
}

function set_message($message) {

	if(!empty($message)) {

		$_SESSION['message'] = $message;

		}else {

			$message = "";
		}
}



function display_message() {

	if(isset($_SESSION['message'])) {

		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}

function token_generator() {

	$token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));

	return $token; 
}

function otp() {

	$otp = $_SESSION['otp'] = mt_rand(0, 9999);

	return $otp; 
}

function validation_errors($error_message) {

	$error_message = <<<DELIMITER

	<div class="col-md-12 alert alert-danger alert-mg-b alert-success-style6 alert-st-bg3 alert-st-bg14">
		<button type="button" class="col-md-12 close sucess-op" data-dismiss="alert" aria-label="Close">
			<span class="icon-sc-cl" aria-hidden="true">&times;</span>
										</button>
					<p><strong>$error_message </strong></p>
								</div>
	DELIMITER;

	return $error_message;     

}


function validator($error_message) {

	$error_message = <<<DELIMITER
	<div style="background: #FFE9E6; color: #ff0000;" class="col-md-12 alert alert-danger alert-mg-b alert-success-style6 alert-st-bg3 alert-st-bg14">
		<button type="button" style="color: white;" class="col-md-12 close sucess-op" data-dismiss="modal" aria-label="Close">
			<span class="icon-sc-cl" aria-hidden="true">&times;</span>
										</button>
					<p><strong>$error_message </strong></p>
								</div>
	DELIMITER;

	return $error_message;     

}


/****** Helper Functions********/

function email_exist($email) {

	$sql = "SELECT * FROM `users` WHERE `email` = '$email'";
	$result = query($sql);

	if(row_count($result) == 1) {

		return true;

	} else {

		return false;
	} 
}



function usname_exist($usname) {

	$sql = "SELECT * FROM `users` WHERE `usname` = '$usname'";
	$result = query($sql);

	if(row_count($result) == 1) {

		return true;

	}else {

		return false;
	} 
}


function book_exist($booktitle) {

	$sql = "SELECT * FROM `books` WHERE `book_title` = '$booktitle'";
	$result = query($sql);

	if(row_count($result) == 1) {

		return true;

	}else {

		return false;
	} 
}


function role_director($username, $role) {

				//redirect to user dashboard
				if($role == 'user') {
					
					$_SESSION['login'] = $username;

					echo '<img style="width: 100px; height: 100px" src="assets/img/loading.gif">';	

					echo '<script>window.location.href ="./"</script>';	
				} else {

					//redirect to author dashbaord
					if($role == 'author') {

						$_SESSION['login'] = $username;

						echo '<img style="width: 100px; height: 100px" src="assets/img/loading.gif">';	

						echo '<script>window.location.href ="author/./"</script>';	


					}else {


					//redirect to publisher dashboard
					if($role == 'publisher') {

					$_SESSION['login'] = $username;

					echo '<img style="width: 100px; height: 100px" src="assets/img/loading.gif">';	

					echo '<script>window.location.href ="publisher/./"</script>';	


					} else {

						echo '<img style="width: 100px; height: 100px" src="assets/img/loading.gif">';	

						echo '<script>window.location.href ="./signin"</script>';
					}
					}

				}


}



/** VALIDATE USER REGISTRATION **/
if(isset($_POST['fname']) && isset($_POST['usname']) && isset($_POST['catgy']) && isset($_POST['email']) && isset($_POST['pword']) && isset($_POST['cpword']) && isset($_POST['ref'])) {

	$fname 			= clean(escape($_POST['fname']));
	$usname			= clean(escape($_POST['usname']));
	$caty          = clean(escape($_POST['catgy']));
	$email	 		= clean(escape($_POST['email']));
	$pword    		= clean(escape($_POST['pword']));
	$cpword 		= clean(escape($_POST['cpword']));
	$ref            = clean(escape($_POST['ref']));

		
	if($caty == "User (I am here to read books)") {

		$catgy = 'user';

	} else {

	if($caty == "Author (I just want to publish my books and read other author books)") {

		   $catgy = 'author';
			
		} else {

	if($caty == "Publisher (I want to publish books for other authors)") {

			$catgy = 'publisher';

			}
		}
	}

		if(email_exist($email)) {

			echo "This email address is already registered. <br/> Please sign in with your registered email details or enter a new email address.";
		}else {

			if (usname_exist($usname)) {

				echo "Someone has already chosen that username.";
	
			} else {


 				register($fname, $usname, $email, $pword, $ref, $catgy);
				
			}

		}  

}

	

/** REGISTER USER **/
function register($fname, $usname, $email, $pword, $ref, $catgy) {

	$fnam = escape($fname);
	$usname = escape($usname);
	$emai = escape($email);
	$pwor = md5($pword);
	$ref  = escape($ref);

	$datereg = date("Y-m-d h:i:s");

	$_SESSION['usermail'] = $emai;
		
	$activator = otp();
	
	$sql = "INSERT INTO users(`idd`, `fullname`, `usname`, `email`, `password`, `role`, `date_reg`, `status`, `active`, `lastseen`, `ref`, `wallet`)";
	$sql.= " VALUES('1', '$fnam', '$usname', '$emai', '$pwor', '$catgy', '$datereg', '$activator', '0', '$datereg', '$ref', '0')";
	$result = query($sql);

	//redirect to verify function
	$subj = "Activate Your Account";
	
	$msg = <<<DELIMITER

    <p class="mt-4 text-dark fw-bold">???? Welcome to Books In Vogue. </p>
    <p class="mt-2 text-dark">??? You are one-click towards activating your account and becoming part of the Books In
        Vogue Tribe</p>
    <p class="mt-2 text-dark">?????? Kindly use the code below to activate your account for FREE!</p>
    <p class="mt-2 text-dark">???? Do not share this code outside Books In Vogue website or Mobile App</p>
    <div class="justify-content-center text-center">
        <button id="otpbtn" class="text-center btn btn-rounded btn-primary mt-2 fw-bold">$activator</button>
    </div>

    <p class="mt-4 mb-4 text-dark">???? That's it! We can't to see you ????</p>

    DELIMITER;
	
	mail_mailer($email, $activator, $subj, $msg);

	//open otp page
	echo 'Loading... Please Wait!';
	echo'<script>otpVerify(); signupClose();</script>';
}



/* MAIL VERIFICATIONS */
function mail_mailer($email, $activator, $subj, $msg) {

	$to = $email;
	$from = "info@booksinvogue.com";

	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
	$headers .= "X-Priority: 1 (Highest)\n";
	$headers .= "X-MSMail-Priority: High\n";
	$headers .= "Importance: High\n";

	$subject = $subj;

	$body = <<<DELIMITER


	<!DOCTYPE html>
	<html>
	
	<head>
	
		<title>Books In Vogue</title>
		<meta charset="utf-8" />
		<meta name="title" content="Books In Vogue" />
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	
		<!-- Icons. Uncomment required icon fonts -->
		<link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
	
		<!-- Favicon -->
		<link rel="icon" type="image/x-icon" href="assets/img/logo.png" />
	
		<!-- Core CSS -->
		<link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
		<link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
		<link rel="stylesheet" href="assets/css/demo.css" />
	</head>
	<style>
	body {
		background-color: #eaebed;
		font-family: sans-serif;
		-webkit-font-smoothing: antialiased;
		font-size: 14px;
		line-height: 1.4;
		margin: 0;
		padding: 0;
		-ms-text-size-adjust: 100%;
		-webkit-text-size-adjust: 100%;
	}
	
	#card {
	
		width: 50%;
		margin-top: 0px;
	}
	
	#otpbtn {
	
		width: 50%;
		cursor: text;
		font-size: x-large;
	}
	
	p {
	
		font-size: 14px;
		font-weight: normal;
		font-family: sans-serif;
	}
	
	@media only screen and (max-width: 620px) {
	
		#card {
	
			width: 80%;
			margin-top: 0px;
		}
	
	}
	</style>
	
	<body>
	
		<div class="container justify-content-center text-center mt-5">
			<img src="assets/img/logo.png" class="img-fluid" width="120">
		</div>
	
		<div id="card" class="container card mt-4">
			$msg;
		</div>
	
	
		<div class="container justify-content-center text-center mt-3">
			<p class="text-mute mb-0">&copy; Team Book In Vogue </p>
			<p class="text-mute">Developed with ???? by: <a
					href="https://www.google.com/search?client=opera&q=abolade+greatness&sourceid=opera&ie=UTF-8&oe=UTF-8"
					target="_blank">Abolade Greatness</a></p>
	
		</div>
	
	
	
	</body>
	<script src="assets/vendor/libs/jquery/jquery.js"></script>
	<script src="assets/vendor/libs/popper/popper.js"></script>
	<script src="assets/vendor/js/bootstrap.js"></script>
	
	</html>
	
	
	DELIMITER;
	
	$send = mail($to, $subject, $body, $headers);
}


//notify users mail
function notify_user($username, $email, $msg, $subj) {

	$to = $email;
	$from = "info@booksinvogue.com";

	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
	$headers .= "X-Priority: 1 (Highest)\n";
	$headers .= "X-MSMail-Priority: High\n";
	$headers .= "Importance: High\n";

	$subject = $subj;

	$body = <<<DELIMITER


	<!DOCTYPE html>
	<html>
	
	<head>
	
		<title>Books In Vogue</title>
		<meta charset="utf-8" />
		<meta name="title" content="Books In Vogue" />
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	
		<!-- Icons. Uncomment required icon fonts -->
		<link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
	
		<!-- Favicon -->
		<link rel="icon" type="image/x-icon" href="assets/img/logo.png" />
	
		<!-- Core CSS -->
		<link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
		<link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
		<link rel="stylesheet" href="assets/css/demo.css" />
	</head>
	<style>
	body {
		background-color: #eaebed;
		font-family: sans-serif;
		-webkit-font-smoothing: antialiased;
		font-size: 14px;
		line-height: 1.4;
		margin: 0;
		padding: 0;
		-ms-text-size-adjust: 100%;
		-webkit-text-size-adjust: 100%;
	}
	
	#card {
	
		width: 50%;
		margin-top: 0px;
	}
	
	#otpbtn {
	
		width: 50%;
		cursor: text;
		font-size: x-large;
	}
	
	p {
	
		font-size: 14px;
		font-weight: normal;
		font-family: sans-serif;
	}
	
	@media only screen and (max-width: 620px) {
	
		#card {
	
			width: 80%;
			margin-top: 0px;
		}
	
	}
	</style>
	
	<body>
	
		<div class="container justify-content-center text-center mt-5">
			<img src="assets/img/logo.png" class="img-fluid" width="120">
		</div>
	
		<div id="card" class="container card mt-4">
			$msg;
		</div>
	
	
		<div class="container justify-content-center text-center mt-3">
			<p class="text-mute mb-0">&copy; Team Book In Vogue </p>
			<p class="text-mute">Developed with ???? by: <a
					href="https://www.google.com/search?client=opera&q=abolade+greatness&sourceid=opera&ie=UTF-8&oe=UTF-8"
					target="_blank">Abolade Greatness</a></p>
	
		</div>
	
	
	
	</body>
	<script src="assets/vendor/libs/jquery/jquery.js"></script>
	<script src="assets/vendor/libs/popper/popper.js"></script>
	<script src="assets/vendor/js/bootstrap.js"></script>
	
	</html>
	
	
	DELIMITER;
	
	$send = mail($to, $subject, $body, $headers);
	
}


/** RESEND OTP */
if(isset($_POST['otpp'])) {

	$otpp = clean(escape($_POST['otpp']));
	
	$email = $_SESSION['usermail'];
	
	$activator = otp();	

	$sql = "UPDATE users SET `status` = '$activator', `verified` = 'No' WHERE `email` = '$email'";
	$res = query($sql);

	$subj = "NEW OTP REQUEST";
	
	$msg = <<<DELIMITER

    <p class="mt-4 text-dark fw-bold">???? You requested for a new OTP Code </p>
    <p class="mt-2 text-dark">?????? Kindly use the code below to continue into your account</p>
    <p class="mt-2 text-dark">????  Do not share this code outside Books In Vogue website or Mobile App</p>
    <div class="justify-content-center text-center">
        <button id="otpbtn" class="text-center btn btn-rounded btn-primary mt-2 fw-bold">$activator</button>
    </div>  

    <p class="mt-4 mb-4 text-dark">??? If you didn't request for this mail, kindly ignore it.</p>

    DELIMITER;
	
	mail_mailer($email, $activator, $subj, $msg);
	echo "New OTP Code sent to your email";
}


/**Activate OTP ACCOUNT */
if(isset($_POST['votp'])) {

	$email = $_SESSION['usermail'];
	$veotp = clean(escape($_POST['votp']));


	//select the otp stored in the user database
	$ssl = "SELECT * from users WHERE `email` = '$email'";
	$res = query($ssl);

	if(row_count($res) == null) {
		
		echo "There was an error validating your OTP. <br/> Please try again later.";

	} else {

		$row = mysqli_fetch_array($res);

		$votp = $row['status'];

		if($veotp != $votp) {

			echo "Invalid OTP Code!";
			
		} else {

			//update database and auto-login
			$sql = "UPDATE users SET `status` = '2', `verified` = 'Yes' WHERE `email` = '$email'";
			$rsl = query($sql);

			$user = $row['usname'];

			//forgot password recovery page
			if(!isset($_SESSION['vnext'])) {

				$username = $user;
				
				$role = $row['role'];

				$subj = "You are Welcome";

				$msg = <<<DELIMITER

    <p class="mt-4 text-dark fw-bold">???? Welcome to the Books In Vogue Tribe </p>
    <p class="mt-2 text-dark">Hi there,</p>
    <p class="mt-2 text-dark">We are super excited to have you on Books In Vogue</p>
    <p class="mt-2 text-dark">Books In Vogue is a platform developed to help you read amazing books, upload your own book(s) or publish books for other authors.</p>
    <p class="mt-2 text-dark">We will continue to enhance the experience of our interfaces to ensure that you enjoy a seamless reading feel.</p>
    <p class="mt-2 text-dark">Got any issues, complaint or request? Kindly chat with us on our <a target="_blank" href="https://booksinvogue.com.ng/contact">live chat support panel</a></p>
    <p class="mt-2 text-dark">Do have a wonderful book experience</a></p>
    <p class="mt-4 mb-4 text-dark">??? Best Regards</p>
    DELIMITER;

				//notify user that passowrd has been changed
				notify_user($username, $email, $msg, $subj);

				//redirect to user dashboard according to user category
				role_director($username, $role);

				} else {
					
					$data = $_SESSION['vnext'];
					echo '<script>'.$data.'</script>';
				}
		}
	}
}


	

/** SIGN IN USER **/
if(isset($_POST['username']) && isset($_POST['password'])) {

		$username        = clean(escape($_POST['username']));
		$password   	 = md5($_POST['password']);

		$sql = "SELECT * FROM `users` WHERE `usname` = '$username' AND `password` = '$password'";
		$result = query($sql);
		if(row_count($result) == 1) {

			$row 	    = mysqli_fetch_array($result);
			
			$user 		= $row['usname'];
			$email 		= $row['email'];
			$activate 	= $row['verified'];
			$role		= $row['role'];
			

			if ($activate == 'No') {

				$activator = otp();

				$_SESSION['usermail'] = $email;

				//update activation link
				$ups = "UPDATE users SET `status` = '$activator', `verified` = 'No' WHERE `usname` = '$username'";
				$ues = query($ups);

				$subj = "VERIFY YOUR EMAIL";
				$msg  = "Hi there! <br /><br />Kindly use the otp below to activate your account;";

				mail_mailer($email, $activator, $subj, $msg);

				//open otp page
				echo 'Loading... Please Wait!';
				echo '<script>otpVerify(); signupClose();</script>';

				
			}  else {

				role_director($username, $role);
		} 

	}  else {
		
		echo 'Wrong username or password.';
	}
}


/** FORGOT PASSWORD **/
if(isset($_POST['fgeml'])) {
	
	$email  = clean(escape($_POST['fgeml']));

	$_SESSION['usermail'] = $email;

	if(!email_exist($email)) {

		echo "Sorry! This email doesn't have an account";
		
	} else {

	$activator = otp();

	$ssl = "UPDATE users SET `status` = '$activator', `verified` = 'No' WHERE `email` = '$email'";
	$rsl = query($ssl);

	//redirect to verify function
	$subj = "RESET YOUR PASSWORD";
	$msg = <<<DELIMITER

    <p class="mt-4 text-dark fw-bold">???? Let's get you back into your account </p>
    <p class="mt-2 text-dark">?????? Kindly use the code below to continue into your account</p>
    <p class="mt-2 text-dark">????  Do not share this code outside Books In Vogue website or Mobile App</p>
    <div class="justify-content-center text-center">
        <button id="otpbtn" class="text-center btn btn-rounded btn-primary mt-2 fw-bold">$activator</button>
    </div>  

    <p class="mt-4 mb-4 text-dark">??? If you didn't request for this mail, kindly ignore it.</p>

    DELIMITER;

	mail_mailer($email, $activator, $subj, $msg);

	//open otp page
	echo 'Loading... Please Wait!';
	$_SESSION['vnext'] = "updatePword();";
	echo '<script>otpVerify(); signupClose();</script>';

	}
}



/** RESET PASSWORD **/
if(isset($_POST['fgpword']) && isset($_POST['fgcpword'])) {

	$fgpword = md5($_POST['fgpword']);
	$eml = $_SESSION['usermail'];

	$sql = "UPDATE users SET `password` = '$fgpword', `status` = '1', `verified` = 'Yes' WHERE `email` = '$eml'";
	$rsl = query($sql);
	
	//get username and redirect to dashboard
	$ssl = "SELECT * FROM users WHERE `email` =  '$eml'";
	$rsl = query($ssl);
	
	if(row_count($rsl) == '') {
		
		echo 'Loading... Please Wait';
		echo '<script>window.location.href ="./signin"</script>';
		
	} else {

		$row  = mysqli_fetch_array($rsl);
		$username = $row['usname'];	
		$role = $row['role'];
		$email = $eml;
		$subj = "Your password was changed";

		$msg = <<<DELIMITER

		<p class="mt-4 text-dark fw-bold">???? Your password has been updated </p>
		<p class="mt-2 text-dark">Your account password was just changed and has been updated.</p>
		<p class="mt-2 text-dark">Ensure you use strong passwords and avoid sharing your details with any person, website or app aside Books In Vogue websites and mobile app</p>
		<p class="mt-2 text-dark"> If you didn't perform this action, kindly reply to this mail so we can help get back your account.</p>
		<p class="mt-4 mb-4 text-dark">??? Best Regards</p>
	
		DELIMITER;
	
		//notify user that passowrd has been changed
		notify_user($username, $email, $msg, $subj);

		//redirect to user dashboard according to user category
		role_director($username, $role);
		
	}
}




// DASHBOARD FUNCTIONS FOR USER
function user_details() {

	if(!isset($_SESSION['login'])) {

		redirect("./logout");

	} else {

		$data = $_SESSION['login'];

		//users details
		$sql = "SELECT * FROM users WHERE `usname` = '$data'";
		$rsl = query($sql);

		//check if user details is valid
		if(row_count($rsl) == '') {

			redirect("./logout");
			
		} else {

		$GLOBALS['t_users'] = mysqli_fetch_array($rsl);

		//set passport for empty passport
		if($GLOBALS['t_users']['passport'] == null && $GLOBALS['t_users']['role'] == 'user') {
			
			$GLOBALS['passport'] = 'assets/img/user.png';

		} else {

			if($GLOBALS['t_users']['passport'] == null && $GLOBALS['t_users']['role'] == 'author') {
				
				$GLOBALS['passport'] = '../assets/img/user.png';
			} else {

				$GLOBALS['passport'] = $GLOBALS['t_users']['passport'];
			}

		}
	}

}
}


//book details
if(isset($_POST['dataid'])) {

	$bookid = clean(escape($_POST['dataid']));
	

	//get book details
	$sql = "SELECT * FROM books WHERE `books_id` = '$bookid'";
	$res = query($sql);
	
	if(row_count($res) == 1) {

		$row = mysqli_fetch_array($res);

		$booktitle = $row['book_title'];
		$bookdescription = $row['sub_title'];
		$author = $row['author'];
		$language = $row['language'];
		$category = "- &nbsp;".$row['category_1']."<br/> - &nbsp;".$row['category_2'];
		$price = "???".number_format($row['selling_price']);
		$sold = $row['sold'];

		$image = "../assets/bookscover/".$row['book_cover'];

		if(file_exists($image)){

			$imager = "assets/bookscover/".$row['book_cover'];
			
		} else {

			$imager = "assets/img/cover.jpg";
		}


		/*if($sold == null) {

			$sold = "0 copies sold";

		} else {

			if($sold == 1) {

				$sold = "1 copy sold";
			} else {

				$sold = number_format($row['sold'])." copies sold";

			}
		}*/


		$try = <<<DELIMITER

		<button type="button" class="mx-3 mt-1 btn-sm btn-outline-primary d-grid" data-bs-dismiss="offcanvas">
		X
		</button>
		
		<div class="offcanvas-header offcanvas-image justify-content-center align-items-center">
			<img style="width: 200px; height: 200px;" src="$imager" alt="$booktitle" class="img-fluid">
		</div>

		<div class="offcanvas-body my-auto mx-0 flex-grow-0">

			<div class="card">
				<div class="table-responsive text-wrap">
					<table class="table">
						<tbody class="table-border-bottom-0">
							<tr>
								<td><i class="fab fa-angular fa-lg text-danger me-3"></i>
									<strong>Title</strong>
								</td>
								<td>$booktitle</td>
							</tr>
							<tr>
								<td><i class="fab fa-angular fa-lg text-danger me-3"></i>
									<strong>About</strong>
								</td>
								<td>$bookdescription</td>
							</tr>
							<tr>
								<td><i class="fab fa-angular fa-lg text-danger me-3"></i>
									<strong>Author</strong>
								</td>
								<td>$author</td>
							</tr>
							<tr>
								<td><i class="fab fa-angular fa-lg text-danger me-3"></i>
									<strong>Language</strong>
								</td>
								<td>$language</td>
							</tr>
							<tr>
								<td><i class="fab fa-angular fa-lg text-danger me-3"></i>
									<strong>Category</strong>
								</td>
								<td>$category</td>
							</tr>

							<tr>
								<td><i class="fab fa-angular fa-lg text-danger me-3"></i>
									<strong>Price</strong>
								</td>
								<td>$price</td>
							</tr>

							<!---<tr>
								<td><i class="fab fa-angular fa-lg text-danger me-3"></i>
									<strong>Sold</strong>
								</td>
								<td>$sold</td>
							</tr>-->


						</tbody>
					</table>
				</div>
			</div>
			
				<div class="mt-3 col-lg-12 text-center justify-content-center align-item-center">

						<div class="row text-center justify-content-center align-item-center">

							<span class="mx-2 badge bg-label-primary col-2 p-1"><i class="bx bx-star"></i></a>
							</span>

							<button type="button" class="btn btn-primary col-6 d-grid">Buy this book</button>

							<span class="mx-2 badge bg-label-primary col-2 p-1"><i class="bx bx-share-alt"></i></a>
							</span>
						
						</div>
				</div>

		</div>
		
		DELIMITER;

		echo $try;

		} else {

		echo "This book is no longer available.";
		}
}


//add to wishlist
if(isset($_POST['wishid'])) {

	$bookid = clean(escape($_POST['wishid']));
	$user  = $_SESSION['login'];
	$wid = "biv/wsh/".rand(0,999);

	$sql ="INSERT into boughtbook(`id`, `wid`, `bookid`, `userid`, `reading`)";
	$sql.="VALUES('1', '$wid', '$bookid', '$user', 'wishlist')";
	$res = query($sql);

	/*$chck = <<<DELIMITER
	
	<i class="bx bx-check text-white"></i>
	
	DELIMITER;

	echo $chck;*/
	
}


//make payment for book
if(isset($_POST['amt']) && isset($_POST['bkid']) && isset($_POST['authoremail']) && isset($_POST['bkprice']) && isset($_POST['rylty'])) {

	$amter = $_POST['amt'] - 0;
	$athmail = trim($_POST['authoremail']);
	$bkprice = trim($_POST['bkprice']);
	$rylty = trim($_POST['rylty']);

	//check if user has eneough money in wallet
	user_details();

	if($t_users['wallet'] > $amter) {

		$bkid = $_POST['bkid'] - 0;
	
		$tref = "bivpay".rand(0, 999);
		$bbid = "bbid".rand(0, 999);
		$date = date("Y-m-d h:i:sa");
		$data = $_SESSION['login'];
		$note = "Your wallet was debited with ???".number_format($amter);


		//get new user wallet balance
		$newbal = $t_users['wallet'] - $amter;
		
		//insert into transaction history
        $tsql="INSERT INTO t_his(`t_ref`, `amt`, `datepaid`, `username`, `sn`, `status`, `paynote`)";
        $tsql.="VALUES('$tref', '$amter', '$date', '$data', '1', 'debit', '$note')";
        $tes = query($tsql);


		//update wallet balance
		$upsl = "UPDATE users SET `wallet` = '$newbal' WHERE `usname` = '$data'";
		$uel = query($upsl);


		//add to bookshelf
		$bskl="INSERT INTO boughtbook(`id`, `bbid`, `bookid`, `userid`, `tranid`, `reading`, `authormail`, `price`, `royalty`)";
		$bskl.="VALUES('1', '$bbid', '$bkid', '$data', '$tref', 'Yes', '$athmail', '$bkprice', '$rylty')";
		$rkl = query($bskl);

		
		//check if book is in wishlist and delete from wishlist
		$whsl = "SELECT * FROM boughtbook WHERE `userid` = '$data' AND `reading` = 'wishlist' AND `bookid` = '$bkid'";
		$whls = query($whsl);

		if(row_count($whls) == null || row_count($whls) == '') {

			//do nothing

		} else {

			//if a matching record is found, delete the matching record
			$wdl = "DELETE FROM boughtbook WHERE `userid` = '$data' AND `reading` = 'wishlist' AND `bookid` = '$bkid'";
			$wrl = query($wdl);
		}

		//redirect to bookshelf
		$_SESSION['bookmsg'] = "Your Wallet has been funded successfully";
		
		echo 'Loading... Please Wait';
		echo '<script>window.location.href ="./bookshelf"</script>';

	} else {

		echo "Insufficent balance in your wallet. Please fund your wallet";

	}
	
}




//***** AUTHOR PAGE **********/
//get account name
if(isset($_POST['bank']) && isset($_POST['acctn']) && isset($_POST['trd'])) {

	$bank  = clean(escape($_POST['bank']));
	$acctn = clean(escape($_POST['acctn']));


	//get bank code first
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
        
        if($banks[$row]['name'] == $bank){
    
        $bankcode = $banks[$row]['code'];
        }
		
		$row++;
    }
	
	//echo $bank;

	$request = [

		'account_number' => $acctn,
		'account_bank' => $bankcode
	];
	
	$curl = curl_init();
	
		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://api.flutterwave.com/v3/accounts/resolve',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => json_encode($request),
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer FLWSECK-1109e7cb4c9e1871e91a90f1d91c8479-X',
			'Content-Type: application/json'
		),
		));
	
	    $response = curl_exec($curl);
		$err = curl_error($curl);

		if($err){
		// there was an error contacting the rave API
		die('Error Retrieving Your Account Name');
		}
		
		curl_close($curl);

		
		$res = json_decode($response);

        if($res->status == "success") {
		echo $res->data->account_name;
        } else {

            echo "Error Retrieving Your Account Name";
        }
	
}


//save acct details
if(isset($_POST['bank']) && isset($_POST['acctn']) && isset($_POST['actnm'])){

	$bank  = clean(escape($_POST['bank']));
	$acctn = clean(escape($_POST['acctn']));
	$actnm = clean(escape($_POST['actnm']));
	$user  = $_SESSION['login'];

	//update user acount
	$sql = "UPDATE users SET `act name` = '$actnm', `act no` = '$acctn', `bnk nme` = '$bank' WHERE `usname` = '$user'";
	$res = query($sql);
	
	//refresh index page
	echo 'Loading... Please Wait';
	echo '<script>window.location.href ="./"</script>';
}

//uplaod book and softcopies
if(isset($_POST['booktitle']) && isset($_POST['bookdescp']) && isset($_POST['series']) && isset($_POST['author']) && isset($_POST['otherauthor']) && isset($_POST['copyright']) && isset($_POST['category']) && isset($_POST['isbn']) && isset($_POST['price']) && isset($_POST['authprofit']) && isset($_POST['bivprofit']) && isset($_POST['lang']) || isset($_POST['dft']) || isset($_POST['bookdtta']) || isset($_POST['imgnxtxt'])) {

	$booktitle = clean(escape($_POST['booktitle']));
	$bookdescp = clean(escape($_POST['bookdescp']));
	$series = clean(escape($_POST['series']));
	$author = clean(escape($_POST['author']));
	$otherauthor = clean(escape($_POST['otherauthor']));
	$copyright = clean(escape($_POST['copyright']));
	$category = clean(escape($_POST['category']));
	$isbn = clean(escape($_POST['isbn']));
	$price = clean(escape($_POST['price']));
	$authprofit = clean(escape($_POST['authprofit']));
	$bivprofit = clean(escape($_POST['bivprofit']));
	$lang = clean(escape($_POST['lang']));
	$date = date("F d, Y");


	user_details();

	$email = $t_users['email'];


		//save to edited book to draft
		if(isset($_POST['dft']) && isset($_POST['dft']) != null && isset($_POST['dft']) != '' && isset($_POST['dft']) == 'editdraft' && isset($_POST['bookdtta']) && isset($_POST['bookdtta']) != null && isset($_POST['bookdtta']) != '') {

			$bookdtta = clean(escape($_POST['bookdtta']));
	
			//update the uploaded book in the db
			$sql = "UPDATE books SET `language` = '$lang', `book_title` = '$booktitle', `series_volume` = '$series', `author` = '$author', `other_author` = '$otherauthor', `copyright` = '$copyright', `category_1` = '$category', `isbn` = '$isbn', `selling_price` = '$price', `royalty_price` = '$authprofit', `description` = '$bookdescp', `book_status` = 'draft' WHERE `books_id` = '$bookdtta'";
			$res = query($sql);

			echo 'Loading... Please Wait';
			echo '<script>window.location.href ="./drafts"</script>';

		} else {

				
			//save the edited book and move to file upload if neccessary
			if(isset($_POST['bookdtta']) && isset($_POST['bookdtta']) != null && isset($_POST['bookdtta']) != '' && isset($_POST['imgnxtxt']) && isset($_POST['imgnxtxt']) == 'image are choosy') {

				$bookdtta = clean(escape($_POST['bookdtta']));
				
				//update the uploaded book in the db
				$sql = "UPDATE books SET `language` = '$lang', `book_title` = '$booktitle', `book_status` = 'Show', `series_volume` = '$series', `author` = '$author', `other_author` = '$otherauthor', `copyright` = '$copyright', `category_1` = '$category', `isbn` = '$isbn', `selling_price` = '$price', `royalty_price` = '$authprofit', `description` = '$bookdescp' WHERE `books_id` = '$bookdtta'";
				$res = query($sql);

				echo 'Loading... Please Wait';

				//create session to store current book details
				$_SESSION['eddbookupl'] = str_replace(' ', '-', $booktitle);

				$_SESSION['eddbooknew'] = str_replace(' ', '-', $booktitle);

				echo '<script>book();</script>';

				//echo $post_url   = str_replace(' ', '-', $booktitle);
			} else {

			if(book_exist($booktitle)) {

				echo "This book is already has been published previously.";
				
			} else {
			
				
		//insert into book db
		$sql = "INSERT INTO books(`email_address`, `language`, `book_title`, `series_volume`, `author`, `other_author`, `copyright`, `category_1`, `isbn`, `selling_price`, `royalty_price`, `description`, `book_status`, `date_posted`)";
		$sql.="VALUES('$email', '$lang', '$booktitle', '$series', '$author', '$otherauthor', '$copyright', '$category', '$isbn', '$price', '$authprofit', '$bookdescp', 'draft', '$date')";
		$res = query($sql);


		//if save to draft button is used, redirect to draft page
		if(isset($_POST['dft']) && isset($_POST['dft']) == 'draft' && isset($_POST['dft']) != null && isset($_POST['dft']) != '') {

			echo 'Loading... Please Wait';
			echo '<script>window.location.href ="./drafts"</script>';
			
		} else {

		//create session to store current book details
		$_SESSION['bookupl'] = str_replace(' ', '-', $booktitle);

		$_SESSION['booknew'] = str_replace(' ', '-', $booktitle);

		echo '<script>book();</script>';

		//echo $post_url   = str_replace(' ', '-', $booktitle);
		}
	}
	}
	}
}

//publush book with book image and book cover
if (!empty($_FILES["fil"]["name"]) && !empty($_FILES["covfile"]["name"])) {
	
	$target_dir1 = "../softbooks/";
	$target_dir2 = "../assets/bookscover/";

	$target_file1 =  basename($_FILES["fil"]["name"]);
	$target_file2 =  basename($_FILES["covfile"]["name"]);

	$targetFilePath1 = $target_dir1 . $target_file1;
	$targetFilePath2 = $target_dir2 . $target_file2;

	$uploadOk = 1;

	$imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
	$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);

	
	// Allow certain file formats
	if($imageFileType1 != "pdf" && ($imageFileType2 != ".jpg" || $imageFileType2 != ".png" || $imageFileType2 != ".jpeg")) {
		echo "Sorry, only .pdf, .jpg, .jpeg, .png files are allowed.";
		$uploadOk = 0;
	} else {
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	   echo "Sorry, your book was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	   
	   move_uploaded_file($_FILES["fil"]["tmp_name"], $targetFilePath1);
	   move_uploaded_file($_FILES["covfile"]["tmp_name"], $targetFilePath2);
	   book_img($target_file1, $target_file2);
	}	    	
	}	
}

///sql update books image in db
function book_img($target_file1, $target_file2) {

	if(isset($_SESSION['eddbookupl'])) {
		
	$cod     = $_SESSION['eddbookupl'];
	$code    = str_replace('-', ' ', $cod);

	//create notifictaion for edited
	$_SESSION['edbkuplsuccess'] = $code;
	
	} else {

	$cod     = $_SESSION['bookupl'];
	$code    = str_replace('-', ' ', $cod);

	}

	$sql = "UPDATE `books` SET `book_file` = '$target_file1', `book_cover` = '$target_file2', `book_status` = 'Show' WHERE `book_title` = '$code'";
	$res = query($sql);

	echo 'Loading.. Please wait';
	echo "<script>shout(); $('#pybst').show();</script>";

	unset($_SESSION['bookupl']);
}


//get books details
function book_details($data) {

	$sql = "SELECT * FROM books WHERE `book_title` = '$data'";
	$res = query($sql);
	if(row_count($res) == null || row_count($res) == '') {

		redirect('./mybooks');
		
	} else {

		$GLOBALS['editdraft'] = mysqli_fetch_array($res);
	}
}

//get total book sold
function book_sold() {

	$email = $GLOBALS['t_users']['email'];
	
	$sql = "SELECT *, sum(`id`) AS `totbook`, sum(`royalty`) AS `royalty`  FROM boughtbook WHERE `authormail` = '$email'";
	$res = query($sql);
	if(row_count($res) == '') {

		$GLOBALS['totbook'] = 0;

	} else {
		$row = mysqli_fetch_array($res);
		$GLOBALS['totbook'] = $row['totbook'];
		$GLOBALS['royal'] = $row['royalty'];
	}
}

//get to tal book bought
function book_bought() {

	$user = $_SESSION['login'];

	$sql = "SELECT *, sum(`id`) AS `bookbought` FROM `boughtbook` WHERE `userid` = '$user' AND `reading` = 'Yes'";
	$res = query ($sql);

	if(row_count($res) == '') {

		$GLOBALS['bookbought'] = 0;
		
	} else {

		$row = mysqli_fetch_array($res);
		$GLOBALS['bookbought'] = $row['bookbought'];
	}
}


//delete a book
if(isset($_POST['bkid']) && isset($_POST['authoremail']) && isset($_POST['bkdel']) && isset($_POST['bkdel']) == 'delete') {
	
	$bkid = trim($_POST['bkid']);
	$authoremail = trim($_POST['authoremail']);

	$sql = "UPDATE books SET `book_status` = 'deleted' WHERE `books_id` = '$bkid' AND `email_address` = '$authoremail'";
	$res = query($sql);

	$_SESSION['bkupdel'] = "Deleted";

	//refresh index page
	echo 'Loading... Please Wait';
	echo '<script>window.location.href ="./mybooks"</script>';
}


//upgrading accounts
if(isset($_POST['upgrade'])) {

	$data = $_SESSION['login'];

	if(isset($_POST['upgrade']) == 'author') {

	$sql = "UPDATE users SET `role` = 'author' WHERE `usname` = '$data'";
	$res = query($sql);

	//redirect to author page
	echo '<script>window.location.href ="author/./"</script>';

	} else {


		if(isset($_POST['upgrade']) == 'publisher') {

			$sql = "UPDATE users SET `role` = 'publisher' WHERE `usname` = '$data'";
			$res = query($sql);

			//redirect to author page
			echo '<script>window.location.href ="publisher/./"</script>';
			
		}
	}
}