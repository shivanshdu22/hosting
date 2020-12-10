<?php

class Product extends DatabaseClass  
{ 
    public function addcategory($prod,$link)  
    {  
        date_default_timezone_set('Asia/Kolkata');
        $sql= "SELECT * FROM tbl_product where prod_name='".$prod."'";
        $result= $this->conn->query($sql);
        if($result->num_rows > 0){
            return "Category Already Present";
            }
        else{    
            $sql = "INSERT INTO tbl_product (prod_parent_id,prod_name, link, prod_launch_date) VALUES ('1','".$prod."', '".$link."','".date("Y/m/d h:i:s")."')";
            $result= $this->conn->query($sql);
            return "Category added!";
        }
    }   
    
    public function categorydetails($id)  
        {  
            $a=array();
            $sql= "SELECT * FROM tbl_product where prod_parent_id='1'";
            $result= $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    array_push($a,$row); 
                }
                return $a;
            } 
        }  
    public function deleteproduct($userid){
            if($userid!=""){
                $sql= "DELETE FROM `tbl_user` WHERE `user_id`='".$userid."'";
                $result= $this->conn->query($sql);
                return $sql;
            }    
            else{
                return "Not being able to update3";
            }    
        }
}
?>    