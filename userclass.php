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
            $sql = "INSERT INTO tbl_user (email, name, mobile, is_admin, sign_up_date, password, security_question, security_answer) VALUES ('".$username."', '".$name."', '".$mobile."','0','".date("Y/m/d h:i:s")."','".$password."', '".$ques."','".$ans."')";
            $result= $this->conn->query($sql);
            return "Registered Successfully. Please wait for approval!";
        }
    }   
    public function login($username,$pass)  
    {  
        
        $password= md5($pass);
        $sql= "SELECT * FROM tbl_user where email='".$username."'AND password='".$password."'";
        $result= $this->conn->query($sql);
        if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
                if($row['active']==0){
                    $_SESSION['userdata']=array('userid'=>$row['id'],'username'=>$row['email'],'isAdmin'=>$row['is_admin']);	
                    //print_r($_SESSION);
                    if($row['is_admin']==1){
                        header('Location:admin.php');
                        return "Valid Login Details";
                    } 
                    else{
                        header('Location:userdash.php');
                        return "Valid Login Details"; 
                    }  
                }
                else{
                    return "Confirmation Pending";
                }       
			}
		} 
        else{    
            return "Invalid Login Details";
        }
    }  
}
?>    