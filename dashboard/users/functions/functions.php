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



/** VALIDATE USER REGISTRATION **/
if(isset($_POST['fname']) && isset($_POST['usname']) && isset($_POST['email']) && isset($_POST['pword']) && isset($_POST['cpword']) && isset($_POST['ref'])) {

	$fname 			= clean(escape($_POST['fname']));
	$usname			= clean(escape($_POST['usname']));
	$email	 		= clean(escape($_POST['email']));
	$pword    		= clean(escape($_POST['pword']));
	$cpword 		= clean(escape($_POST['cpword']));
	$ref            = clean(escape($_POST['ref']));

		if(email_exist($email)) {

			echo "Sorry! That email has an account already.";
		}else {

			if (usname_exist($usname)) {

				echo "Someone has already chosen that username.";
	
			} else {

				register($fname, $usname, $email, $pword, $ref);
			}

		}  

}

	

/** REGISTER USER **/
function register($fname, $usname, $email, $pword, $ref) {

	$fnam = escape($fname);
	$usname = escape($usname);
	$emai = escape($email);
	$pwor = md5($pword);
	$ref  = escape($ref);

	$datereg = date("Y-m-d h:i:s");

	$_SESSION['usermail'] = $emai;
		
	$activator = otp();
	
	$sql = "INSERT INTO users(`idd`, `fullname`, `usname`, `email`, `password`, `role`, `date_reg`, `status`, `active`, `lastseen`, `ref`, `wallet`)";
	$sql.= " VALUES('1', '$fnam', '$usname', '$emai', '$pwor', 'user', '$datereg', '$activator', '0', '$datereg', '$ref', '0')";
	$result = query($sql);

	//redirect to verify function
	$subj = "VERIFY YOUR EMAIL";
	$msg  = "Hi there! <br /><br />Kindly use the otp below to activate your account;";

	mail_mailer($email, $activator, $subj, $msg);

	//open otp page
	echo 'Loading... Please Wait!';
	echo'<script>otpVerify(); signupClose();</script>';
}



/* MAIL VERIFICATIONS */
function mail_mailer($email, $activator, $subj, $msg) {

	$to = $email;
	$from = "noreply@savearns.com";

	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
	$headers .= "X-Priority: 1 (Highest)\n";
	$headers .= "X-MSMail-Priority: High\n";
	$headers .= "Importance: High\n";

	$subject = $subj;

	$logo = 'https://savearns.com/assets/3.png';
	$url = 'https://savearns.com/';

	$body = "
	<!DOCTYPE html>
	<html lang='en'>

	<head>
	<meta charset='UTF-8'>
	<title>Savearns</title>
	</head>
	<link rel='stylesheet' href='https://savearns.com/assets/css/bootstrap.min.css'>
	<body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #34459C; color: #fff;'>";
	$body .= "<img style='margin-top: 35px; width: 460px; height: 105px;' src='{$logo}' alt='Savearns'>";
	$body .= "<h1 style='margin-top: 45px; color: #fff'>{$subj}</h1>
	<br />";
	$body .= "<h3 style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>{$msg}</h3>
	<br />";
	$body .= "<h1 style='margin-left: 45px; text-align: center;'><b>{$activator}</b></h1>
	<br />";
	$body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Do not bother replying this
	email. This is a virtual email</p>";
	$body .= "<p text-align: center;'><a href='https://savearns.com/contact'><img style='width:150px;heght:150px'
			src='https://savearns.com/assets/footer.png'></a>";
	$body .= "
	<h4 style='text-align: center;'>Email.: <span style='color: #fff'>savings@savearns.com</span></h4>";
	$body .= "<h4 style='text-align: center;'>Call/Chat.: <span style='color: #fff'>+234(0) 810 317 1902</span>
	</h4>";
	$body .= "<h4 style='text-align: center; padding-bottom: 80px; padding-top: 40px;'>Team Savearns</h4>";    
	$body .= "<script src='https://avearns.com/assets/js/bootstrap.min.js'></script>";
	$body .= "</section>";
	$body .= "</body></html>";
	$send = mail($to, $subject, $body, $headers);
}


