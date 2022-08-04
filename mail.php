<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['submit']))
{
    $to = "bhavika1274@gmail.com";
    $from = $_POST['email'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message_us'];
    $header =  "From : $from";
    
    $header = "From:(".$name.")Safe First Security <bhavika1274@gmail.com>. \r\n";
    //$header = "From:(".$email.")\r\n";
    $header.= "MIME-Version: 1.0\r\n";
    $header.= "Content-Type: text/html; charset=iso-8859-1\r\n";
    $header.= "X-Priority: 1\r\n";
    $header.= "Return_Path: <bhavika1274@gmail.com>\r\n";
    $header.= 'Reply-To:' .$email. "\r\n" ;
    $header.= 'X-Mailer: PHP/'. phpversion();
    
     $header .= 'Bcc: dalwadiankur01@gmail.com' . "\r\n";
    // $header .= 'Cc: anantsoftcomputing27@gmail.com,workoec01@gmail.com,parth@cline.co.in,no-reply@oecindia.com' . "\r\n";

    $subject = "New Inquiry for Safe First Security";

    //$mailHeader = "Name: ".$name."\r\n Email :".$from."\r\n Phone :".$mobile." \r\n Message:".$message."\r\n"; 
    //  $htmlContent = file_get_contents("enquiry.html");
    $mailHeader = '<!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    body{ margin-top: 100px; padding-top: 0px;
    }
    .row{
        /* background-color: #03a9f4 !important; */margin-top: 10px;padding: 10px;}
        table,th, td {
        padding: 5px;
        text-align: center;
        .heading{text-align: center; font-size: 25px; font-weight: 700px padding-top: 15px; text-transform: uppercase; font-weight: 500px; }}
        .logo{box-shadow: 0px 1px 0px 0px rgb(86 84 84 / 64%)}
    .main{
        margin-top: 20px;
        padding-left: 500px;
        font-size: 15px;
        background-color: white;
        border-color: green;
        border-width: 30px;
    }.copyright{background-color: tomato;color: #fff;}
    </style>
    </head>
    <body>
        <div class="container shadow p-3 mb-5 bg-white rounded border-1">
            <div class="row">
                <div class="logo px-2" style="text-align: center;padding-bottom: 20px;">
                    <div class="col-md-12">
                    <img src="https://www.safefirstsecurity.in/assets/images/logo/logo1.png"  width="450px" align="center">
                    </div>
                </div>
            </div>
            <table align="center">
                <tr>
                <th><h4><b>New Inquiry for Safe First Security</h4></th>
                </tr>
            </table>
            <div class="col-md-12">
            <table align="center">
            <tr>
                <th><b>Name :</th>
                <td>'.$name.'</td>
            </tr>
            <tr>
                <th>Email :</th>
                <td>'.$from.'</td>
            </tr>
            <tr>
            <th>Message :</th>
            <td>'.$message.'</td>
            </tr>
            </table>
            </div>
            <div class="row" style="background: #302364;color: aliceblue;">
            <table align="center">
                <tr><th><b>Copyright 2022 Safe First Security  All rights & Reserved.</th>
                </tr>
            </table>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
    </html>';
        if(mail($to,$subject,$mailHeader,$header))
        {
            echo "Message Successully Sent";
            header("location:thankyou.php");
        }
        else{
            echo "Please Try again.";
        }
}
?>