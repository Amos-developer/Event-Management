<?php
require_once("../database/dbconnection.php");
require_once("../database/session.php");
if(isset($_GET["User_ID"])){
    $User_ID = $_GET["User_ID"];

    $sql = "DELETE FROM BOOKING WHERE User_ID = $User_ID AND (Booking_Status = 'NotComfirmedYet'
     OR Booking_Status = 'Cancelled')";

    $result = $conn->query($sql);

    if($result){
        header("Location: ../pages/UserProfile.php");
    }else{
        echo "Error".$conn->error;
    }
    $conn->close();
}else{
    echo "<script src='../js/Comfirm.js'></script>";
}






