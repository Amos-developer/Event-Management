<?php
require_once("../database/dbconnection.php");

    $id = $_POST["Update_id"];

    $Fname = mysqli_real_escape_string($conn,$_POST["Fname"]);
    $Uname = mysqli_real_escape_string($conn,$_POST["Uname"]);
    $Email = mysqli_real_escape_string($conn,$_POST["Email"]);
    $Phone = mysqli_real_escape_string($conn,$_POST["Phone"]);
    $Gender = mysqli_real_escape_string($conn,$_POST["Gender"]);
    $Password = mysqli_real_escape_string($conn,$_POST["Password"]);

    $sql = "UPDATE CUSTOMERS SET FullName = '$Fname', UserName = '$Uname', Email = '$Email', Phone = '$Phone', Gender = '$Gender', Password = '$Password' WHERE id = $id";

    $res = $conn->query($sql);

    if($res){
        echo "Data Updated successfully";
    }else{
        echo "Data Not Updated successfully" .$conn->error;
    }

    $conn->close();
?>