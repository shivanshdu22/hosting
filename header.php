	<!---header--->
	<?php $cd=$product->categorydetails(1); ?>
    <div class="header pb-5">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<i class="sr-only">Toggle navigation</i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
							</button>				  
							<div class="navbar-brand mb-3 pb-4">
								<img class="navbar-brand" style="margin-bottom:20px; " src='images/logo.gif' height="200vh" width="150vw">
							</div>
						</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse mt-5" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li <?php if($_SERVER['REQUEST_URI']=='hosting/index.php') { echo ("class='active'");} ?>><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="services.php">Services</a></li>
								<li class="dropdown">
									<a href="services.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
									<ul class="dropdown-menu">
									<?php foreach($cd as $key=>$cdd){ ?>
										
										<li><a href="<?php echo "catpage.php?id=".$cdd['id'].""; ?>"data-id=<?php echo$cdd['id'];?> class="category"><?php echo $cdd['prod_name'];?></a></li>
									<?php } ?>			
									</ul>
										
								</li>
								<li><a href="pricing.php">Pricing</a></li>
								<li><a href="blog.php">Blog</a></li>
								<li><a href="contact.php">Contact</a></li>
								<li><a href="cart.php"><span class="fa-stack has-badge" data-count="<?php if(isset($_SESSION['cart'])){
                                    $u=0;
                                    foreach ($_SESSION['cart'] as $k1 =>$cartd) {
                                        $u++;
                                    }
                                    echo $u;
								}
								else{ echo 0; }?>">
															<i class="fa fa-circle fa-stack-2x fa-inverse"></i>
  															<i style="" class="fa fa-shopping-cart fa-stack-2x red-cart"></i>
														</span></a></li>
								<?php if(isset($_SESSION['userdata'])){ ?>
								<li><a href="signout.php">Logout</a></li>
								<?php } else {?>
								<li><a href="login.php">Login</a></li>
								<?php } ?>
							</ul>
									  
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
	<!---header--->
	