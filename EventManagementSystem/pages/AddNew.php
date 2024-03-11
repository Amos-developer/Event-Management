<?php
require_once("../database/dbconnection.php");

$Fullname = $_POST["Fullname"];
$Username = $_POST["Username"];
$Email = $_POST["mail"];
$Phone = $_POST["pnumber"];
$Gender = $_POST["gender"];
$password = $_POST["pass"];

if(empty($Fullname) || empty($Username) || empty($Email) || empty($Phone) || empty($Gender) || empty($password)) {
    echo "Please enter all user details";
}
else{
    $sql = "INSERT INTO CUSTOMERS (FullName,UserName,Email,Phone,Gender,Password)
    VALUES ('$Fullname','$Username','$Email','$Phone','$Gender','$password')";

    $result = $conn->query($sql);

    if($result){
        echo "User created successfully";
    }else{
        echo "User not created successfully". $conn->error;
    }
}
$conn->close();
?>