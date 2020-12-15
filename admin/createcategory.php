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
    echo "<script type='text/javascript'>alert('".$msg."');</script>";
  }
  $cd=$product->categorydetails(1);
  
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
           <h1 class="center-text text-blue">ADD CATERGORY</h1>
            <form class="form" action="createcategory.php" method="POST">
                <div class="form-group">
                    <input class="form-control" name="id" type="text" value="" id="id" hidden>
                </div>
                <div class="form-group">
                    <label for="category" class="form-control-label text-white">Category</label>
                    <input class="form-control" name="category" type="text" value="HOSTING" id="category" disabled>
                </div>
                <div class="form-group">
                    <label for="subcategory" class="form-control-label text-blue">Sub-Category</label>
                    <input class="form-control" name="subcategory"  type="text" placeholder="Sub-Category" id="subcategory" required>
                    <p class="error" id="sub"></p>
                </div>
                <div class="form-group">
                    <label for="link" class="form-control-label text-blue">Link</label>
                    <input class="form-control" name="link" type="text" placeholder="Link" id="link" >
                   
                </div>
                <div id="available" class="form-group text-blue">
                      <label for="exampleFormControlSelect1">Available</label>
                      <select class="form-control" name="available" id="available">
                        <option value="1">Available</option>
                        <option value="2">Unavailable</option>
                       
                      </select>
                </div>
                <button type="button" name="submit" id="add" class="btn btn-primary" value="Add Category">Add Category</button>
                <input type="button" name="update" id="update" class="btn btn-primary" value="Update Category">

            </form>

        </div>
      </div>
      <div class="row mt-5">
        <div class="col">
            <h1 class="text-blue">Category Table</h1>
            <table id="categorytable" class="table table-borderless table-hover">
                <thead class="blue h3">
                    <th>ID</th>
                    <th>Parent Category</th>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Availablity</th>
                    <th>Date of Launch</th>
                    <th>Option</th>
                </thead>
                <tbody>
                <?php
                        foreach($cd as $key=> $udd) {?>
						<tr>
							<td><id><?php echo $udd['id'];?></id></td>
                            <td><parent><?php if($udd['prod_parent_id']==1){echo "Hosting";} else{echo "Unknow Category";}?></parent></td>
                            <td><name><?php echo $udd['prod_name'];?></name></td>
                            <td><lik><?php echo $udd['link'];?></lik></td>
                            <td><avail><?php if($udd['prod_available']==1){echo "Available";} else{echo "Unavailable";}?></avail></td>
                            <td><?php echo $udd['prod_launch_date'];?></td>   
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
        //$('#add').hide();
        $(document).ready(function(){
         
          $(".error").text("Please fill this field");
          $('#subcategory').on('keypress', function (event) {
    				var regex = new RegExp("^[a-zA-Z0-9\ .]+$");
    				var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    				if (!regex.test(key)) {
       				event.preventDefault();
       				return false;
    				}
				  });
          $("#subcategory").on("blur paste", function(event) {
            var text = document.getElementById("subcategory").value;	
            if(text!=""){
                $("#sub").html("");
                text = text.replace(/\.{2,}/g,'.');
                text = text.replace(/\ {2,}/g,' ');
                document.getElementById("subcategory").value= text;
                var categoryregex = new RegExp("^[a-zA-z][a-zA-Z\.\ ]+$|^[a-zA-z][a-zA-Z\.\ ]+[0-9]+$");
                    if (categoryregex.test(text)){
                        $("#sub").html("");
                        text=text.trim();
                        document.getElementById("subcategory").value= text;
                        $("#sub").html("");
                        $("#subcategory").css({"border": "1px solid green"});
                        subc=1;
                    }
                    else{
                          $("#sub").html("Invalid!");
                          $("#subcategory").css({"border": "1px solid red"});
                    }		
            }
            else{
              $("#sub").html("Please fill this field");
              $("#subcategory").css({"border": "1px solid red"});
            }
				  });	
          $(":button").click(function(){
              if(subc==1){
                $("button[name='submit']").prop("type", "submit");
                $("input[name='update']").prop("type", "submit");
              }	
              else{
                return false;
              }
            });
            $('#categorytable').DataTable({}); 
            $("#subcategory").on("blur paste", function() {
                var first = document.getElementById("subcategory").value;	
                first = first.replace(/ {2,}/g,' ');
                document.getElementById("subcategory").value= first;
                if(/\s/.test(first) != false) {
                  first=first.trim();
                  document.getElementById("subcategory").value= first;
                  }	
					  });	 
            $('#available').hide();
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
                                window.location.replace("createcategory.php");
                                
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
                    var hash="#";
                    var currentRow = $(this).closest('tr');
                    var id = currentRow.find('id').text();
				          	var parent = currentRow.find('parent').text();
                    var name =currentRow.find('name').text();
                    var link =currentRow.find('lik').text();
                    var av =currentRow.find('avail').text(); 
                    $('#available').show();
                    console.log(id);
                    $('#id').val(id); 
                    $('#category').val(parent); 
                    $('#subcategory').val(name);
                    $('#link').val(link);
                    $('#add').hide();
                    $('#update').show();
                    $(this).closest('tr').remove();
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
