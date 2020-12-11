<?php
include "../dbc.php";
include "../userclass.php";
include "../productclass.php";
$user= new User();
  $product= new Product();
if(isset($_POST)){
    $id=isset($_POST['id'])?$_POST['id']:'';
    $action=isset($_POST['action'])?$_POST['action']:'';  
    
    if($action=="deletecategory"){
        $msg=$product-> deleteproduct($id);
        echo $msg;
    }
}

?>