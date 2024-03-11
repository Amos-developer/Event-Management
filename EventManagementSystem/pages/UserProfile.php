<?php
require_once("../database/session.php");
require_once("../database/dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap-5.3.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../asserts/icons/fontawesome-6.2.1/css/all.css">
    <link rel="stylesheet" href="../css/UserProfile.css">
    <link rel="icon" href="../asserts/icons/favicon.ico">
    <script src="../css/bootstrap-5.3.0-dist/js/bootstrap.js"></script>
    <script src="../js/jquery-3.6.1.min.js" ></script>
    <title>User Profile</title>

</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Event Hive</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a class="nav-link" href="../pages/Home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../pages/Venues.php">Venues</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../pages/AboutUs.php">About Us</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="../pages/BookNow.php">Book Now</a>
      </li>

    </ul>
  </div>
</nav>

<div class="container-fluid user-container">
    <div class="row">

        <div class="col-lg-6 user-dashboard">
            <div class="user-account">
                <h5><strong>MY ACCOUNT</strong></h5>
                <div class="list-group myList">
                  <a href="../pages/UserProfile.php" class="list-group-item list-group-item-action">MY PROFILE</a>
                  <a href="#" class="list-group-item list-group-item-action" id="booking">MY BOOKING</a>
                  <a href="#" class="list-group-item list-group-item-action" type="button" data-bs-toggle="modal" data-bs-target="#UpdateDetails">
                  CHANGE PASSWORD</a>
                  <a href="../pages/Logout.php" class="list-group-item list-group-item-action">LOGOUT</a>
                </div>
            </div>

          </div>

        <div class="col-lg-6 User">
            <div class="user-details" id="infos">
                   <?php
                    include("../database/dbconnection.php");
                    $sql = "SELECT FullName, UserName, Email, Phone, Gender, Password FROM CUSTOMERS WHERE id = $User_ID";

                    $result = $conn->query($sql);
                    if($result->num_rows > 0) {
                   
                    while($row = $result->fetch_assoc()){
                      echo "<p> <strong>Fullname</string>: ". $row["FullName"]."</p>
                            <p> <strong>Username</strong>: ". $row["UserName"]."</p>
                            <p> <strong>Email</strong>: ". $row["Email"]."</p>
                            <P><strong>Phone</strong>: ". $row["Phone"]."</p>
                            <p> <strong>Gender</strong>: ". $row["Gender"]."</p>";
                    }    
                    }else{
                    echo "No any Booking Available";
                    }
                    ?>
            </div>
        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="UpdateDetails" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="modal-title">Book details</h4>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <form action="" method="POST" name="form">
          <div class="alert alert-success alert-dismissible fade show" role="alert" id="change">
              <p id="message"></p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
         <div class="form-group">
          <input type="password" class="form-control" placeholder="Current Password" id="currentpwd" name="currentpwd">
        </div><br>
         <div class="form-group">
          <input type="password" class="form-control" placeholder="New Password" id="newpwd" name="newpwd">
        </div><br>
         <div class="form-group">
          <input type="password" class="form-control" placeholder="Comfirm Password" id="comfirmpwd" name="comfirmpwd">
        </div>
        
        <hr>
     
        <button type="submit" class="btn btn-primary" name="submit">Update</button>

      </form>
      </div>


      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CLOSE</button>
      </div>

    </div>
  </div>
</div>

</div>
<script src="../ajax/UserProfile.js" ></script>
<script type="module" src="../ajax/changepwd.js"></script>
</body>
</html>