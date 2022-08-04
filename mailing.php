 <?php   // with database

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'mail/vendor/autoload.php';

include 'inc/db.php';
date_default_timezone_set("Asia/Calcutta");
$t_date = date("Y-m-d");

// $m_date = date('Y-m-d', strtotime($t_date. ' + 10 days'));   //max date

 	session_start();
	$con=mysqli_connect("localhost","jeegafdu_smhrius","Qh37.C~irCIN","jeegafdu_smhri") or die("Unable to connect");
	

	if (isset($_POST['submit'])) 
	{ 
		$name=$_POST['name'];
		$email=$_POST['email'];
		$date=$_POST['date'];
		$message=$_POST['message'];

		$query="INSERT INTO appoinment (name,email,datepicker,message)VALUES('".$name."','".$email."','".$date."','".$message."')";

		$query=mysqli_query($con,$query);

		//mailing
		$mail = new PHPMailer(true);

		try {
		    //Server settings
		    $mail->SMTPDebug  = 0;               // 0 for none.1 for...2 for showing server and client discription
		    $mail->isSMTP();
		    $mail->SMTPAuth   = true;
			$mail->SMTPSecure = "tls";
			$mail->Host       = "mail.smhri.com";      // host name from cpanel
			$mail->Port       = 587;                   //468 and 587    

		    $mail->Username   = 'no-reply@smhri.com';                     // SMTP username from cpannel and password
		    $mail->Password   = 'no-reply';                               //create new mail acc in cpannel 

		    //Recipients
		    $mail->setFrom('no-reply@smhri.com', 'Mailer');
		    $mail->addAddress('bhavika.sharma@anantsoftcomputing.com', 'SMHRI');     // Add a recipient

		  
		    // Content
		    $mail->isHTML(true);                                                     // Set email format to HTML
		    $mail->Subject = 'Appointment Request Of '.$_POST['name'];
		    $mail->Body    = 'Hello,<br><br>'.$_POST['name'].' requested for Appoinment.<br>Here,The Details are mentioned bellow<br><br><b>Name:</b>'.$_POST['name'].'<br><b>Date:</b>'.$_POST['date'].'<br><b>Message:</b>'.$_POST['message'];

		    $mail->AltBody = 'Dear Doctor patient details are name:'.$_POST['name'].'Email:'.$_POST['email'].'Date:'.$_POST['datepicker'].'Message:'.$_POST['message'];

		    if($mail->send()){
			    echo 'Message has been sent';
			}else{
				echo 'Message has not been sent';
			}
		} catch (Exception $e) {
		    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

	}
?>

	
  <link rel="stylesheet" href="style.css">


<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">

		<!-- Service Section -->
		<div id="service-section" class="container-fluid no-padding service-section">
			<!-- Container -->
			<div class="container">
				<!-- Row -->
				<div class="row">
					<!-- Service -->			
					<div class="col-md-4 col-sm-12 col-xs-12">
						<!-- Appointment Form -->
						<form class="appoinment-form" method="POST" action="">
							<h3><img src="<?=$base_url?>images/appoinment.png" alt="appoinment"/>Appointment form</h3>
							
							<div class="form-group col-md-12 no-padding">							
								<input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required="" value="">
								<label id="name1"></label>
							</div>					
							<div class="form-group col-md-12 no-padding">							
								<input type="text" id="email" class="form-control" name="email" placeholder="Email Address" required="" value="">
								<label id="email1"></label>
							</div>
							<div class="form-group input-group col-md-12 no-padding">
								<div class="col-md-8 col-sm-8 col-xs-8 no-left-padding">
									<input type="date" name="date" id="date" class="form-control" min="<?=$t_date;?>" value="<?=$t_date;?>"  placeholder="Select date" required="">
									<label id="date1"></label>
								</div>
							</div>
							
							<div class="form-group col-md-12 col-sm-12 col-xs-12 no-padding">							
								<textarea rows="4" id="message" name="message" class="form-control" placeholder="Your Message..." required="" value=""></textarea>
								<label id="message1"></label>
							</div>
							<div class="form-group col-md-12 col-sm-12 col-xs-12 no-padding">
								<button type="submit" name="submit" value="submit" id="submit" onclick="return validation();" class="btn-submit pull-right" ><img src="<?=$base_url?>images/heart-sm.png" alt="heart-sm">Submit</button>
							</div>
						</form><!-- Appointment Form /- -->
					</div>
				</div>
			</div><!-- Container /- -->
		</div><!-- Service Section /- -->
	
	</div><!-- Main Container -->
