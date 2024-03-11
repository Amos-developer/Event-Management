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
    <link rel="stylesheet" href="../css/BookNow.css">
    <link rel="icon" href="../asserts/icons/favicon.ico">
    <script src="../css/bootstrap-5.3.0-dist/js/bootstrap.js"></script>
    <script src="../js/jquery-3.6.1.min.js" ></script>
    <title>My Booking</title>

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
        <a class="nav-link" href="../pages/AboutUs.php">About Us</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="../pages/BookNow.php">Book Now</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="../pages/Logout.php">Log Out</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container booking_main">
    <h1 style="font-weight: lighter;" >UP COMMING EVENTS</h1>
    <div class="row">
  
        <?php
        // require_once("../database/dbconnection.php");
        $select_query = "SELECT * FROM EVENTS";

        $result = $conn->query($select_query);

        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
              echo "<div class='col-lg-12 event'>";
              echo "<img src='../asserts/images/$row[EventImage]'
              alt='$row[EventName]' style='width: 20%; border-radius: 50%;'>";
              echo "<p class='event-time'><strong>$row[StartDate] to $row[EndingDate]</strong></p>";
              echo "<i class='fas fa-tv event-icon'></i>";
              echo "<p class='event-name events'>$row[EventName]</p>";
              echo "<p class='event-name location'>Location: <span id='event-location'>$row[EventLocation]</span></p>";
              echo "<button type='button' class='btn btn-primary btn2' data-bs-toggle='modal' 
              data-bs-target='#BookNow'>Book Now</button>";
              echo "</div>";
          }
          
        }
        ?>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="BookNow" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="modal-title">Booking details</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"
         onclick="window.location.href = '../pages/BookNow.php'">&times;</button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <form action="" method="POST" name="form" id="form">
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="modal">
                <strong id="message"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="window.location.href = '../pages/BookNow.php'" ></button>
            </div>
           <div class="form-group">
              <input type="hidden" class="form-control" id="eventValue" name="eventValue">
          </div>
          <div class="form-group">
              <input type="hidden" class="form-control" id="bookingstatus" name="bookingstatus" value="NotComfirmedYet">
          </div>
          <div class="form-group">
              <input type="number" class="form-control" id="NoPeople" name="people" placeholder="Number of Members">
          </div><br>
          <div class="form-group">
              <textarea class="form-control" rows="5" id="comment" name="textarea"></textarea>
          </div>
          <hr>
        <button type="submit" class="btn btn-primary" name="submit" id="submit_book" >Submit</button>

      </form>
      </div>
      <!-- Modal Footer -->
    </div>
  </div>
</div>
<script>

const button =document.querySelectorAll(".btn");
const inputs =document.querySelectorAll(".events");

button.forEach((btn)=>{
  btn.addEventListener("click",()=>{
    if(btn.classList.contains("btn1")){
      document.getElementById("eventValue").value = inputs[0].innerHTML;
    }
    if(btn.classList.contains("btn2")){
     document.getElementById("eventValue").value = inputs[1].innerHTML;
    }
  })
})

</script>

<script src="../ajax/BookNow.js"></script>
</body>
</html>