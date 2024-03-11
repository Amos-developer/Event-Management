<?php
require_once("../database/dbconnection.php");
    $page = "addevent";
    $Error = "";
    $success = "";
    if(isset($_POST["btnAdd"])){
    $Event = $_POST["event"];
    $StartDate = $_POST["startdate"];
    $EndDate = $_POST["Enddate"];
    $Location = $_POST["locinput"];
    $ImgUpload = $_POST["ImageUpld"];

    if(empty($Event) || empty($StartDate) || empty($EndDate) || empty($Location) || empty($ImgUpload)){
     $Error = "Please fill all the details";
    }   
    else{
    $sql = "INSERT INTO EVENTS (EventName, StartDate, EndingDate, EventLocation, EventImage)
    VALUES ('$Event','$StartDate','$EndDate','$Location','$ImgUpload')";

    $result = $conn->query($sql);

    if($result){
        $success = "Event Added Successfully";
        header("Location: ../pages/ViewEvent.php");
    }else{
        $Error = "Failed to add Event";
    }

    }
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap-5.3.0-dist/css/bootstrap.css">
    <script src="../css/bootstrap-5.3.0-dist/js/bootstrap.js" ></script>
    <script src="../js/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" href="../css/Event.css">
    <link rel="icon" href="../asserts/icons/favicon.ico">
    <title>Add Events</title>
</head>
<body>
    <?php
        require_once("../pages/Header.php");
    ?>

    <div class="wrapper">
        <div class="content">
            <div class="col-lg-12" style="border-bottom: 1px solid rgb(16, 16, 123); margin: 10px; width: auto;">
                <h1 style="width: auto; font-size: 2rem; margin: 10px;">Add Event</h1>
            </div>

        <div class="event_content" style="margin: 10px; border: 2px solid #DDDDDD;">
            <div class="table-head" style="background: #F5F5F5; padding: 5px" >
                <p style="width: auto;">Edit Event</p>
            </div> 

    <form action="" method="POST" id="myForm">
        <?php
        if($Error!= ""){
           echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>$Error</strong>
               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        if($success!= ""){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$success</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        ?>
        <div class="form-group">
            <label for="events"><strong>Event Name:</strong></label><br>
            <input type="hidden" class="form-control" id="event" name="event">
                <select name="select" id="categoryname" style="width: 100%; padding: 8px 10px;">
                    <option value="1">Select</option>
                    <option value="Football Match Event">Football Match Event</option>
                    <option value="Cricket Match Event">Cricket Match Event</option>
                    <option value="Trade Events">Trade Events</option>
                    <option value="Business Events">Business Events</option>
                </select>
        </div>
        <div class="form-group">
            <label for="startdate"><strong>Starting date:</strong></label>
                <input type="date" class="form-control" id="startdate" name="startdate">
        </div>

         <div class="form-group">
            <label for="Enddate"><strong>Ending date:</strong></label>
                <input type="date" class="form-control" id="Enddate" name="Enddate">
        </div>

         <div class="form-group">
            <label for="location"><strong>Event Location:</strong></label><br>
            <input type="hidden" class="form-control" id="locinput" name="locinput">
            <select name="location" id="location" style="width:100%; padding: 8px 10px;">
               <option value="">Select</option>
               <option value="Arusha">Arusha</option>
               <option value="Moshi">Moshi</option>
               <option value="Dodoma">Dodoma</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Image"><strong>Event Featured Image:</strong></label>
                <input type="file" class="form-control" id="ImageUpld" name="ImageUpld">
        </div>

        <input type="submit" name="btnAdd" value="Add Event" class="btn btn-primary" style="margin: 10px;" id="btnAdd">
  </form>
</div>

<!-- End of content div -->
</div>
<!-- End of the wrapper div -->
</div>

<script>
      var locationSelected = document.getElementById("location");
      var eventCategory = document.getElementById("categoryname");

      var inputLocation = document.getElementById("locinput");
      var inputCategory = document.getElementById("event");

      locationSelected.addEventListener("change", function (){
            inputLocation.value = locationSelected.value;
     });

      eventCategory.addEventListener("change", ()=>{
        inputCategory.value = eventCategory.value;   
    })

</script>
</body>
</html>