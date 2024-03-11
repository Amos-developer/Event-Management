<?php
require_once("../database/sessionadmin.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asserts/icons/fontawesome-6.2.1/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap-5.3.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/Header.css">
    <script src="../css/bootstrap-5.3.0-dist/js/bootstrap.js" ></script>
    <title>Header</title>
</head>
<body>
    <div class="side-bar">
        <div class="admin-title" style="color:#fff; text-align: center;">
            <p style="font-size: 20px;">Event Management</p>
            <img src="../asserts/images/admin-p.png" alt="admin-p">
            <p><?php
             echo "$Admin"; 
             ?>
             </p>
        </div>

        <div class="lists <?php if($page == 'dashboard') echo 'active'?>">
            <!-- <span class="icon"><i class="fas fa-book" style="color: #fff;"></i></span> -->
            <a href="../pages/Dashboard.php" class="links">Home</a>
        </div>
        
        <div class="lists <?php if($page == 'venuebook') echo 'active'?>">
            <!-- <i class="fas fa-book"></i> -->
            <a href="../pages/bookinfos.php" class="links">Booking Informations</a>
        </div>

        <div class="lists <?php if($page == 'manageusers') echo 'active'?>">
            <!-- <i class="fas fa-book"></i> -->
            <a href="../pages/Users.php" class="links">Manage Users</a>
        </div>
        
        <div class="lists <?php if($page == 'addevent') echo 'active'?>">
            <!-- <i class="fas fa-book"></i> -->
            <a href="../pages/Events.php" class="links">Add Events</a>
        </div>

        <div class="lists <?php if($page == 'Viewevent') echo 'active'?>">
            <!-- <i class="fas fa-book"></i> -->
            <a href="../pages/ViewEvent.php" class="links">View Events</a>
        </div>
 
        <div class="lists <?php if($page == 'setting') echo 'active'?>">
            <!-- <i class="fas fa-book icon"></i> -->
            <a href="../pages/Setting.php" class="links">Account Setting</a>
        </div>

        <div class="lists <?php if($page == 'Logout') echo 'active'?>">
            <!-- <i class="fas fa-book icon"></i> -->
            <a href="../pages/AdminLogout.php" class="links">Logout</a>
        </div>
        
    </div>

</body>
</html>