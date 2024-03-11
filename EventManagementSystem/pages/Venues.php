<?php
require_once("../database/dbconnection.php");
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap-5.3.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../asserts/icons/fontawesome-6.2.1/css/all.css">
    <link rel="stylesheet" href="../css/Venues.css">
    <link rel="icon" href="../asserts/icons/favicon.ico">
    <script src="../css/bootstrap-5.3.0-dist/js/bootstrap.js"></script>
    <script src="../js/jquery-3.6.1.min.js" ></script>
    <title>Venues</title>
    <style>
      .content{
        width: 100%;
        height: 70vh;
      }
    </style>
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
      <li class="nav-item" id="helo">
        <a class="nav-link" href="../pages/AboutUs.php">About Us</a>
      </li>
    </ul>
  </div>
</nav>

 <div class="container-fluid homepic" >
      <img src="../asserts/images/night2.avif" alt="background" style="width: 100%; height: 100%;">
 </div>


<div class="container slideshow">

<!-- First Rows -->
  <div class="row rows-content">

    <div class="col-lg-4 col-sm-12">
      <div class="card row-cards">
        <div class="card-body">
          <img class="img-fluid" src="../asserts/images/tour 1.jpg" alt="Chania">
         
          <p class="card-text">2023-01-02 to 2023-01-04</p>
          <span class="icon-location"><i class="fas fa-football-ball "></i></span>
          <p class="event-title">Footbal Match Event</p>
          <p><strong>Location: Moshi</strong></p>
           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#BookNow">Book Now</button>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-sm-12">
      <div class="card row-cards">
        <div class="card-body">
          <img class="img-fluid" src="../asserts/images/tour 2.jpg" alt="Chania">
          <p class="card-text">2023-01-01 to 2023-01-03</p>
          <span class="icon-location"><i class="fas fa-baseball-ball"></i></span>
          <p class="event-title">Cricket Match Event</p>
          <p><strong>Location: Arusha</strong></p>
           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#BookNow">Book Now</button>
        </div>
      </div>
    </div>
  
    <div class="col-lg-4 col-sm-12">
      <div class="card row-cards">
        <div class="card-body">
          <img class="img-fluid" src="../asserts/images/tour 3.jpg" alt="Chania">
          <p class="card-text">2023-01-04 to 2023-01-09</p>
          <span class="icon-location"><i class="fas fa-business-time"></i></span>
          <p class="event-title">Trade Shows Event</p>
          <p><strong> Location: Arusha</strong></p>
           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#BookNow">Book Now</button>
        </div>
      </div>
    </div> 

</div>

  <!-- Second row -->
    <div class="row rows-content">

    <div class="col-lg-4 col-sm-12">
      <div class="card row-cards">
        <div class="card-body">
          <img class="img-fluid" src="../asserts/images/tour 4.jpg" alt="Chania">
          <p class="card-text">2023-01-20 to 2023-02-09</p>
          <span class="icon-location"><i class="fas fa-tv"></i></span>
          <p class="event-title">Movies Shows Event</p>
          <p><strong>Location: Arusha</strong></p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#BookNow">Book Now</button>
        </div>
      </div>
    </div> 

    <div class="col-lg-4 col-sm-12">
      <div class="card row-cards">
        <div class="card-body">
          <img class="img-fluid" src="../asserts/images/tour 3.jpg" alt="Chania">
          <p class="card-text">2023-01-03 to 2023-01-09</p>
          <span class="icon-location"><i class="fas fa-business-time"></i></span>
          <p class="event-title">Trade Shows Event</p>
          <p><strong>Location: Moshi</strong></p>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#BookNow">Book Now</button>
        </div>
      </div>
    </div> 

    <div class="col-lg-4 col-sm-12">
      <div class="card row-cards">
        <div class="card-body">
          <img class="img-fluid" src="../asserts/images/tour 2.jpg" alt="Chania">
          <p class="card-text">2023-01-13 to 2023-01-29</p>
          <span class="icon-location"><i class="fas fa-music"></i></span>
          <p class="event-title">Music Shows Event</p>
          <p><strong>Location: Dodoma</strong></p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#BookNow">Book Now</button>
        </div>
      </div>
    </div> 

  </div>

</div>

<!-- The Modal -->
<div class="modal fade" id="BookNow" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="modal-title">Please Enter your details</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">&times;</button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <form action="" method="POST" id="BookNow">
         <div class="alert alert-success alert-dismissible fade show" role="alert" id="register">
              <p id="message"></p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <div class="form-group">
            <label for="Fname"><strong>Full Name:</strong></label>
              <input type="text" class="form-control" id="Fname" name="Fname">
          </div>

          <div class="form-group">
            <label for="Lname"><strong>User Name:</strong></label>
              <input type="text" class="form-control" id="uname" name="Uname">
            </div>

           <div class="form-group">
            <label for="Email"><strong>Email Adress</strong></label>
              <input type="email" class="form-control" id="Email" name="mail">
            </div>

          <div class="form-group">
            <label for="Phone"><strong>Phone</strong></label>
              <input type="tel" class="form-control" id="Phone" name="phone" maxlength="10" pattern="[0-9]{10}" >  
            </div><br>
          <div class="form-group">
            <label for="phone"><strong>Gender</strong></label>
               <input type="radio" name="gender" value="male" checked> Male
               <input type="radio" name="gender" value="female"> Female
              <input type="radio" name="gender" value="other"> Other
          </div>

          <div class="form-group">
            <label for="pass"><strong>Password</strong></label>
              <input type="password" class="form-control"id="pass" name="pwd">
            </div>
            <button type="submit" class="btn btn-primary" name="submit" id="btnsubmit">Submit</button>     
        <hr />
         <?php
              echo "<p class = 'member_already'>Already a member?</p>";
              echo "<p class = 'signup_link'><a href = '../pages/Login.php'> Sign In</a></p>". "<br>";
            ?>
      </form>
      </div>

      <!-- Modal Footer -->
    </div>
  </div>

</div>

<!-- Footer -->

<div class="container-fluid event-footer">

<div class="row rows-footers">

  <div class="col-lg-4 cols">
    <i class="fas fa-phone"></i>
    <p>Phone</p>
    <a href="tel:0676796515" style="color: #fff">+255 676796515</a>
  </div>

  <div class="col-lg-4 cols">
    <i class="fas fa-mail-bulk"></i>
    <p>E-Mail</p>
    <p>group4@gmail.com</p>
  </div>

  <div class="col-lg-4 cols">
    <i class="fas fa-house"></i>
    <p>Event Hive Address</p>
    <p>110090</p>
  </div>    
 
</div>

<div class="row">
  <div class="col">
    <p>Copyright &copy 2023 Event Hive</p>
  </div>
</div>

</div>
<script src="../ajax/Register.js"></script>
</body>
</html>