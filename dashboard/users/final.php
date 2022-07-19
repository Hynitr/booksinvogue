<?php
    $activator = '5439';
    $email = 'hynitrofficial@gmail.com';
    $subj = 'Activate Your Account';
    $msg = <<<DELIMITER

                <tr>
                <p style="color: black; font-weight: bold; margin-top: 24px !important;">🔏 Your password has been updated </p>
                </tr>
                <tr>
                <p style="color: black; margin-top: 8px !important;">Your account password was just changed and has been updated.</p>
                </tr>
                <tr>
                <p style="color: black; margin-top: 8px !important;">Ensure you use strong passwords and avoid sharing your details with any person, website or app aside Books In Vogue websites and mobile app</p>
                </tr>
                <tr>
                <p style="color: black; margin-top: 8px !important;"> If you didn't perform this action, kindly reply to this mail so we can help get back your account.</p>
                </tr>
                <tr>
                <p style="color: black; margin-bottom: 32px !important;">⚡ Best Regards</p>
                </tr>
    
    DELIMITER;

    $to = $email;
	$from = "info@booksinvogue.com.ng";

    $headers = "From: Booksinvogue ". $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
	$headers .= "X-Priority: 1 (Highest)\n";
    $headers .= "Priority: urgent\n";
	$headers .= "X-MSMail-Priority: High\n";
	$headers .= "Importance: High\n";

	$subject = $subj;

    $body = <<<DELIMITER

    <html>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
   
    <body style="background-color: #eaebed;  font-family: sans-serif;  font-size: 14px; line-height: 1.4; margin-bottom: 2rem !important; padding: 0;">

    
    <div style="text-align: center !important; justify-content: center !important;">
    <img style="max-width: 100%; height: auto; vertical-align: middle; box-sizing: border-box; width: 120px; margin-top: 24px !important;" src="https://dashboard.booksinvogue.com.ng/assets/img/logo.png">
    </div>

    <div style="margin-right: 5%; margin-left: 5%;">
        
        <div style="padding-right: 1.105rem; padding-left: 1.105rem; margin-top: 24px !important; background-color: #fff; position: relative; display: flex; flex-direction: column; height: auto; word-wrap: break-word; background-clip: border-box; border: 0 solid #d9dee3; border-radius: 8px;">
       
       $msg
        
      
       </div>
        

       
    </div>


    <div style="text-align: center !important; margin-top: 19px !important; justify-content: center !important;">
    <p style="color: grey">&copy; Team Book In Vogue </p>
     
        <p style="color: grey; margin-bottom: 32px !important;">Developed with 💖 by:  <a style="text-decoration: none; color: #696cff;" href="https://www.google.com/search?client=opera&q=abolade+greatness&sourceid=opera&ie=UTF-8&oe=UTF-8"
            target="_blank">Abolade Greatness</a></p>
        
       
    </div>
 
   <tr></tr> 


  </body>
</html>


DELIMITER;

$send = mail($to, $subject, $body, $headers, '-finfo@booksinvogue.com.ng');

echo $body;

?>