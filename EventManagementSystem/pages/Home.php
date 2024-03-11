
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap-5.3.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../asserts/icons/fontawesome-6.2.1/css/all.css">
    <link rel="icon" href="../asserts/icons/favicon.ico">
    <!-- Swipper Css -->
    <link rel="stylesheet" href="../css/swiper-bundle.min.css">
    <link rel="stylesheet" href="../css/Home.css">
    <script src="../css/bootstrap-5.3.0-dist/js/bootstrap.js"></script>
    <script src="../js/jquery-3.6.1.min.js" ></script>
    <title>Home</title>
    <style>
      .content{
        width: 100%;
        height: 70vh;
      }

    </style>
</head>
<body style="overflow: auto;">

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
      <li class="nav-item">
        <a class="nav-link" href="../pages/BookNow.php">Book Now</a>
      </li>
    </ul>
  </div>
</nav>

 <div class="container-fluid homepic">
      <!-- <h1>Welcome to Event Hive</h1> -->
      <div class="contents">
         <img src="../asserts/images/night1.webp" alt="image1">

         <div class="content-text">
         <!-- <h1>This is the first Image</h1>
         <p>FIRST IMAGE IN THE IMAGE SLIDER</p> -->
        </div>

      </div>

      <div class="contents">
         <img src="../asserts/images/night4.jpg" alt="image2">

         <div class="content-text">
         <!-- <h1>This is the Second Image</h1>
         <p>Second IMAGE IN THE IMAGE SLIDER</p> -->
        </div>

      </div>

      <div class="contents">
         <img src="../asserts/images/night3.jpg" alt="image3">

         <div class="content-text">
         <!-- <h1>This is the Third Image</h1>
         <p>THIRD IMAGE IN THE IMAGE SLIDER</p> -->
        </div>

      </div>

      <div class="contents">
         <img src="../asserts/images/night4.jpg" alt="image4">

         <div class="content-text">
         <!-- <h1>This is the forth Image</h1>
         <p>FORTH IMAGE IN THE IMAGE SLIDER</p> -->
        </div>

    </div> 
 </div>

<div class="container slideshow">

<!-- First Rows -->
<div class="row rows-content">

    <div class="col-lg-4 col-sm-12 col-md-12">
      <div class="card row-cards">
        <div class="card-body">
          <img class="img-fluid" src="../asserts/images/tour 1.jpg" alt="Chania">
          <span class="icon-location"><i class="fas fa-football-ball "></i></span>
          <p class="event-title">Footbal Match Event</p>
          <p><strong>Location: Moshi</strong></p>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-sm-12 col-md-12">
      <div class="card row-cards">
        <div class="card-body">
          <img class="img-fluid" src="../asserts/images/tour 2.jpg" alt="Chania">
          <span class="icon-location"><i class="fas fa-football-ball "></i></span>
          <p class="event-title">Trade Event</p>
          <p><strong>Location: Dodoma</strong></p>
        </div>
      </div>
    </div>
  
    <div class="col-lg-4 col-sm-12 col-md-12">
      <div class="card row-cards">
        <div class="card-body">
          <img class="img-fluid" src="../asserts/images/tour 3.jpg" alt="Chania">
         <span class="icon-location"><i class="fas fa-football-ball "></i></span>
          <p class="event-title">Cricket Match Event</p>
          <p><strong>Location: Arusha</strong></p>
        </div>
      </div>
    </div> 

</div>

  <!-- Second Rows -->
<div class="row rows-content">

    <div class="col-lg-4 col-sm-12 col-md-12">
      <div class="card row-cards">
        <div class="card-body">
          <img class="img-fluid" src="../asserts/images/tour 4.jpg" alt="Chania">
          <span class="icon-location"><i class="fas fa-football-ball "></i></span>
          <p class="event-title">Footbal Match Event</p>
          <p><strong>Location: Moshi</strong></p>
        </div>
      </div>
    </div> 

    <div class="col-lg-4 col-sm-12 col-md-12">
      <div class="card row-cards">
        <div class="card-body">
          <img class="img-fluid" src="../asserts/images/tour 3.jpg" alt="Chania">
          <span class="icon-location"><i class="fas fa-football-ball "></i></span>
          <p class="event-title">Footbal Match Event</p>
          <p><strong>Location: Moshi</strong></p>
        </div>
      </div>
    </div> 

    <div class="col-lg-4 col-sm-12 col-md-12">
      <div class="card row-cards">
        <div class="card-body">
          <img class="img-fluid" src="../asserts/images/tour 2.jpg" alt="Chania">
          <span class="icon-location"><i class="fas fa-football-ball "></i></span>
          <p class="event-title">Footbal Match Event</p>
          <p><strong>Location: Moshi</strong></p>
        </div>
      </div>
    </div> 

  </div>
<!-- End of Rows -->
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
  <div class="col-lg-12">
    <p>Copyright &copy 2023 Event Hive</p>
  </div>
</div>

</div>

<script src="../js/Home.js" ></script>
</body>

</html>