/** RESEND OTP */
if(isset($_POST['otpp'])) {

	$otpp = clean(escape($_POST['otpp']));
	
	$email = $_SESSION['usermail'];
	
	$activator = otp();	

	$sql = "UPDATE users SET `status` = '$activator', `verified` = 'No' WHERE `email` = '$email'";
	$res = query($sql);

	if($otpp == "dummy") {

	$subj = "NEW OTP PASSWORD";
	$msg  = "Hi there! <br /><br />Kindly use the otp below to activate your account;";	
	} else{
	
		$subj = "RESET YOUR PASSWORD";
		$msg  = "Hi there! <br /><br />Kindly use the otp below to restore your password;";		

	}

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

			echo 'Loading... Please Wait';

			$user = $row['usname'];

			//forgot password recovery page
			if(!isset($_SESSION['vnext'])) {

				$_SESSION['login'] = $user;
				echo '<script>window.location.href ="./"</script>';

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

				//redirect to user dashboard
				if($role == 'user') {
					
					$_SESSION['login'] = $username;

					echo 'Loading... Please Wait';	

					echo '<script>window.location.href ="./"</script>';	
				} else {

					//redirect to admin dashboard
					if($role == 'admin') { 

					echo 'Loading... Please Wait';	

					echo '<script>window.location.assign("https://admin.booksinvogue.com.ng/?lprf='.$password.'")</script>';	
						
					} else {

						echo "This username doesn't have an account.";

					}
				}

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
	$msg  = "Hi there! <br /><br />Kindly use the otp below to restore your password;";

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
		$user = $row['usname'];

		$_SESSION['login'] = $user;
		
		
		echo 'Loading... Please Wait';

		echo '<script>window.location.href ="./"</script>';
		
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
		if($GLOBALS['t_users']['passport'] == null) {
			
			$GLOBALS['passport'] = 'assets/img/user.png';

		} else {

			$GLOBALS['passport'] = $GLOBALS['t_users']['passport'];
		}

		}
	}
	

	//referal details
	/*$rss = "SELECT sum(`active`) AS `earn` FROM `users` WHERE `ref` = '$data'";
	$res = query($rss);
    $GLOBALS['t_ref'] = mysqli_fetch_array($res);

	$GLOBALS['t_ref_earn'] = $GLOBALS['t_ref']['earn'] * 100;


	//classic savings plan
	$clsvs = "SELECT * FROM `savings` WHERE `usname` = '$data' AND `plan` = 'Classic Savings Plan' AND `status` = 'Active'";
	$clsvl = query($clsvs);
	if(row_count($clsvl) != null) {
		
		$GLOBALS['clcsvs'] = mysqli_fetch_array($clsvl);

		//get savings duration
		$dur = $GLOBALS['clcsvs']['duration'];
		$GLOBALS['campdura'] = date('Y-m-d h:i:s', strtotime($GLOBALS['clcsvs']['datepaid']. ' +'.$dur));
	} 
	

	//flex target
	$flsvs = "SELECT * FROM `flex` WHERE `usname` = '$data' AND `status` = 'Active'";
	$flsvl = query($flsvs);
	if(row_count($flsvl) != null) {
	
		$GLOBALS['flsvs'] = mysqli_fetch_array($flsvl);
		
	}


	//flex savings
	$lsvlr = "SELECT * FROM `savings` WHERE `usname` = '$data' AND `plan` = 'Flex Savings Plan' AND `status` = 'Active'";
	$lsvrl = query($lsvlr);
	if(row_count($lsvrl) != null) {
	
		$GLOBALS['lsrs'] = mysqli_fetch_array($lsvrl);
	}

	//campus saving plan
	$cmsvs = "SELECT * FROM `savings` WHERE `usname` = '$data' AND `plan` = 'Campus Savings Plan' AND `status` = 'Active'";
	$cmsvl = query($cmsvs);
	if(row_count($cmsvl) != null) {

	
	$GLOBALS['cmsvs'] = mysqli_fetch_array($cmsvl);

	}*/


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
		$price = "₦".number_format($row['selling_price']);
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

	$sql ="INSERT into wishlist(`sn`, `wid`, `bookid`, `userid`)";
	$sql.="VALUES('1', '$wid', '$bookid', '$user')";
	$res = query($sql);
	
}

//get account name
if(isset($_POST['bank']) && isset($_POST['acctn']) && isset($_POST['trd'])) {

			$bank = clean(escape($_POST['bank']));
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

			while($row < 68) { if($banks[$row]['name']==$bank){ $bankcode=$banks[$row]['code']; } $row++; } //echo $bank;
				$request=[ 'account_number'=> $acctn,
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