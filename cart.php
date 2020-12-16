<?php
    session_start();
	include "dbc.php";
	include "userclass.php";
	$user= new User();
  	include "productclass.php";
	$product= new Product();
	$pd=$product->productdetails(1); 
	$x=0;
	if(isset($_REQUEST['rid'])){
        foreach ($_SESSION['cart'] as $k1 =>$cartd) {
            if ($cartd['id']==$_REQUEST['rid']) {
				unset($_SESSION['cart'][$k1]);
				header('Location:cart.php');
            }	
        }
	}
    if (isset($_REQUEST['id'])) {
        foreach ($pd as $key=>$udd) {
            if ($udd['id']==$_REQUEST['id']) {
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $k1 =>$cartd) {
                        if ($cartd['id']==$udd['id']) {
                            $x++;
                        }
                    }
                    if ($x==0) {
						array_push($_SESSION['cart'], $udd);
						header('Location:cart.php');
					}
					else{
						echo "<script type='text/javascript'>alert('Product Already Present');</script>";
					}
				}
				else{
					$_SESSION['cart']= array($udd);
					header('Location:cart.php');
				}
            }
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
						</script>
		<!--script-->
	</head>
	<body>
		<?php include 'header.php'; ?>
			<!---login--->
				<div class="content">
					<div class="main-1">
						<div class="container">
							<p class="h2 text-center mb-5">Cart</p>
							<div class="row">
								<div class="col" id="cart">
									<table class="table table-hover">
										<thead class="border">
										<th>ID</th>
										<th>Name</th>
										<th>Monthly Price</th>
										<th>Yearly Price</th>
										<th>WEBSPACE</th>
										<th>Option</th>
										</thead>
										<tbody>
										<?php if(isset($_SESSION['cart'])) {?>
										<?php foreach ($_SESSION['cart'] as $n=>$ndd) {?>
										<tr>
										<td><?php echo $ndd['id'] ?></td>
										<td><?php echo $ndd['prod_name'] ?></td>
										<td><?php echo $ndd['mon_price'] ?></td>
										<td><?php echo $ndd['annual_price'] ?></td>
										<?php  $arr =  json_decode($ndd['description']); ?>
										<td><?php echo $arr->webspace ?></td>
										<!--Option-->
										<td><a href="cart.php?rid=<?php echo $ndd['id'];?>" data-id="<?php echo $ndd['id'];?>" class="delete btn btn-danger"  title="Delete">Delete</a></td>
										</tr>
										<?php } }?>
										</tbody>
										<td>
									</table>
								</div><!--
								<div class="col-lg-4 bg-dark">
									<p class="h2 text-center">Order Summary</p>
									<p><span class="h4">Sub Total</span></p>		
									<p><span class="h4">Coupoun Discount</span></p>		-->	
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
