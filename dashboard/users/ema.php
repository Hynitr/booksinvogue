<?php
    $activator = '5439';
    $email = 'greatnessabolade@gmail.com';
    $subj = 'Activate Your Account';
    $msg = <<<DELIMITER

    <p class="mt-4 text-dark fw-bold">🥳 Welcome to the Books In Vogue Tribe </p>
    <p class="mt-2 text-dark">Hi there,</p>
    <p class="mt-2 text-dark">We are super excited to have you on Books In Vogue</p>
    <p class="mt-2 text-dark">Books In Vogue is a platform developed to help you read amazing books, upload your own book(s) or publish books for other authors.</p>
    <p class="mt-2 text-dark">We will continue to enhance the experience of our interfaces to ensure that you enjoy a seamless reading experience.</p>
    <p class="mt-2 text-dark">Got any issues, complaint or request? Kindly chat with us on our <a target="_blank" href="https://booksinvogue.com.ng/contact">live chat support panel</a></p>
    <p class="mt-2 text-dark">Do have a wonderful book experience</a></p>
    <p class="mt-4 mb-4 text-dark">⚡ Best Regards</p>
    DELIMITER;

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

	$logo = 'https://booksinvogue.com.ng/assests/logo.png';
	$url = 'https://booksinvogue.com.ng/';

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
        <p class="text-mute mb-0">Best Regards from Team Book In Vogue </p>
        <p class="text-mute">Developed with 💖 by: <a
                href="https://www.google.com/search?client=opera&q=abolade+greatness&sourceid=opera&ie=UTF-8&oe=UTF-8"
                target="_blank">Abolade Greatness</a></p>

    </div>



</body>
<script src="assets/vendor/libs/jquery/jquery.js"></script>
<script src="assets/vendor/libs/popper/popper.js"></script>
<script src="assets/vendor/js/bootstrap.js"></script>

</html>


DELIMITER;

//$send = mail($to, $subject, $body, $headers);

echo $body;

?>