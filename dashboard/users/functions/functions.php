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


function token_generator() {

	$token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));

	return $token; 
}


function display_message() {

	if(isset($_SESSION['message'])) {

		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}


function validation_errors($error_message) {

	$error_message = <<<DELIMITER

	<div style="background: #000000; color: white;" class="col-md-12 alert alert-danger alert-mg-b alert-success-style6 alert-st-bg3 alert-st-bg14">
		<button type="button" style="color: white;" class="col-md-12 close sucess-op" data-dismiss="modal" aria-label="Close">
			<span class="icon-sc-cl" aria-hidden="true">&times;</span>
										</button>
					<p style="color: white;"><strong>$error_message </strong></p>
								</div>
	DELIMITER;

	return $error_message;     

}



function validator($error_message) {

	$error_message = <<<DELIMITER
	<div style="background: #000000; color: white;" class="col-md-12 alert alert-danger alert-mg-b alert-success-style6 alert-st-bg3 alert-st-bg14">
		<button type="button" style="color: white;" class="col-md-12 close sucess-op" data-dismiss="modal" aria-label="Close">
			<span class="icon-sc-cl" aria-hidden="true">&times;</span>
										</button>
					<p style="color: white;"><strong>$error_message </strong></p>
								</div>
	DELIMITER;

	return $error_message;     

}


/********** validate user functions *******/

//check if custom fee table exits
function table_exist($cusfee) {
	$sql = "SHOW TABLES LIKE '%$cusfee'";
	$result = query($sql);
	while ($row = mysqli_fetch_row($result)) {
		if($row[0] == $cusfee) {
		return true;
	} else {
	
		return false;
	}
	}
	mysqli_free_result($result);
	
}

//check if admission number exit
function adid_exist($adid) {

	$sql = "SELECT * FROM `student` WHERE `adid` = '$adid'";
	$result = query($sql);

	if(row_count($result) == 1) {
		return true;
		
	}else {
		return false;
		
	} 
}


//---------------  admin dashboard functions ---------//
if (isset($_POST['password'])) {
	
		$admission       = escape(clean("admin"));
		$password   	 = escape(clean(md5($_POST['password'])));

		$sql 	= "SELECT `password` FROM `admin` WHERE `username` = '$admission'";
		$result = query($sql);

		if(row_count($result) == 1) {
			$row = mysqli_fetch_array($result);

			$user_password = $row['password'];

			if($password == $user_password) {

				$_SESSION['admin'] = $admission;

				 echo 'Loading.. Please wait';	
				 echo '<script>window.location.href ="./"</script>';

			} else {

		echo "Incorrect Password";
	}
	} else {

		echo "Wrongly typed password";
	}
}




//--------------- register --------//
if(isset($_POST['pname']) && isset($_POST['clss']) && isset($_POST['fst']) && isset($_POST['snd']) && isset($_POST['trd']) && isset($_POST['adid'])) {

	$pname = clean(escape($_POST['pname']));
	$clss  = clean(escape($_POST['clss']));
	$fst   = clean(escape($_POST['fst']));
	$snd   = clean(escape($_POST['snd']));
	$trd   = clean(escape($_POST['trd']));
	$adid  = clean(escape($_POST['adid']));
	$trm   = $_SESSION['trm'];

	if($fst == '' || $fst == '0' && $trm == '1st Term') {

		echo "1st Term fee cannot be empty";
	} else {

	if ($snd == '' || $snd == '0' && $trm == '2nd Term') {
			
		echo "2nd Term fee cannot be empty";
	} else {

	if ($trd == '' || $trd == '0' && $trm == '3rd Term') {
				
		echo "3rd Term fee cannot be empty";
	} else {

	if(adid_exist($adid)) {

		echo "The admission number already exist in the database";

	} else {


	$fid = 'cjs/'.rand(0, 9999);
	$der = $_SESSION['aca'];

	//get first name
	$string = $pname;
	$fname = strtok($string,  ' ');

	
		
		$sqll = "INSERT INTO student(`name`, `fname`, `class` , `fst`, `snd`, `trd`, `stid`, `session`, `adid`)";
		$sqll.= " VALUES('$pname', '$fname', '$clss' , '$fst', '$snd', '$trd', '$fid', '$der', '$adid')";
		$resullt = query($sqll);
		confirm($resullt);

		echo "Loading...Please wait!";												
		echo '<script>window.location.href ="./input?id='.$clss.'"</script>';
		}
	}
		}
	}
}



//------------ update intake record ------//
if(isset($_POST['uplpname']) && isset($_POST['uplclss']) && isset($_POST['uplfst']) && isset($_POST['uplsnd']) && isset($_POST['upltrd']) && isset($_POST['upladid']) && isset($_POST['stid'])) {

	$uplpname = clean(escape($_POST['uplpname']));
	$uplclss  = clean(escape($_POST['uplclss']));
	$uplfst   = clean(escape($_POST['uplfst']));
	$uplsnd   = clean(escape($_POST['uplsnd']));
	$upltrd   = clean(escape($_POST['upltrd']));
	$upladid  = clean(escape($_POST['upladid']));
	$stid     = clean(escape($_POST['stid']));
	$adid     = $upladid;
	$trm   = $_SESSION['trm'];

	if($uplfst == '' || $uplfst == '0' && $trm == '1st Term') {

		echo "1st Term fee cannot be empty";
	} else {

	if ($uplsnd == '' || $uplsnd == '0' && $trm == '2nd Term') {
			
		echo "2nd Term fee cannot be empty";
	} else {

	if ($upltrd == '' || $upltrd == '0' && $trm == '3rd Term') {
				
		echo "3rd Term fee cannot be empty";
	} else {

	

	$der = $_SESSION['aca'];


		//get first name
		$string = $pname;
		$fname = strtok($string,  ' ');
	

	
		//update db
		$sqll = "UPDATE student SET `name` = '$uplpname', `fname` = '$fname', `class` = '$uplclss', `fst` = '$uplfst', `snd` = '$uplsnd', `trd` = '$upltrd', `adid` = '$adid' WHERE `session` = '$der' AND `stid` = '$stid'";
		$resullt = query($sqll);
		confirm($resullt);

		echo "Loading...Please wait!";

		//create notification
		$_SESSION['notify'] = "Student/Pupil Updated Sucessfully";
		echo '<script>window.location.href ="./pintake"</script>';
	}
		}
	}
}



//---------- update session -----------//
if (isset($_POST['ursfr'])) {

	$ses  = $_SESSION['aca'];
	$data = "1st Term";
	

	//get classes
	$ssl  = "SELECT * FROM student WHERE `session` = '$ses'";
	$rls  = query($ssl);
	while($row  = mysqli_fetch_array($rls)) {

	//get class
	$cs = $row['class'];
	
	//calculate next session values
	$a = str_split($ses,4);
	$b = $a[0] + 1;
	$c = str_split($ses,5);
	$d = $c[1] + 1;

	$aca = $b."/".$d;	
	

	//export previous data into csv file for excel
	//export a database backup


	//update admin table
	$aql = "UPDATE admin SET `session` = '$aca', `term` = '1st Term'";
	$asl = query($aql);

		
	//update classes
	if($cs == "Reception"){

		$cls = "Transition";

		$sql = "UPDATE student SET `session` = '$aca', `class` = '$cls', `fst` = '0', `snd` = '0', `trd` = '0'";
		$res = query($sql);
		
	} else {
		
	if($cs == "Transition"){

		$cls = "Kindergarten";

		$sql = "UPDATE student SET `session` = '$aca', `class` = '$cls', `fst` = '0', `snd` = '0', `trd` = '0'";
		$res = query($sql);
		
	} else {

	if($cs == "Kindergarten"){

			$cls = "Nursery 1";
	
			$sql = "UPDATE student SET `session` = '$aca', `class` = '$cls', `fst` = '0', `snd` = '0', `trd` = '0'";
			$res = query($sql);
			
	} else {
	
	if($cs == "Nursery 1"){

		$cls = "Nursery 2";

		$sql = "UPDATE student SET `session` = '$aca', `class` = '$cls', `fst` = '0', `snd` = '0', `trd` = '0'";
		$res = query($sql);
		
	} else  {
	

	if($cs == "Nursery 2"){

		$cls = "Grade 1";

		$sql = "UPDATE student SET `session` = '$aca', `class` = '$cls', `fst` = '0', `snd` = '0', `trd` = '0'";
		$res = query($sql);
		
	} else {

	if($cs == "Grade 1"){

		$cls = "Grade 2";

		$sql = "UPDATE student SET `session` = '$aca', `class` = '$cls', `fst` = '0', `snd` = '0', `trd` = '0'";
		$res = query($sql);
		
	} else {

	if($cs == "Grade 2"){

		$cls = "Grade 3";

		$sql = "UPDATE student SET `session` = '$aca', `class` = '$cls', `fst` = '0', `snd` = '0', `trd` = '0'";
		$res = query($sql);
		
	} else {

	if($cs == "Grade 3"){

		$cls = "Grade 4";

		$sql = "UPDATE student SET `session` = '$aca', `class` = '$cls', `fst` = '0', `snd` = '0', `trd` = '0'";
		$res = query($sql);
		
	} else {

	if($cs == "Grade 4"){

		$cls = "Grade 5";

		$sql = "UPDATE student SET `session` = '$aca', `class` = '$cls', `fst` = '0', `snd` = '0', `trd` = '0'";
		$res = query($sql);
		
	} else {

	if($cs == "Grade 5"){

		$cls = "JSS 1";

		$sql = "UPDATE student SET `session` = '$aca', `class` = '$cls', `fst` = '0', `snd` = '0', `trd` = '0'";
		$res = query($sql);
		
	} else {

	if($cs == "JSS 1"){

		$cls = "JSS 2";

		$sql = "UPDATE student SET `session` = '$aca', `class` = '$cls', `fst` = '0', `snd` = '0', `trd` = '0'";
		$res = query($sql);
		
	} else {

	if($cs == "JSS 2"){

		$cls = "JSS 3";

		$sql = "UPDATE student SET `session` = '$aca', `class` = '$cls', `fst` = '0', `snd` = '0', `trd` = '0'";
		$res = query($sql);
		
	} else {

	if($cs == "JSS 3"){

		$cls = "SSS 1";

		$sql = "UPDATE student SET `session` = '$aca', `class` = '$cls', `fst` = '0', `snd` = '0', `trd` = '0'";
		$res = query($sql);
		
	} else {

	if($cs == "SSS 1"){

		$cls = "SSS 2";

		$sql = "UPDATE student SET `session` = '$aca', `class` = '$cls', `fst` = '0', `snd` = '0', `trd` = '0'";
		$res = query($sql);
		
	} else {

	if($cs == "SSS 2"){

		$cls = "SSS 3";

		$sql = "UPDATE student SET `session` = '$aca', `class` = '$cls', `fst` = '0', `snd` = '0', `trd` = '0'";
		$res = query($sql);
		
	} else {

	if($cs == "SSS 3"){

		//do nothing
		
	}
	}
	}
	}
	}
	}
	}
	}
	}
	}
	}
	}
	}
	}
	}
	}
	}

	//update balance brought forward
	outstanding($ses, $data);	
	echo '<script>window.location.href ="./"</script>';	
}	





function outstanding($ses, $data) {

	/*$ses  = "2021/2022";
	$data = "1st Term";*/


 $sql = "SELECT *, sum(`amount`) AS TOTAL FROM `feercrd` WHERE `term` = '$data' AND `session` = '$ses' GROUP BY `name` asc";
 $result_set=query($sql);

 while($row= mysqli_fetch_array($result_set)) {

   
    $name = $row['name'];


    if($data == '1st Term') {
          
      $ssl ="SELECT *, sum(fst) as totas from `student` WHERE `session` = '$ses' AND `name` = '$name'";
      $result = query($ssl);
      $vfh = mysqli_fetch_array($result);
    
    } else {
    
    if($data == '2nd Term'){
    
      $ssl ="SELECT *, sum(snd) as totas from `student` WHERE `session` = '$ses' AND `name` = '$name'";
      $result = query($ssl);
      $vfh = mysqli_fetch_array($result);
    
    }else {
    
    if($data == '3rd Term') {
    
    
      $ssl = "SELECT *, sum(trd) as totas from `student` WHERE `session` = '$ses' AND `name` = '$name'";
      $result = query($ssl);
      $vfh = mysqli_fetch_array($result);
    
    }
    }
    }

	$a = $vfh['totas'] - $row['TOTAL'];

	if($a == 0) {

		//do nothing

	} else {
		
		$spillid = 'cjsspill/'.rand(0, 9999);
		
		//get student/pupil details
		$adid 	= $vfh['adid'];
		$name 	= $vfh['name'];
		$class 	= $vfh['class'];
		$ses    = $_SESSION['aca'];
		$term   = $_SESSION['trm'];
		$date   = date("Y-m-d");

		//insert spill over 
		$ins = "INSERT INTO spillover(`spillid`, `adid` , `amount`, `name`, `class`, `session`, `term`, `datespill`)";
		$ins.= " VALUES('$spillid', '$adid' , '$a', '$name', '$class', '$ses', '$term', '$date')";
		$int = query($ins);
		
	}
	
	
}
}




//------ update session term ------//
if (isset($_POST['trm']) && isset($_POST['ursf'])) {
	
	$data  = $_POST['trm'];
	$ptrm = $_SESSION['trm']; 
	$ses  = $_SESSION['aca'];



	//check if term is same as current term
	if($ptrm ==  $data) {

		echo "The term selected is same as current term";

	}else {


	//update admin table
	$sql = "UPDATE admin SET `term` = '$data' WHERE `session` = '$ses'";
	$rsl = query($sql);

	//get outstanding last term payment and add to current term
	outstanding($ses, $data);

	echo "Please wait";
	echo  '<script>$("#ModalCenter").modal("show")</script>';
	echo '<script>window.location.href ="./"</script>';

	}
}




//-------------- input fee paid ---------------//
if (isset($_POST['std']) && isset($_POST['trm']) && isset($_POST['fee']) && isset($_POST['cls']) && isset($_POST['mdd']) && isset($_POST['descr']) && isset($_POST['pde']) && isset($_POST['pdat'])) {

	$std  = $_POST['std'];
	$trm  = $_POST['trm'];
	$fee  = $_POST['fee'];
	$cls  = $_POST['cls'];
	$mdd  = $_POST['mdd'];
	$desc = $_POST['descr'];
	$pdet = $_POST['pde'];
	$pdat = $_POST['pdat'];

	$red  = $_SESSION['aca'];

	$fid = 'cjstran/'.rand(0, 9999);

	if($pdat == null || $pdat == "") {

		$date = date("Y-m-d");

	} else {

		$date = $pdat;
	}
	
	

	//check if the term fee
	$sql = "SELECT * FROM student WHERE `session` = '$red' AND `adid` = '$std'";
	$rsl = query($sql);
	$row = mysqli_fetch_array($rsl);

	$name = $row['name'];

	if($trm == '1st Term') {
		
		$a = $row['fst'];
	} else {

	if($trm == '2nd Term'){

		$a = $row['snd'];
	}else {

	if($trm == '3rd Term') {
		
		$a = $row['trd'];
	}
	}
	}

	

	//validate amount given
	$ssl = "SELECT SUM(`amount`) AS total FROM feercrd WHERE `adid` = '$std' AND `session` = '$red' AND `term` = '$trm'";
	$res = query($ssl);
	$rwf = mysqli_fetch_array($res);

	if($rwf['total'] == '') {
		$tot = 0;
	} else {

		$tot = $rwf['total'];
	}

	//deduct term fee from total paid and get balance
	$new = $a - $tot;

	//get first name
	$string = $name;
    $fname = strtok($string,  ' ');
	

	//check amount paid
	if($fee > $new) {

		echo "The fee inputted is greater than the fee stated for this term";
	} else {

		//insert new record to fee history
		$sqlls = "INSERT INTO feercrd(`feeid`, `adid`, `amount` , `name`, `fname`, `class`, `session`, `term`, `datepaid`, `mode`, `descr`, `moredecr`)";
		$sqlls.= " VALUES('$fid', '$std', '$fee' , '$name', '$fname', '$cls', '$red', '$trm', '$date', '$mdd', '$desc', '$pdet')";
		$resullt = query($sqlls);
		confirm($resullt);

		echo "Loading...Please wait!";												
		echo '<script>window.location.href ="./history?id='.$std.'&cls='.$cls.'&trm='.$trm.'"</script>';


	}
	
	
}




//-------------- Edit input fee paid ---------------//
if (isset($_POST['edstd']) && isset($_POST['edtrm']) && isset($_POST['edfee']) && isset($_POST['edcls']) && isset($_POST['edmdd']) && isset($_POST['eddescr']) && isset($_POST['edpde']) && isset($_POST['edfst']) && isset($_POST['edpdate'])) {

	$edstd  = $_POST['edstd'];
	$edtrm  = $_POST['edtrm'];
	$edfee  = $_POST['edfee'];
	$edcls  = $_POST['edcls'];
	$edmdd  = $_POST['edmdd'];
	$eddesc = $_POST['eddescr'];
	$edpdet = $_POST['edpde'];
	$edfst  = $_POST['edfst'];
	$edpdate = $_POST['edpdate'];

	if($edpdate == null || $edpdate == "") {

		$date = date("Y-m-d");
		
	} else {

		$date = $edpdate;
	}

	
	//check if the term fee
	$sql = "SELECT * FROM student WHERE `session` = '$edfst' AND `adid` = '$edstd'";
	$rsl = query($sql);
	$row = mysqli_fetch_array($rsl);

	$name = $row['name'];
	$class = $row['class'];

	if($edtrm == '1st Term') {
		
		$a = $row['fst'];
	} else {

	if($edtrm == '2nd Term'){

		$a = $row['snd'];
	}else {

	if($edtrm == '3rd Term') {
		
		$a = $row['trd'];
	}
	}
	}

	

	//validate amount given
	$ssl = "SELECT SUM(`amount`) AS total FROM feercrd WHERE `adid` = '$edstd' AND `session` = '$edfst' AND `term` = '$edtrm'";
	$res = query($ssl);
	$rwf = mysqli_fetch_array($res);

	if($rwf['total'] == '') {
		$tot = 0;
	} else {

		$tot = $rwf['total'];
	}

	//deduct term fee from total paid and get balance
	$new = $a - $tot;
	

	//check amount paid
	if($edfee > $new) {

		echo "The fee inputted is greater than the fee stated for this term";
	} else {

		//insert new record to fee history
		$sqlls = "UPDATE feercrd SET `amount` = '$edfee' , `term` = '$edtrm', `mode` = '$edmdd', `descr` = '$eddesc', `moredecr` = '$edpdet', `datepaid` = '$date' WHERE `feeid` = '$edcls'";
		$resullt = query($sqlls);
		confirm($resullt);

		echo "Loading...Please wait!";		
		//create notification
		$_SESSION['notify'] = "Fee Updated Sucessfully";
		echo '<script>window.location.href ="./history?id='.$edstd.'&cls='.$class.'&trm='.$edtrm.'"</script>';


	}
	
	
}




//----- Pay Spillover ------//
if(isset($_POST['std']) && isset($_POST['fee']) && isset($_POST['mdd']) && isset($_POST['pdet'])) {
	
	$std 	= $_POST['std'];
	$fee 	= clean(escape($_POST['fee']));
	$mdd 	= $_POST['mdd'];
	$pdet	= $_POST['pdet'];
	$desc   = "SpillOver Payment";

	$fid = 'cjstran/'.rand(0, 9999);
	$date = date("Y-m-d");

	
	//get student details
	$sql = "SELECT * FROM student WHERE `adid` = '$std'";
	$rsl = query($sql);
	$rtf = mysqli_fetch_array($rsl);
	
	$name = $rtf['name'];
	

	//get student spillover fee
	$spill = "SELECT sum(`amount`) as spilltot FROM spillover WHERE `adid` = '$std'";
    $spls  = query($spill);
    $sph   = mysqli_fetch_array($spls);
	

	$spiamt = $sph['spilltot'];
	

	//validate current paid with spillover fee
	if($fee > $spiamt) {

		echo "The fee inputted is greater than the sum of spillover for this pupil/student";
	} else {

	
		//save details to fee record
		$sqlls = "INSERT INTO feercrd(`feeid`, `amount` , `adid`, `name`, `datepaid`, `mode`, `descr`, `moredecr`)";
		$sqlls.= " VALUES('$fid', '$fee' , '$std', '$name', '$date', '$mdd', '$desc', '$pdet')";
		$resullt = query($sqlls);
		confirm($resullt);

		echo "Loading...Please wait!";												
		echo '<script>window.location.href ="./spillpayhis?id='.$std.'"</script>';
	}
	

	
}



//--- create custom fee ---//
if(isset($_POST['cusfee']) && isset($_POST['cusamt']) && isset($_POST['cuspedt'])){

	$cusfee  = clean(escape($_POST['cusfee']));
	$cusamt  = $_POST['cusamt'];
	$cuspedt = $_POST['cuspedt'];
	$term    = $_SESSION['trm'];
	$ses     = $_SESSION['aca'];

	if(table_exist($cusfee)) {

		echo "This Fee already exit in the database.";
		
	} else {

		createcustom($cusfee);
		
		//insert records into fee
		$sql = "INSERT INTO fee(`fee`, `amt`, `term`, `ses`)";
		$sql .= "VALUES('$cusfee', '$cusamt', '$term', '$ses')";
		$rsl  = query($sql);
		echo '<script>window.location.href ="./custom?id='.$cusfee.'"</script>';

	}
}


//create table custom fee
function createcustom($cusfee) {
	// sql to create table
	$sql = "CREATE TABLE `".$cusfee."`
	(
	id INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	cusid text(255),
	admno text(255),
	name text(255),
	class text(255),
	term text(255),
	ses text(255),
	amt text(255),
	datepaid date,
	mode text(255),
	type text(255)
	)";
	$result = query($sql);
	confirm($result);	
	if(!$result) {

		die("This Fee already exit in the database.");
	}
}


//input custom fee
if(isset($_POST['cinmdd']) && isset($_POST['cinfee']) && isset($_POST['cinstd']) && isset($_POST['cfee']) && isset($_POST['mddr']) && isset($_POST['cusdate'])) {

	$mdd = $_POST['cinmdd'];
	$fee = $_POST['cinfee'];
	$std = $_POST['cinstd'];
	$cfe = $_POST['cfee'];
	$mddr = $_POST['mddr'];
	$term    = $_SESSION['trm'];
	$ses     = $_SESSION['aca'];
	$cusdate = $_POST['cusdate'];

	if($cusdate == null || $cusdate == "") {

		$dat = date("Y-m-d");

	} else{

		$dat = $cusdate;
	}	

	$cusid = 'cjstran/'.rand(0, 9999);

	//get student record
	$sql = "SELECT * FROM student WHERE `adid` = '$std'";
	$rsl = query($sql);
	$row = mysqli_fetch_array($rsl);

	$name = $row['name'];
	$clas = $row['class'];


	//check if the fee is greater than specified fee
	$ssl = "SELECT * FROM fee WHERE `fee` = '$cfe' AND `term` = '$term' AND `ses` = '$ses'";
	$rll = query($ssl);
	$rws = mysqli_fetch_array($rll);

	$spfee = $rws['amt'];

	if($fee > $spfee) {

		echo "The fee inputted is greater than the fee specified for this custom fee";
	} else {

	//check if user balance equals  (do this later)
	
	
	//insert record
	$ins = "INSERT INTO `".$cfe."`(`cusid`, `admno`, `name`, `class`, `term`, `ses`, `amt`, `datepaid`, `mode`, `type`)";
	$ins .= "VALUES('$cusid', '$std', '$name', '$clas', '$term', '$ses', '$fee', '$dat', '$mddr', '$mdd')";
	$isl = query($ins);

	echo '<script>window.location.href ="./cusprin?id='.$cusid.'&data='.$cfe.'"</script>';
	}
}



//--- INSERT EXPENSES TRACKER -----------//
if(isset($_POST['exname']) && isset($_POST['examt']) && isset($_POST['extype']) && isset($_POST['expay']) && isset($_POST['exdesc']) && isset($_POST['qty'])){

	$exname = clean(escape($_POST['exname']));
	$examt  = clean(escape($_POST['examt']));
	$extype = clean(escape($_POST['extype']));
	$expay  = clean(escape($_POST['expay']));
	$exdesc = clean(escape($_POST['exdesc']));
	$qty    = clean(escape($_POST['qty']));

	$tot  = $examt * $qty;
	
	$date   = date("Y-m-d h:i:sa");
	$ses    = $_SESSION['aca'];
	$trm    = $_SESSION['trm'];
	$expid = 'cjsexp/'.rand(0, 9999);

	$sql = "INSERT INTO tracker(`trackid`, `name`, `date`, `session`, `term`, `descrip`, `type`, `mode`, `amount`, `qty` , `total`)";
	$sql .= "VALUES('$expid', '$exname', '$date', '$ses', '$trm', '$exdesc', '$extype', '$expay', '$examt', '$qty', '$tot')";
	$res = query($sql);

	echo "Loading...Please wait!";	
	echo '<script>window.location.href ="./tracker"</script>';
}



function termlyspillover() {

	if($_SESSION['trm'] == '2nd Term') {

		//get all payement record
		$sql = "SELECT *, sum(`fst`) as fee FROM student";
		$res = query($sql);
		$row = mysqli_fetch_array($res);
		
		$fstfee = $row['fee'];
	
		$dql = "SELECT *, sum(`amount`) as total FROM feercrd WHERE `term` = '1st Term'";
		$des = query($dql);
		$dow = mysqli_fetch_array($des);
	
		$fstunpaid = $dow['total'];
	
		$spillover = $fstfee - $fstunpaid;
	
		echo number_format($spillover);
	
	} else {
	
	   
		if($_SESSION['trm'] == '3rd Term') {
	
		//get all payement record
		$sql = "SELECT *, sum(`fst`) as fee, sum(`snd`) as trdd FROM student";
		$res = query($sql);
		$row = mysqli_fetch_array($res);
		
		$fstfee = $row['fee'] + $row['trdd'];
	
		$dql = "SELECT *, sum(`amount`) as total FROM feercrd WHERE `term` = '1st Term' AND `term` = '2nd Term'";
		$des = query($dql);
		$dow = mysqli_fetch_array($des);
	
		$fstunpaid = $dow['total'];
	
		$spillover = $fstfee - $fstunpaid;
	
		echo number_format($spillover);
			
		}
		
	}
}
?>