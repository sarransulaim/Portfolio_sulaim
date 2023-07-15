<?php

function strip_crlf($string)
{
    return str_replace("\r\n", "", $string);
}

if (! empty($_POST["send"])) {
    $name = $_POST["full_name"];
    $email = $_POST["email"];
    $subject = $_POST["mobile_number"];
    $content = $_POST["subject"];

    $toEmail = "rogster@gmail.com";
    // CRLF Injection attack protection
    $name = strip_crlf($name);
    $email = strip_crlf($email);
    if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "The email address is invalid.";
    } else {
        // appending \r\n at the end of mailheaders for end
        $mailHeaders = "From: " . $name . "<" . $email . ">\r\n";
        if (mail($toEmail, $subject, $content, $mailHeaders)) {
            $message = '
            
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
                <!--box icon-->
                <title>MY PORTFOLIO</title>

            
                <link rel="stylesheet" href="css/style.css">
            </head>
            <body>
   

                <!--contact  section-->

                <section class="contact" id="contact">
                    <h2 class="heading">Thank you for Contacting <span>Me!</span> I will get in touch with u as soon as possible</h2>
                    <p>go bake to <a href="index.html">homepage</a></p>
                </section>



            </body>
            </html>

            
            ';
            $type = "success";
        }
    }
}
?>