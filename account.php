<?php
	session_start();
        include "dbc.php";
		include "userclass.php";
  		include "productclass.php";
  		$product= new Product(); 
	

  
        $error= array();
        $msg="";
        if(isset($_POST["submit"])){
			$firstname=isset($_POST['firstname'])?$_POST['firstname']:'';
			$lastname=isset($_POST['lastname'])?$_POST['lastname']:'';
            $email=isset($_POST['email'])?$_POST['email']:'';
            $mobile=isset($_POST['mobile'])?$_POST['mobile']:'';
            $pass=isset($_POST['password'])?$_POST['password']:'';
			$pass2=isset($_POST['repassword'])?$_POST['repassword']:'';
			$question=isset($_POST['question'])?$_POST['question']:'';
            $ans=isset($_POST['answer'])?$_POST['answer']:'';
			$name= "".$firstname." ".$lastname."";

            if($pass!=$pass2){
				$msg='Password does not match';
				echo "<script type='text/javascript'>alert(".$msg.");</script>";
            }
            else{
                $user= new User();
                $msg=$user->register($email,$name,$mobile,$pass,$question,$ans);
				echo("<script>alert('.$msg.')</script>");
                unset($_POST["submit"]);
          
                if($msg!="User Name Already Present"){
                    $_POST['success']=1;
                }
            }
		}    

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Account :: w3layouts</title>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script type="text/javascript">
			
			jQuery(function($) {
				$(".swipebox").swipebox();
			});
			$(document).ready(function(){
				$(".error").text("Please fill this field");
				
				$("#firstname").on("blur paste", function() {
					var first = document.getElementById("firstname").value;	
					first = first.replace(/ {2,}/g,' ');
					document.getElementById("firstname").value= first;
					if(/\s/.test(first) != false) {
						first=first.trim();
						document.getElementById("firstname").value= first;
						}	
					});	
				$("#lastname").on("blur paste", function() {
					var last = document.getElementById("lastname").value;	
					last = last.replace(/ {2,}/g,' ');
					document.getElementById("lastname").value= last;
					if(/\s/.test(last) != false) {
						last=last.trim();
						document.getElementById("firstname").value= last;
						}	
				});			
				$("#answer").on("blur paste", function() {
					var last = document.getElementById("answer").value;	
					last = last.replace(/ {2,}/g,' ');
					document.getElementById("answer").value= last;
					if(/\s/.test(last) != false) {
						last=last.trim();
						document.getElementById("answer").value= last;
						}	
				});			
				$("#email").on("keyup blur paste", function() {
					var email = document.getElementById("email").value;	
					email = email.replace(/ {1,}/g,'');
					email = email.replace(/\.{2,}/g,'\.');
					document.getElementById("email").value= email;
				});	
				$("#password").on("keyup blur paste", function() {
					var email = document.getElementById("password").value;	
					email = email.replace(/ {1,}/g,'');
					document.getElementById("password").value= email;
				});	
				$("#repassword").on("keyup blur paste", function() {
					var email = document.getElementById("repassword").value;	
					email = email.replace(/ {1,}/g,'');
					document.getElementById("repassword").value= email;
				});	
				$("#mobile").on("keyup  paste", function() {
					var mobile = document.getElementById("mobile").value;	
					mobile = mobile.replace(/ {1,}/g,'');
					var y=0;
					var in1 = mobile.charAt(0);
					var len = mobile.length;
					var in2=mobile.charAt(1);
					console.log(in1, in2);
					if(len>10 && in1!="0"){
						alert("Invaild Number");
						document.getElementById("mobile").value="";
					}
					else if(in1=="0" && in2=="0"){
						alert("Invaild Number");
						document.getElementById("mobile").value="";
					}
					else if(len==11){
						for(i=1;i<11;i++){
							var ch = mobile.charAt(i);
							if(i!=10){
								var chn = mobile.charAt(i+1);
							}
							if(ch==chn){
								y++;
							}
						}
						if(y==10){
						alert("All numbers cannot be similar");
						document.getElementById("mobile").value="";
						}
					}
					else if(len==10){
						for(i=0;i<10;i++){
							var ch = mobile.charAt(i);
							if(i!=9){
								var chn = mobile.charAt(i+1);
								if(ch==chn){
								y++;
							}
							}
							
						}
						if(y==9){
						alert("All numbers cannot be similar");
						document.getElementById("mobile").value="";
						}
					}
					
				});		
						
			});	
		</script>
		<!--script-->
	</head>
	<body>
		<?php include 'header.php'; ?>
			<!---login--->
				<div class="content">
					<!-- registration -->
		<div class="main-1">
			<div class="container">
				<div class="register">
				 	
				<div class="register-but">
				<form action="account.php" method="POST"> 
					<div class="register-top-grid">
						<h3>Personal Information</h3>
						<p>(* means Required)</p>
						<div>
							<span>First Name<label>*</label></span>
							<input type="text" id="firstname" name="firstname" pattern="[a-zA-Z][a-zA-Z ]{1,}"required> 
							<p class="error"></p>
						</div>
						<div>
							<span>Last Name<label>*</label></span>
							<input type="text" id="lastname" name="lastname" pattern="[a-zA-Z][a-zA-Z ]{1,}"required> 
							<p class="error"></p>
						</div>
						<div>
							<span>Email Address<label class="light-blue-text">*</label></span>
							<input type="text" id="email" name="email" pattern="[a-z0-9.]+@[a-z0-9.-]+\.[a-z]{2,4}$"required> 
							<p class="error"></p>
						</div>
						<div> 
							<span>Mobile<label>*</label></span>
							<input type="text" id="mobile" name="mobile" pattern="[0-9]{10,11}" required> 
							<p class="error"></p>
						</div>
						
						<div class="clearfix"> </div>
						<a class="news-letter" href="#">
							<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
						</a>
						</div>
						<div class="register-bottom-grid">
								<h3>Password Information</h3>
								<div>
									<span>Password<label>*</label></span>
									<input type="password" id="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$" required>
									<p class="error"></p>
								</div>
								<div>
									<span>Confirm Password<label>*</label></span>
									<input type="password" id="repassword" name="repassword" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$" required>
									<p class="error"></p>
								</div>
						</div>
						<div class="register-bottom-grid register-top-grid">
								<h3>Security information</h3>
								<div>
									<span>Security Question<label>*</label></span>
									<select id="question"  name="question" required>
                                                <option value="What was your childhood nickname?">What was your childhood nickname?</option>
                                                <option value="What is the name of your favourite childhood friend?">What is the name of your favourite childhood friend?</option>
                                                <option value="What was your favourite place to visit as a child?">What was your favourite place to visit as a child?</option>
												<option value="What was your dream job as a child?">What was your dream job as a child?</option>
												<option value="What is your favourite teacher's nickname?">What is your favourite teacher's nickname?</option>
                                    </select>
								</div>
								<div>
									<span>Answer<label>*</label></span>
									<input type="text" name="answer" id="answer" required> 
									<p class="error"></p>
								</div>
						</div>
						<input class="aqua-gradient" type="submit" name="submit" value="submit">
						
						<div class="clearfix"> </div>
					</form>
					</div>
			</div>
			</div>
		</div>
		<!-- registration -->

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