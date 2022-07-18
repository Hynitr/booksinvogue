<?php
    $activator = '5439';
    $email = 'doteightplus@gmail.com';
    $subj = 'Activate Your Account';
    $msg = <<<DELIMITER

    <tr>
    <p style="color: black; font-weight: bold; margin-top: 24px !important;">👋 Welcome to Books In Vogue. </p>
    </tr>
    <tr>
    <p style="color: black; margin-top: 8px !important;">✨ You are one-click towards activating your account and becoming part of the Books In
    Vogue Tribe</p>
    </tr>
    <tr>
    <p style="color: black; margin-top: 8px !important;">⬇️ Kindly use the code below to activate your account for FREE!</p>
    </tr>
    <tr>
    <p style="color: black; margin-top: 8px !important;">🔒 Do not share this code outside Books In Vogue website or Mobile App</p>
    </tr>
    
       <tr>
       <div style="text-align: center !important; margin-top: 24px !important; margin-bottom: 8px !important; justify-content: center !important;">
       <button style="background-color: #696cff; color: #fff; font-size: x-large; border: none; padding: 0.4375rem 1.25rem; border-radius: 0.4rem;">$activator</button>
      </div>

       </tr> 
        
    <tr>
    <p style="color: black; margin-bottom: 32px !important;">💃 That's it! We can't wait to see you 🤭</p>
    </tr>

    DELIMITER;

    $to = $email;
	$from = "info@booksinvogue.com.ng";

    $headers = "From: Booksinvogue ". $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
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

$send = mail($to, $subject, $body, $headers);

echo $body;

?>