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
        $body .= "<img style='margin-top: 35px; width: 460px; height: 105px;' src='{$logo}' alt='Booksinvogue'>";
        $body .= "<h1 style='margin-top: 45px; color: #fff'>Activate your account</h1>
        <br />";
        $body .= "<h3 style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 27px;'>Kindly use the
            code below to activate your account</h3>
        <br />";
        $body .= "<h1 style='margin-left: 45px; font-size: 90px; text-align: center;'><b>4578</b></h1>
        <br />";
        $body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Do not bother replying this
            email. This is a virtual email</p>";
        $body .= "<script src='https://avearns.com/assets/js/bootstrap.min.js'></script>";
        $body .= "
    </section>";
    $body .= "</body>

</html>";
$send = mail($to, $subject, $body, $headers);