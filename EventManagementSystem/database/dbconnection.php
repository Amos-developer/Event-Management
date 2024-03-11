<!-- Database Name EventManagement -->

<?php
$sever_name = "localhost";
$username = "root";
$password = "";
$dbname = "EventManagement";

// Connect to sever
$conn = new mysqli($sever_name, $username, $password, $dbname) or die("Couldn't connect to database" .$conn->error);

?>