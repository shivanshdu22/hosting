<?php

class User extends DatabaseClass  
{ 
    public function register($username,$name,$mobile,$pass,$ques,$ans)  
    {  
        date_default_timezone_set('Asia/Kolkata');
        $sql= "SELECT * FROM tbl_user where email='".$username."'";
        $result= $this->conn->query($sql);
        if($result->num_rows > 0){
            return "User Name Already Present";
            }
        else{    
            $password= md5($pass);
            $sql = "INSERT INTO tbl_user (email, name, mobile, is_admin, sign_up_date, password, security_question, security_answer) VALUES ('".$username."', '".$name."', '".$mobile."','0','".date("Y/m/d h:i:s")."','".$password."', '".$ques."','".$ans"')";
            $result= $this->conn->query($sql);
            return "Registered Successfully. Please wait for approval!";
        }
    }   
}
?>    