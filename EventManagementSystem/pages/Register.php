<?php
require_once("../database/dbconnection.php");
  $Fullname = $_POST["Fname"];
  $Username = $_POST["Uname"];
  $Email = $_POST["mail"];
  $PhoneNo = $_POST["phone"];
  $gender = $_POST["gender"];
  $Password = $_POST["pwd"];

if(empty($Fullname) || empty($Username) || empty($Email) || empty($PhoneNo) || empty($gender) || empty($Password)){
      echo "All the details required";
      }
        
      else{
      $sql = "INSERT INTO CUSTOMERS (FullName, UserName, Email, Phone, Gender, Password) VALUES ('$Fullname','$Username', '$Email', '$PhoneNo', '$gender', '$Password')";
    
      $result = $conn->query($sql);
                
      if($result){

      echo "Account created successfully, <a href = '../pages/Login.php'>Sign Up</a>";       
      }else{
        echo "Failed to register";
      }
    }
  $conn->close();
?>