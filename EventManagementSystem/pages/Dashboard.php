<?php
$page = "dashboard";
require_once("../database/sessionadmin.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Dashboard.css">
    <link rel="icon" href="../asserts/icons/favicon.ico">
    <title>Dashboard</title>
    <style>
        @media only screen and (max-width: 600px) {
            body {
                font-size: 14px; 
            }
            
        }
    </style>
</head>
<body>
    <?php
        include('../pages/Header.php');
    ?>
    
    <!-- Main Content -->
    <div class="wrapper">
        <div class="content">
            <p style="margin: 20px; font-size: 20px;">Welcome back<span>
                <?php
                    echo "$Admin";
                ?>
            </span></p>
            <hr />
        </div>
    </div>
</body>
</html>