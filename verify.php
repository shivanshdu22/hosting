<?php
    session_start();
			include "dbc.php";
			include "userclass.php";
			
  			include "productclass.php";
  			
  			$product= new Product(); 
	
	
  
			require_once('PHPMailer/PHPMailerAutoload.php');
			$error= array();
			$msg="";
            $user= new User();
            $ud=$user->userdetails($_SESSION['userdata']['username']);    
            $error= array();
            $msg="";
            if(isset($_POST['OTPnumber'])){
                    $_SESSION['mobile']=$_POST['number'];
                    $number= $_POST['number'];
                   
                    $otp = rand(100000, 999999);
                    $_SESSION['session_otp'] = $otp;
                    $message = rawurlencode("Your One Time Password is ".$otp);
                    $fields = array(
                        "sender_id" => "FSTSMS",
                        "message" => ".$message.",
                        "language" => "english",
                        "route" => "p",
                        "numbers" => "$number",
                        "flash" => "1"
                    );
        
                    $curl = curl_init();
        
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode($fields),
                    CURLOPT_HTTPHEADER => array(
                        "authorization: FQX6EumkalqYcx9KBI5pGjhenswDo1i8WTbHRJMCS47tPZOv3zoQHgJ3jRhVcW7TDFZG1np0trEImfza",
                        "accept: */*",
                        "cache-control: no-cache",
                        "content-type: application/json"
                    ),
                    ));
        
                    $response = curl_exec($curl);
                    $err = curl_error($curl);
        
                    curl_close($curl);
        
                    if ($err) {
						echo "<script type='text/javascript'>alert(".$err.");</script>";
                    } else {
						echo "<script type='text/javascript'>alert('OTP sent on your mobile number');</script>";
                    } 
                
			}
            if(isset($_POST['verifynumber'])){
                $number= $_POST['otp'];
                if($_SESSION['session_otp']==$number){
					$_POST['success']=1;
                }
                else{
                    echo "<script type='text/javascript'>alert('OTP Dosen't Match');</script>";
                    unset( $_SESSION['mobile']);
                }
			}
			if(isset($_POST['sendmail'])){
				$_SESSION['email']=$_POST['email'];
                $email= $_POST['email'];
                $otp = rand(100000, 999999);
                $_SESSION['email_otp'] = $otp;
				$mail = new PHPMailer(); 
				$mail->isSMTP();
				$mail->Host     = 'smtp.gmail.com';
				$mail->SMTPSecure = 'tls';
				$mail->Port     = 587;
				$mail->SMTPAuth = true;

				$mail->Username = 'dshivansh41@gmail.com';
				$mail->Password = '123*456*789';



				$mail->setFrom('dshivansh41@gmail.com', 'CED HOSTING');

				// Add a recipient
				$mail->addAddress($_POST['email']);
				
				// Add cc or bcc 
				//$mail->addCC('cc@example.com');
				//$mail->addBCC('bcc@example.com');

				// Email subject
				$mail->Subject = 'Ced-Hosting Confiramtion Mail';

				// Set email format to HTML
				$mail->isHTML(true);

				// Email body content
				$mailContent = "
					<center><h2>OTP to verify your mail </h2>
					<p><h1>".$otp."</h1></p></center>";
				$mail->Body = $mailContent;

				// Send email
				if(!$mail->send()){
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
				}else{
					echo "<script type='text/javascript'>alert('OTP sent on Mail');</script>";
				}
		}       
		if(isset($_POST['verifymail'])){
			$number= $_POST['otpmail'];
			if($_SESSION['email_otp']==$number){
				$_POST['successmail']=1;
			}
			else{
				echo "<script type='text/javascript'>alert('OTP Dosen't Match');</script>";
				unset( $_SESSION['mobile']);
			}
		}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<!---fonts-->
		<link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		<!---fonts-->
		<!--script-->
		<link rel="stylesheet" href="css/swipebox.css">
					<script src="js/jquery.swipebox.min.js"></script> 
						<script type="text/javascript">
							jQuery(function($) {
								$(".swipebox").swipebox();
							});
							$(document).ready(function(){
								$("#mobtick").hide();
								<?php if(isset($_POST['success'])) {?>
                    					$("#mobtick").show();
								<?php } ?>	
								$("#mailtick").hide();
								<?php if(isset($_POST['successmail'])) {?>
                    					$("#mailtick").show();
            					<?php } ?>		
							});
						</script>
		<!--script-->
	</head>
	<body>
		<?php include 'header.php'; ?>
			<!---login--->
				<div class="content">
					<div class="main-1">
						<div class="container">
						
							<div class="login-page">
                                <div class="col-md-12  text-center login-right mb-5">
                                    <h3>Step 2: Please Verify one </h3>
                                </div>    
                              
								<div class="account_grid">
									<div class="col-md-4 text-center login-right">
										<h3>Verify Email</h3>
										<p></p>
										<form action="verify.php" method="POST">
										<div>
											<span>Email Address<label>*</label></span>
											<input type="email" <?php if(isset($ud)) { echo "value='".$ud['email']."' "; } ?> name="email"> 
										</div>
										<input type="submit" name="sendmail" value="SEND OTP">
										</form>
										<?php if(isset($_POST['sendmail'])){?>
											<form action="verify.php" method="POST">
											<div>
												<span>OTP<label>*</label></span>
												<input type="number" name="otpmail"> 
											</div>
											<input type="submit" name="verifymail" value="VERIFY">
											</form>
										<?php } ?>
										<svg class="checkmark" id="mailtick" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
											<circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
											<path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
										</svg>
									</div>	
                                    <div class="col-md-4 text-center login-right">
                                        <h3>OR </h3>
                                    </div>
                                    <div class="col-md-4 text-center login-right">
										<h3>Mobile Verification</h3>
										<p></p>
										<form action="verify.php" method="POST">
										<div>
											<span>Mobile Number<label>*</label></span>
											<input type="Number" <?php if(isset($ud)) { echo "value='".$ud['mobile']."' "; } ?> name="number"> 
										</div>
										<input type="submit" name="OTPnumber" value="SEND OTP">
										</form>
										<?php if(isset($_POST['OTPnumber'])){?>
											<form action="verify.php" method="POST">
											<div>
												<span>OTP<label>*</label></span>
												<input type="Number" name="otp"> 
											</div>
											<input type="submit" name="verifynumber" value="VERIFY">
											</form>
										<?php } ?>
										<svg class="checkmark" id="mobtick" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
											<circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
											<path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
										</svg>
									</div>	
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
					</div>
				</div>
		<!-- login -->
		<!---footer--->
					<div class="facebook-section">
						<div class="container">
						<div class="face-top">
							<h5><img src="images/facebook.png"><span>I can’t believe my grand mothers making me take Out the garbage I’m rich fuck this I’m going home I don’t need this shit</span><h5>
						</div>
						</div>
					</div>
					<div class="footer-section">
						<div class="container">
							<div class="footer-grids">
								<div class="col-md-3 footer-grid">
									<h4>flickr widget</h4>
									<div class="footer-top">
										<div class="col-md-4 foot-top">
											<img src="images/f1.jpg" class="img-responsive" alt=""/>
										</div>
										<div class="col-md-4 foot-top">
										<img src="images/f2.jpg" class="img-responsive" alt=""/>
										</div>
										<div class="col-md-4 foot-top">
										<img src="images/f3.jpg" class="img-responsive" alt=""/>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="footer-top second">
										<div class="col-md-4 foot-top">
										<img src="images/f4.jpg" class="img-responsive" alt=""/>
										</div>
										<div class="col-md-4 foot-top">
										<img src="images/f1.jpg" class="img-responsive" alt=""/>
										</div>
										<div class="col-md-4 foot-top">
										<img src="images/f2.jpg" class="img-responsive" alt=""/>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="col-md-3 footer-grid">
									<h4>tag cloud</h4>
									<ul>
									<li><a href="#">Premium</a></li>
									<li><a href="#">Graphic</a></li>
									<li><a href="#">1170px</a></li>
									<li><a href="#">Photoshop Freebie</a></li>
									<li><a href="#">Designer</a></li>
									<li><a href="#">Themes</a></li>
									<li><a href="#">thislooksgreat chris</a></li>
									<li><a href="#">Lovely Area</a></li>
									<li><a href="#">You might use it...</a></li>
									</ul>
								</div>
								<div class="col-md-3 footer-grid">
								<h4>recent posts</h4>
									<div class="recent-grids">
										<div class="col-md-4 recent-great">
											<img src="images/f4.jpg" class="img-responsive" alt=""/>
										</div>
										<div class="col-md-8 recent-great1">
											<a href="#">This is my lovely headline title for this footer section.</a>
											<span>22 October 2014</span>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="recent-grids">
										<div class="col-md-4 recent-great">
											<img src="images/f1.jpg" class="img-responsive" alt=""/>
										</div>
										<div class="col-md-8 recent-great1">
											<a href="#">This is my lovely headline title for this footer section.</a>
											<span>22 October 2014</span>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="recent-grids">
										<div class="col-md-4 recent-great">
											<img src="images/f3.jpg" class="img-responsive" alt=""/>
										</div>
										<div class="col-md-8 recent-great1">
											<a href="#">This is my lovely headline title for this footer section.</a>
											<span>22 October 2014</span>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="col-md-3 footer-grid">
									<h4>get in touch</h4>
									<p>8901 Marmora Road</p>
									<p>Glasgow, DO4 89GR.</p>
									<p>Telephone : +1 234 567 890</p>
									<p>Telephone : +1 234 567 890</p>
									<p>FAX : + 1 234 567 890</p>
									<p>E-mail : <a href="mailto:example@mail.com"> example@mail.com</a></p>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="copy-section">
								<p>&copy; 2016 Planet Hosting. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
							</div>
						</div>
					</div>
		<!---footer--->
	</body>
</html>
