<?php 
  session_start();
  
  include "../dbc.php";
  include "../userclass.php";
  include "../productclass.php";
  $user= new User();
  $product= new Product();
  $ud=$user->userdetails($_SESSION['userdata']['username']); 
  if(isset($_POST['submit'])){
    $category=isset($_POST['subcategory'])?$_POST['subcategory']:'';
    $link=isset($_POST['link'])?$_POST['link']:'';
    $msg=$product->addcategory($category,$link);
    unset($_POST);
    echo "<script type='text/javascript'>alert('".$msg."');</script>";
  }
  if(isset($_POST['update'])){
    $id=isset($_POST['id'])?$_POST['id']:'';
    $category=isset($_POST['subcategory'])?$_POST['subcategory']:'';
    $link=isset($_POST['link'])?$_POST['link']:'';
    $avail=isset($_POST['available'])?$_POST['available']:'';
    $msg=$product->updatecategory($id,$category,$link,$avail);
    unset($_POST);
    echo "<script type='text/javascript'>alert('".$msg."');</script>";
  }
  $cd=$product->productdetails(1);
  $nd=$product->categorydetails(1);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
</head>

<body>
  <!-- Sidenav -->
  <?php require_once("sidebar.php"); ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-2.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-3.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>5 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-4.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-5.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- View all -->
                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                <div class="row shortcuts px-4">
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                    <small>Calendar</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                    <small>Email</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                    <small>Payments</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                    <small>Reports</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                    <small>Maps</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                    <small>Shop</small>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                   <i class="ni ni-circle-08 text-danger"></i>
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $ud['name']; ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                </ol>
              </nav>
            </div>
            
          </div>
          <!-- Card stats -->
          <div class="row">
           
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row mt-5">
        <div class="col mt-5">
           <h1 class="center-text text-blue">View Product</h1>
           <form class="form" id="form" action="viewproduct.php" method="POST">
                <div class="form-group">
                    <label for="category" class="form-control-label text-blue">Select Product Category</label>
                    <select id="question" class="form-control" name="category" required>
                            <option class="place" value="" disabled selected>Select Category</option>
                            <?php foreach ($nd as $key=>$cdd){ if($cdd['prod_parent_id']==1){?>
                            <option class="place" value="<?php echo $cdd['id']; ?>"><?php echo $cdd['prod_name']; ?></option>
                            <?php } } ?>
                    </select> 
                </div>
                <div class="form-group">
                    <label for="subcategory" class="form-control-label text-blue">Enter Product Name *</label>
                    <input class="form-control" name="name" type="text" placeholder="Sub-Category" id="subcategory">
                </div>
                <div class="form-group">
                    <label for="example-url-input" class="form-control-label text-blue">URL</label>
                    <input class="form-control" type="text" name="url" value="" id="link">
                </div>
                <div class="border-top my-3"></div>
                <p class="h2 text-blue">Product Description</p>
                <p class="text-blue">Enter Product Description Below</p>
                <div class="form-group">
                 <label for="example-number-input" class="form-control-label text-blue">Enter Monthly Plan</label>
                 <input class="form-control" type="number" name="monprice" value="" id="mon">
                 <small id="emailHelp" class="form-text text-muted">This would be Monthly Plan</small>
                </div>
                <div class="form-group">
                    <label for="example-number-input" class="form-control-label text-blue">Enter Annual Price</label>
                    <input class="form-control" type="number" name="yearprice" value="" id="annual">
                    <small id="emailHelp" class="form-text text-muted">This would be Annual Price</small>

                </div>
                <div class="form-group">
                    <label for="example-number-input" class="form-control-label text-blue">SKU</label>
                    <input class="form-control" type="number" name="sku" value="" id="sku">
                </div>
                <div class="border-top my-3 text-blue"></div>
                <p class="h2 text-blue">Features</p>
                <div class="form-group">
                 <label for="example-number-input" class="form-control-label text-blue">Web Space (in GB)</label>
                 <input class="form-control" type="number" name="webspace" value="" id="web">
                 <small id="emailHelp" class="form-text text-muted">Enter 0.5 for 512 MB</small>

                </div>
                <div class="form-group">
                    <label for="example-number-input" class="form-control-label text-blue">Bandwidth (in GB)</label>
                    <input class="form-control" type="number" name="Bandwidth" value="" id="band">
                    <small id="emailHelp" class="form-text text-muted">Enter 0.5 for 512 MB</small>

                </div>
                <div class="form-group">
                    <label for="example-number-input" class="form-control-label text-blue">Free Domain</label>
                    <input class="form-control" type="text" name="domain" value="" id="domain">
                    <small id="emailHelp" class="form-text text-muted">Enter 0 if no domain available in this service</small>

                </div>
                <div class="form-group">
                    <label for="example-number-input" class="form-control-label text-blue">Language/Technology Support</label>
                    <input class="form-control" type="text" name="stack" value="" id="stack">
                    <small id="emailHelp" class="form-text text-muted">Separate by (,) Ex: PHP, MySQL, MongoDB</small>

                </div>
                <div class="form-group">
                    <label for="example-number-input" class="form-control-label text-blue">Mail Box</label>
                    <input class="form-control" type="text" name="Mail" value="" id="mail">
                    <small id="emailHelp" class="form-text text-muted">Enter Number of mailbox will be provided, enter 0 if none</small>

                </div>
                <div id="available" class="form-group text-blue">
                      <label for="exampleFormControlSelect1">Available</label>
                      <select class="form-control" name="available" id="available">
                        <option value="1">Available</option>
                        <option value="2">Unavailable</option>
                      </select>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update Product</button>
            </form>

        </div>
      </div>
      <div class="row mt-5">
        <div class="col table-responsive">
            <h1 class="text-blue">Category Table</h1>
            <table id="categorytable" class="table table-borderless table-hover">
                <thead class="blue h3">
                    <th>ID</th>
                    <th>Parent Category</th>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Availablity</th>
                    <th>Date of Launch</th>
                    <th>Webspace</th>
                    <th>Bandwidth</th>
                    <th>Domain</th>
                    <th>Technology</th>
                    <th>Mail</th>
                    <th>Monthly Price</th>
                    <th>Yearly Price</th>
                    <th>SKU</th>
                    <th>Option</th>
                </thead>
                <tbody>
                <?php
                        foreach($cd as $key=> $udd) {?>
						<tr>
							<td><id><?php echo $udd['id'];?></id></td>
                            <td><parent><?php foreach($nd as $k=>$m){if($m['id']==$udd['prod_parent_id']){echo $m['prod_name'];}}?></parent></td>
                            <td><name><?php echo $udd['prod_name'];?></name></td>
                            <td><lik><?php echo $udd['link'];?></lik></td>
                            <td><avail><?php if($udd['prod_available']==1){echo "Available";} else{echo "Unavailable";}?></avail></td>
                            <td><?php echo $udd['prod_launch_date'];?></td>   
                            <?php $u=0; $arr = (array) json_decode($udd['description'],true); 
                                    foreach($arr as $k=> $ndd){ ?>
                            <td><lik<?php  $u++; echo $u; ?> ><?php print_r($ndd);?></lik<?php echo $u;?> > </td> 
                            <?php } ?>      
                            <td><mon><?php echo $udd['mon_price'];?></mon></td>
                            <td><annual><?php echo $udd['annual_price'];?></annual></td>
                            <td><sku><?php echo $udd['sku'];?></sku></td>
                            <td>
								<!-- Icons -->
								<a href="#" data-id="<?php echo $udd['id'];?>" class="edit btn btn-info"  title="Edit">Edit</a>
								<a href="#" data-id="<?php echo $udd['id'];?>" class="delete btn btn-danger"  title="Delete">Delete</a> 
							</td>                       
						</tr>
				<?php }?>
                </tbody>
            </table>
        </div>
      </div>
      <!-- Footer -->
      <?php require_once("footer.php"); ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
        $('.form').hide();
        $(document).ready(function(){
            $('#categorytable').DataTable({});  
           
            $('.delete').click(function(){
                    if(confirm("Are you sure you want to delete this?")){ 
                        var id =$(this).attr('data-id');
                        var action="deletecategory";
                        $.ajax({
                            url:'ajax.php',
                            type:'POST',
                            data:{ id:id , action:action},
                            success: function(result){
                                alert("Action Done")
                                location.reload();
                                
                            },
                            error:function(){
                                alert ('error');
                            }
                        });
                    }
                    else{
                        return false;
                    }   
            });	
            $('#update').hide();
            
            $(".edit").click(function(){
                  if(confirm("Are you sure you want to edit this?")){ 
                    $('.form').show();
                    $(this).closest('tr').remove();
                    var hash="#";
                    var currentRow = $(this).closest('tr');
                    var id = currentRow.find('id').text();
				          	var parent = currentRow.find('parent').text();
                    var name =currentRow.find('name').text();
                    var link =currentRow.find('lik').text();
                    var web =currentRow.find('lik1').text();
                    var band =currentRow.find('lik2').text();
                    var domain =currentRow.find('lik3').text();
                    var lang =currentRow.find('lik4').text();
                    var mail =currentRow.find('lik5').text();
                    var mon =currentRow.find('mon').text(); 
                    var annual =currentRow.find('annual').text(); 
                    var sku =currentRow.find('sku').text(); 
                    var av =currentRow.find('avail').text(); 
                    console.log(name);
                    $('#id').val(id); 
                    $('#subcategory').val(name);
                    $('#link').val(link);
                    $('#web').val(web);
                    $('#band').val(band);
                    $('#domain').val(domain);
                    $('#mail').val(mail);
                    $('#mon').val(mon);
                    $('#annual').val(annual);
                    $('#sku').val(sku);
                    $('#stack').val(lang);
                    $('#add').hide();
                    $('#update').show();
                    $('html, body').animate({
                        'scrollTop' : $(".form").position().top
                    });
                  }
                  else{
                    return false;
                  }
                });
         });
    </script>
</html>
