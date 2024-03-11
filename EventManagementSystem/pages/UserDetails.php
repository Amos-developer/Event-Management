<?php
    require_once("../database/dbconnection.php");
    require_once("../database/session.php");
    $sql = "SELECT * FROM BOOKING WHERE User_ID = $User_ID";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
    echo "<div class = 'table-responsive'><table class ='table'><tr><th>BookingNo</th><th>EventName</th><th>Booking Date</th><th>Booking Status</th><th>Number People</th><th>Remarks</th><th>Action</th></tr>";
    // output data of initial fetch request
    $row = $result->fetch_assoc();

    echo "<tr><td>".$row["Booking_ID"]."</td><td>".$row["EventName"]."</td><td>".$row["Booking_Date"]. "</td><td>" .$row["Booking_Status"]. "</td><td>". $row["Number_People"]. "</td><td>". $row["Remarks"]."</td><td>". "<a href = '../pages/Deletebooking.php?User_ID=$row[User_ID]' type = 'btn btn-primary'>Cancel Booking</a>" ."</td></tr>";
    
    // Output data of subsequent rows
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Booking_ID"]."</td><td>".$row["EventName"]."</td><td>".$row["Booking_Date"]."</td><td>" .$row["Booking_Status"]. "</td><td>". $row["Number_People"]. "</td><td>". $row["Remarks"]."</td><td>". "<a href = '../pages/Deletebooking.php?User_ID=$row[User_ID]' type = 'btn btn-primary'>Cancel Booking</a>" ."</td></tr>";
    }
    echo "</table></div>";

    }else{
        echo "<p style ='text-align: center;'>No Details for you</p>";
    }
?>