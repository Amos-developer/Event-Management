<?php
require_once("../database/dbconnection.php");
$eventId = $_POST["EventId"];

$eventName = $_POST["EventName"];
$startDate = $_POST["StartDate"];
$endDate = $_POST["EndDate"];
$eventLocation = $_POST["EventLocation"];
$eventImages  = $_FILES["EventImage"]['name'];

$sql = "UPDATE EVENTS SET `EventName` = '$eventName', StartDate = '$startDate',
EndingDate = '$endDate', EventLocation = '$eventLocation', EventImage ='$eventImages' WHERE id='$eventId'";

$result = $conn->query($sql);

if($result){
    echo "Data Updated successfully";
}else{
    echo"Data not Updated successfully". $conn->error;
}
$conn->close();
?>