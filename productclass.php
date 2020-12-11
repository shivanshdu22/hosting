<?php

class Product extends DatabaseClass  
{ 
    public function addcategory($prod,$link)  
    {  
        date_default_timezone_set('Asia/Kolkata');
        $sql = "INSERT INTO tbl_product (prod_parent_id,prod_name, link, prod_launch_date) VALUES ('1','".$prod."', '".$link."','".date("Y/m/d h:i:s")."')";
        $result= $this->conn->query($sql);
        return "Category added!";
        
    }   

    public function addproduct($parent_id,$prod,$link,$desc,$mon_price,$annual_price,$sku)  
    {  
        date_default_timezone_set('Asia/Kolkata');
        $sql = "INSERT INTO tbl_product (prod_parent_id,prod_name, link, prod_launch_date) VALUES ('".$parent_id."','".$prod."', '".$link."','".date("Y/m/d h:i:s")."')";
        $result= $this->conn->query($sql);
        $last_id = $this->conn->insert_id;
        
        $sql = "INSERT INTO tbl_product_description (prod_id,description, mon_price, annual_price,sku) VALUES ('".$last_id ."','".$desc."', '".$mon_price."','".$annual_price."','".$sku."')";
        $result= $this->conn->query($sql);
        return "Product added!";
    }   
    public function updatecategory($id,$prod,$link,$avail){
            $sql= "SELECT * FROM tbl_product WHERE id='".$id."'";
            $result= $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                        $sql= "UPDATE `tbl_product` SET `prod_name`='".$prod."', `link`='".$link."', `prod_available`='".$avail."' WHERE id='".$id."'";
                        $result= $this->conn->query($sql);
                        return "Update Done";
                    
                }
            } 
            else{
                return "None";
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
    public function productdetails($id)  
        {  
            $a=array();
            $sql="SELECT * FROM tbl_product_description INNER JOIN tbl_product ON tbl_product.id=tbl_product_description.prod_id where prod_parent_id!='0'";
            $result= $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    array_push($a,$row); 
                }
                return $a;
            } 
        }     
    public function deleteproduct($id){
            if($id!=""){
                $sql= "DELETE FROM `tbl_product` WHERE `id`='".$id."'";
                $result= $this->conn->query($sql);
                $sql= "DELETE FROM `tbl_product` WHERE `prod_parent_id`='".$id."'";
                $result= $this->conn->query($sql);
                return "Deleted";
            }    
            else{
                return "Not being able to update";
            }    
        }
}
?>    