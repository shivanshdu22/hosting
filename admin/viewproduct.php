<?php 
  session_start();
  
  include "../dbc.php";
  include "../userclass.php";
  include "../productclass.php";
  $user= new User();
  $product= new Product();
  $ud=$user->userdetails($_SESSION['userdata']['username']); 
  if(isset($_POST['update'])){
    $id=isset($_POST['id'])?$_POST['id']:'';
    $category=isset($_POST['category'])?$_POST['category']:'';
    $name=isset($_POST['name'])?$_POST['name']:'';
    $link=isset($_POST['url'])?$_POST['url']:'';
    $mon=isset($_POST['monprice'])?$_POST['monprice']:'';
    $year=isset($_POST['yearprice'])?$_POST['yearprice']:'';
    $sku=isset($_POST['sku'])?$_POST['sku']:'';
    $webspace=isset($_POST['webspace'])?$_POST['webspace']:'';
    $bandwidth=isset($_POST['Bandwidth'])?$_POST['Bandwidth']:'';
    $stack=isset($_POST['stack'])?$_POST['stack']:'';
    $domain=isset($_POST['domain'])?$_POST['domain']:'';
    $mail=isset($_POST['Mail'])?$_POST['Mail']:'';
    $avail=isset($_POST['available'])?$_POST['available']:'';
    $desc = array("webspace"=>$webspace, "Bandwidth"=>$bandwidth, "Domain"=>"$domain", "Stack"=> $stack ,"Mail"=>"$mail");
    $desc=json_encode($desc);
    $msg=$product->updateproduct($id,$category,$name,$link,$desc,$mon,$year,$sku,$avail);
                                 
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
                    <input class="form-control" name="id" type="text" id="id" hidden>
                </div>
                <div class="form-group">
                    <label for="subcategory" class="form-control-label text-blue">Enter Product Name *</label>
                    <input class="form-control" name="name" type="text" placeholder="Product Name" id="product">
                    <p class="error" id="proer"></p>          
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
                 <input class="form-control" type="number" step="any" min="0" name="monprice" value="" id="monthly">
                 <p class="error" id="moner"></p>  
                 <small id="emailHelp" class="form-text text-muted">This would be Monthly Plan</small>
                </div>
                <div class="form-group">
                    <label for="example-number-input" class="form-control-label text-blue">Enter Annual Price</label>
                    <input class="form-control" type="number" step="any" min="0" name="yearprice" value="" id="annual">
                    <p class="error" id="yearer"></p>  
                    <small id="emailHelp" class="form-text text-muted">This would be Annual Price</small>

                </div>
                <div class="form-group">
                    <label for="example-number-input" class="form-control-label text-blue">SKU</label>
                    <input class="form-control" type="text"  name="sku" value="" id="sku">
                    <p class="error" id="skuer"></p>  
                </div>
                <div class="border-top my-3 text-blue"></div>
                <p class="h2 text-blue">Features</p>
                <div class="form-group">
                 <label for="example-number-input" class="form-control-label text-blue">Web Space (in GB)</label>
                 <input class="form-control" type="number" name="webspace" min="0" step="0.01" value="" id="webspace">
                 <p class="error" id="weber"></p>  
                 <small id="emailHelp" class="form-text text-muted">Enter 0.5 for 512 MB</small>

                </div>
                <div class="form-group">
                    <label for="example-number-input" class="form-control-label text-blue">Bandwidth (in GB)</label>
                    <input class="form-control" type="number" name="Bandwidth" min="0" step="0.01" value="" id="bandwidth">
                    <p class="error" id="bander"></p>  
                    <small id="emailHelp" class="form-text text-muted">Enter 0.5 for 512 MB</small>

                </div>
                <div class="form-group">
                    <label for="example-number-input" class="form-control-label text-blue">Free Domain</label>
                    <input class="form-control" type="text" name="domain" step="any" value="" id="domain">
                    <p class="error" id="domainer"></p>  
                    <small id="emailHelp" class="form-text text-muted">Enter 0 if no domain available in this service</small>

                </div>
                <div class="form-group">
                    <label for="example-number-input" class="form-control-label text-blue">Language/Technology Support</label>
                    <input class="form-control" type="text" name="stack" step="any" value="" id="stack">
                    <p class="error" id="stacker"></p>  
                    <small id="emailHelp" class="form-text text-muted">Separate by (,) Ex: PHP, MySQL, MongoDB</small>

                </div>
                <div class="form-group">
                    <label for="example-number-input" class="form-control-label text-blue">Mail Box</label>
                    <input class="form-control" type="text" name="Mail" value="" id="mail">
                    <p class="error" id="mailer"></p>  
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
                    $('#product').val(name);
                    $('#link').val(link);
                    $('#webspace').val(web);
                    $('#bandwidth').val(band);
                    $('#domain').val(domain);
                    $('#mail').val(mail);
                    $('#monthly').val(mon);
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
         
        
          $(".error").text("Please fill this field");
         
          $('#product').on('keypress', function (event) {
    				var regex = new RegExp("^[a-zA-Z0-9\ -]+$");
    				var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    				if (!regex.test(key)) {
       				event.preventDefault();
       				return false;
    				}
				  });
          $('#monthly').on('keypress', function (event) {
    				var regex = new RegExp("^[0-9.]+$");
    				var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    				if (!regex.test(key)) {
       				event.preventDefault();
       				return false;
    				}
				  });
          $('#annual').on('keypress', function (event) {
    				var regex = new RegExp("^[0-9.]+$");
    				var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    				if (!regex.test(key)) {
       				event.preventDefault();
       				return false;
    				}
				  });
          
          $('#sku').on('keypress', function (event) {
    				var regex = new RegExp("^[A-Za-z0-9#-]+$");
    				var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    				if (!regex.test(key)) {
       				event.preventDefault();
       				return false;
    				}
				  });
          
          $('#webspace').on('keypress', function (event) {
    				var regex = new RegExp("^[0-9.]+$");
    				var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    				if (!regex.test(key)) {
       				event.preventDefault();
       				return false;
    				}
				  });
          $('#bandwidth').on('keypress', function (event) {
            var regex = new RegExp("^[0-9.]+$");
    				var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    				if (!regex.test(key)) {
       				event.preventDefault();
       				return false;
    				}
				  });
          $('#domain').on('keypress', function (event) {
    				var regex = new RegExp("^[A-Za-z0-9]+$");
    				var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    				if (!regex.test(key)) {
       				event.preventDefault();
       				return false;
    				}
				  });
          $('#stack').on('keypress', function (event) {
    				var regex = new RegExp("^[A-Za-z0-9,]+$");
    				var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    				if (!regex.test(key)) {
       				event.preventDefault();
       				return false;
    				}
				  });
          $('#mail').on('keypress', function (event) {
    				var regex = new RegExp("^[A-Za-z0-9]+$");
    				var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    				if (!regex.test(key)) {
       				event.preventDefault();
       				return false;
    				}
				  });
          $('#monthly, #annual, #webspace, #bandwidth').on("blur paste", function() {
            var month = document.getElementById("monthly").value;	
            var annual = document.getElementById("annual").value;	
            var webspace = document.getElementById("webspace").value;	
            var band = document.getElementById("bandwidth").value;	
            var len = month.length;
            var len1 = annual.length;
            var len2 = webspace.length;
            var len3 = band.length;
            if(webspace!=""||band!=""){
              if(len2>5){
                document.getElementById("webspace").value="";
                $("#weber").html("Limit Exceed");
                $("#webspace").css({"border": "1px solid red"}); 
              }
              if(len3>5){
                document.getElementById("bandwidth").value="";
                $("#bander").html("Limit Exceed");
                $("#bandwidth").css({"border": "1px solid red"}); 
              }
              if(len2<=5 && webspace!=""){
                $("#weber").html("");
                $("#webspace").css({"border": "1px solid green"});
                web=1;
              }
              if(len3<=5 && band!=""){
                $("#bander").html("");
                $("#bandwidth").css({"border": "1px solid green"}); 
                band=1;
              }
            }
            else{
              $("#bander").html("Please Fill this Field");
              $("#webspace").css({"border": "1px solid none"});
              $("#bandwidth").css({"border": "1px solid none"});
            }
            if(month!=""||annual!=""){
              if(len>15){
                document.getElementById("monthly").value="";
                $("#moner").html("Limit Exceed");
                $("#monthly").css({"border": "1px solid red"}); 
              }
              else if(len1>15){
                document.getElementById("annual").value="";
                $("#annual").css({"border": "1px solid red"});
                $("#yearer").html("Limit Exceed");
              }
              if(month!=""&&len<=15){
                $("#moner").html("");
                $("#monthly").css({"border": "1px solid green"}); 
                mon=1;
              }
              if(len1<=15 && annual!=""){
                $("#annual").css({"border": "1px solid green"}); 
                $("#yearer").html("");
                annual=1;
              }
            }
            if(month==""){
              $("#moner").html("Please Fill This Field");
              $("#monthly").css({"border": "1px solid red"}); 
            }  
            if(annual==""){
                $("#annual").css({"border": "1px solid red"}); 
                $("#yearer").html("Please Fill This Field");
            }
           
          });
          $("#product").on("blur paste", function(event) {
            var text = document.getElementById("product").value;	
            if(text!=""){
              $("#proer").html("");
              text = text.replace(/\-{2,}/g,'-');
              text = text.replace(/\ {2,}/g,' ');
              document.getElementById("product").value= text;
              var categoryregex = new RegExp("^[a-zA-z][0-9a-zA-Z\-\ ]+[a-zA-z0-9]+$|^[a-zA-z][0-9a-zA-Z\ ]+$");
						  if (categoryregex.test(text)){
								$("#proer").html("");
                text=text.trim();
                document.getElementById("product").value= text;
                $("#proer").html("");
                $("#product").css({"border": "1px solid green"});
                subc=1;
							}
						  else{
								$("#proer").html("Invalid!");
                $("#product").css({"border": "1px solid red"});
                if(/\s/.test(text) != false) {
                  text=text.trim();
                  document.getElementById("product").value= text;
                  $("#proer").html("");
                  $("#product").css({"border": "1px solid green"});
                  subc=1;
                }	
                
					  	}		
            }
            else{
              $("#proer").html("Please fill this field");
              $("#product").css({"border": "1px solid red"});
            }
				  });	
          $("#sku").on("blur paste", function(event) {
            var text = document.getElementById("sku").value;	
            if(text!=""){
              
              var categoryregex = new RegExp("^[0-9a-zA-Z#-]+[a-zA-z0-9]+$");
              if (categoryregex.test(text)){
								$("#skuer").html("");
                $("#sku").css({"border": "1px solid green"});
              }
              else{
                $("#skuer").html("No Special Character in Ending");
                $("#sku").css({"border": "1px solid red"});
              }
            }
            else{
              $("#skuer").html("Please fill this field");
              $("#sku").css({"border": "1px solid red"});
            }
          });
          $("#stack").on("blur paste", function(event) {
            var text = document.getElementById("stack").value;	
            if(text!=""){
              text = text.replace(/\,{2,}/g,',');
              text = text.replace(/ {1,}/g,'');
              document.getElementById("stack").value=text;
              var categoryregex = new RegExp("^[a-zA-Z][a-zA-z0-9\,]+[a-zA-z0-9]+$");
              if (categoryregex.test(text)){
								$("#stacker").html("");
                $("#stack").css({"border": "1px solid green"});
              }
              else{
                $("#stacker").html("No number or Special Character in starting");
                $("#stack").css({"border": "1px solid red"});
              }
            }
            else{
              $("#stacker").html("Please fill this field");
              $("#stack").css({"border": "1px solid red"});
            }
          });
          $("#domain").on("blur paste", function(event) {
            var text = document.getElementById("domain").value;	
           	
            if(text!=""){
              var categoryregex = new RegExp("");
              var categoryregex1 = new RegExp("");
              if (categoryregex.test(text)||categoryregex1.test(text)){
								$("#domainer").html("");
                $("#domain").css({"border": "1px solid green"});
              }
              else{
                $("#domainer").html("No Special Character in Ending");
                $("#domain").css({"border": "1px solid red"});
              }
            }
            else{
              $("#domainer").html("Please fill this field");
              $("#domain").css({"border": "1px solid red"});
            }
          });
            $("#mail").on("blur paste", function(event) {
              var mail = document.getElementById("mail").value;
            if(mail!=""){
              var categoryregex = new RegExp("^[0-9]+$");
              var categoryregex1 = new RegExp("^[a-zA-Z]+$");
              if (categoryregex.test(mail)||categoryregex1.test(mail)){
								$("#mailer").html("");
                $("#mail").css({"border": "1px solid green"});
              }
              else{
                $("#mailer").html("Invalid");
                $("#mail").css({"border": "1px solid red"});
              }
            }
            else{
              $("#mailer").html("Please fill this field");
              $("#mail").css({"border": "1px solid red"});
            }
          });

        
   
    </script>
</html>
