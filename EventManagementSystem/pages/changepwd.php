<?php
require_once("../database/dbconnection.php");
require_once("../database/session.php");
  $Currentpwd = $_POST['currentpwd'];
  $Newpwd = $_POST['newpwd'];
  $Comfirmpwd = $_POST['comfirmpwd'];

  if(!empty($Currentpwd) || !empty($Newpwd) || !empty($Comfirmpwd)){


    $sql = "SELECT * FROM CUSTOMERS WHERE id = $User_ID";

    $res = $conn->query($sql);

    $row = $res->fetch_assoc();

    if($Currentpwd != $row["Password"]){
        echo "Wrong old password";
    }
    else{
        if(empty($Newpwd) || empty($Comfirmpwd)){
            echo "New password cannot be empty";
        }else{
            if($Newpwd != $Currentpwd){
                echo "Password doesnt match";     
            }else{

                $query_update = "UPDATE CUSTOMERS SET Password = '$Newpwd' WHERE id='$User_ID'";

                $result = $conn->query($query_update);

                if($result){
                    echo "Password changed successfully";
                }else{
                    echo "Password not changed successfully" .$conn->error;
                }
            }
        }
    }
    
  }
  else{
    echo "Fill all the details";
  }

?>