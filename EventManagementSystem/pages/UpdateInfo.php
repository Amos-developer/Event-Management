<?php
require_once("../database/dbconnection.php");

if(isset($_POST["submitbtn"])){
    $Info_id = $_POST["detail_id"];

    $Binfo_id = explode("Booking Number: ", $_POST['Binfo']);
    $info = $Binfo_id[1];
    $status = $_POST["status"];
    $sql = "UPDATE BOOKING SET Booking_Status = '$status' WHERE Booking_ID ='$info'";

    $query_run = $conn->query($sql);

    if($query_run){
        header("Location: ../pages/bookinfos.php");
    }else{
        echo "<script>alert('Not Updated')</script>";
    }
}
$conn->close();
?>