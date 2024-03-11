<?php
require_once("../database/dbconnection.php");
require_once("../database/session.php");
    $booking_ID = "EventHive". time();
    $EventValue = $_POST['eventValue'];
    $BookingStatus = $_POST['bookingstatus'];
    $number = $_POST['people'];
    $TextArea = $_POST['textarea'];

    if(!empty($number) && !empty($TextArea)){

    $sql = "INSERT INTO BOOKING (User_ID, Booking_ID, EventName, Booking_Status, Number_People, Remarks) VALUES ('$User_ID', '$booking_ID', '$EventValue', '$BookingStatus', '$number', '$TextArea')";

    $result = $conn->query($sql);

    if($result){
      echo "Booking added successfully";
    }else{
      echo "Booking not added successfully";
    }
  }else{
      echo "Please fill all fields";
  }
?>