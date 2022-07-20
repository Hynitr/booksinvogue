<?php 
include("functions/init.php");
if(isset($_GET['status']) && isset($_GET['tx_ref']) && isset($_GET['transaction_id'])) {

    if($_GET['status'] == "successful") {

        $id = $_GET['transaction_id'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/".$id."/verify",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer FLWSECK_TEST-cbd49260cb1878515928037a7b761c9f-X"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

		if($err){
		// there was an error contacting the rave API
        echo "Poor Internet Connection. Refresh this page please";
        //redirect("./");
        die();
        
		}

        curl_close($curl);

        $res = json_decode($response);
        $amt = $res->data->amount;

        $data = $_SESSION['login'];
        $date = date("Y-m-d h:i:sa");
        $tref = "bivpay".rand(0, 999);
        
        //get previous wallet balance
        $asql = "SELECT * FROM users WHERE `usname` = '$data'";
        $aes  = query($asql);

        $row = mysqli_fetch_array($aes);

        $prvamt = $row['wallet'];

        $newbal =  $prvamt + $amt;
        $note = "Your wallet was credited with ₦".number_format($amt);

        //credit user
        $csql = "UPDATE users SET `wallet` = '$newbal' WHERE `usname` = '$data'";
        $cres = query($csql);

        //insert into transaction history
        $tsql = "INSERT INTO t_his(`t_ref`, `amt`, `datepaid`, `username`, `sn`, `status`, `paynote`)";
        $tsql .= "VALUES('$tref', '$amt', '$date', '$data', '1', 'credit', '$note')";

        $tes = query($tsql);


            //notify user of the payment made
            $msg = <<<DELIMITER

                        <tr>
                        <p style="color: black; font-weight: bold; margin-top: 24px !important;">Credit Alert! 💵🤑💸💰 </p>
                        </tr>
                        <tr>
                        <p style="color: black; margin-top: 8px !important;">Hi there,</p>
                        </tr>
                        <tr>
                        <p style="color: black; margin-top: 8px !important;">$note</p>
                        </tr>
                        <tr>
                        <tr>
                        <p style="color: black; margin-top: 8px !important;">Got any issues, complaint or request? Kindly chat with us on our <a target="_blank" href="https://booksinvogue.com.ng/contact">live chat support panel</a></p>
                        </tr>
                        <tr>
                        <p style="color: black; margin-top: 8px !important;">Keep having a wonderful book experience</a></p>
                        </tr>
                        <tr>
                        <p style="color: black; margin-bottom: 32px !important;">⚡ Best Regards</p>
                        </tr>
        
            DELIMITER;
        

        $subj = "Credit Alert";

        $email = $t_users['email'];
        $username = $data;

        notify_user($username, $email, $msg, $subj);

        //redirect to home
        $_SESSION['paymsg'] = "Your Wallet has been funded successfully";
           
        redirect("./");
    
        } else {

        $_SESSION['paymsg'] = "Error processing your payment";
        redirect("./");
        }
        } else {

                $_SESSION['paymsg'] = "Unable to verify payment";
                redirect("./");
            }
?>