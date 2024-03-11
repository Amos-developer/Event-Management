<?php
    $page = "Viewevent";
    require_once("../database/dbconnection.php");
    $success = "";
    $Error = "";
    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $sql = "DELETE FROM EVENTS WHERE id=$id";

        $result = $conn->query($sql);

        if($result){
            $success = "Event has been successfully deleted";
        }else{
            $Error = "Event has not been successfully deleted". $conn->error;
        }
    }
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap-5.3.0-dist/css/bootstrap.css">
    <link rel="icon" href="../asserts/icons/favicon.ico">
    <script src="../css/bootstrap-5.3.0-dist/js/bootstrap.js" ></script>
    <script src="../js/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" href="../css/ViewEvent.css">
    <title>Events</title>
</head>
<body>
    <?php
        require_once("../pages/Header.php");
    ?>

    <div class="wrapper">
        <div class="content">
            <div class="col-lg-12" style="border-bottom: 1px solid rgb(16, 16, 123); margin: 10px; width: auto;">
                <h1 style="width: auto; font-size: 2rem; margin: 10px;">Manage Event</h1>
            </div>

        <div class="event_content" style="margin: 10px; border: 2px solid #DDDDDD;">
            <div class="table-head" style="background: #F5F5F5; padding: 5px" >
                <p style="width: auto;">Manage Event</p>
            </div> 

            <div class="row" style="display: flex; justify-content: space-between; margin: 10px;">
            <div class="col-lg-6 show">
                <p class="filter-options">Show<span>
                    <select>
                        <option value="1">10</option>
                        <option value="2">20</option>
                        <option value="3">30</option>
                        <option value="4">40</option>
                    </select>
                </span>entries</p>
            </div>
            <div class="col-lg-6 search-box" style="margin-right: -12rem;">
                <label for="search">Search:</label>
                    <button type="reset" class="btn btn-danger" id="btnreset" style="padding: 1px; border: none; display: none;">reset</button>
                <input type="search"  class="search" id="search">
            </div>
            </div>
            <!--  -->
            <?php
            if($Error!= ""){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' id = 'deletesuccess'>
                <strong>$Error</strong>
               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            }
            if($success!= ""){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert' id = 'deletedanger'>
                <strong>$success</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            }
            ?>
            <!--  -->
             <div class="table-responsive-sm" style="margin: 10px;">          
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Event Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Event Location</th>
                            <th>Event Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="info_table">
                       <?php
                        require_once("../database/dbconnection.php");

                        $sql = "SELECT * FROM EVENTS";
                        $count = 1;
                        
                        $result = $conn->query($sql);

                        if($result->num_rows > 0){
                            $count = 1;
                            while($row = $result->fetch_assoc()){
                                 echo "<tr><td class = 'hidden'>".$row['id']."</td><td>"
                                .$count."</td><td>"
                                .$row['EventName']."</td><td>"
                                .$row['StartDate']."</td><td>"
                                .$row['EndingDate']."</td><td>"
                                .$row['EventLocation']."</td><td style = 'text-align: center; width: auto'>
                                <img src='../asserts/images/$row[EventImage]' alt='$row[EventName]' style='width: 50%; border-radius: 10%; margin: 0 auto;'>
                                </td><td>"
                                ."<a class='btn btn-primary btnOpen' data-id='$row[id]' name = 'Edit' 
                                style = 'padding: 2px 10px; border-radius: 50%' href='#'>
                                <i class = 'fas fa-edit'></i></a>
                                <a class='btn btn-danger' name = 'delete' onclick='confirmDelete($row[id])'
                                style = 'padding: 2px 10px; border-radius: 50%' href='#'>
                                <i class = 'fas fa-trash-alt'></i></a>"
                                ."</td></tr>";
                                $count++;
                            }
                        }
                       ?>
                    </tbody>
                </table>
            </div>
        <!-- End of event_content -->
    </div>

</div>
        <!-- End of content div -->
</div>
    <!-- End of the wrapper div -->
</div>

<!-- The Modal -->
<div class="modal fade" id="UpdateEvent" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="modal-title">Book details</h4>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <form action="" method="POST" name="form" enctype="multipart/form-data">
        <div class="form-group">
          <input type="hidden" class="form-control" id="EventId" name="EventId">
        </div><br>
          <div class="alert alert-success alert-dismissible fade show" role="alert" id="myAlert">
              <strong id="text"></strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
         <div class="form-group">
          <input type="text" class="form-control"  id="event" name="EventName" readonly style="background-color: #F5F5F5; cursor: not-allowed;">
          <select name="select" id="categoryname" style="width: 100%; padding: 8px 10px;">
                    <option value="">Select</option>
                    <option value="Football Match Event">Football Match Event</option>
                    <option value="Cricket Match Event">Cricket Match Event</option>
                    <option value="Trade Events">Trade Events</option>
                    <option value="Business Events">Business Events</option>
                </select>
        </div><br>
         <div class="form-group">
          <input type="date" class="form-control" id="StartDate" name="StartDate">
        </div><br>
         <div class="form-group">
          <input type="date" class="form-control" id="EndDate" name="EndDate">
        </div><br>
         <div class="form-group">
          <input type="text" class="form-control" id="locinput" name="EventLocation" readonly style="background-color: #F5F5F5; cursor: not-allowed;">
            <select name="location" id="location" style="width:100%; padding: 8px 10px;">
               <option value="">Select</option>
               <option value="Arusha">Arusha</option>
               <option value="Moshi">Moshi</option>
               <option value="Dodoma">Dodoma</option>
            </select>
        </div><br>
         <div class="form-group">
          <input type="file" class="form-control" id="EventImage" name="EventImage">
        </div>
        <div id="selectedFileName"></div>
        <hr>
        <button type="submit" class="btn btn-primary" name="submit" id="test" >SAVE CHANGES</button>

      </form>
      </div>

      <!-- Modal Footer -->
    </div>
  </div>
<script src="../js/OpenModal.js"></script>
<script>
    // Display the selected image content
    const eventImageInput = document.getElementById("EventImage");
    const selectedFileName = document.getElementById("selectedFileName");

    eventImageInput.addEventListener("change", function() {
    const fileName = eventImageInput.files[0].name;
    selectedFileName.textContent = `Selected File: ${fileName}`;
    });

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

    // Function for confirmation of delete event
    function confirmDelete(eventId) {
        if (confirm('Are you sure you want to delete this Event?')) {
            
            window.location.href = "../pages/ViewEvent.php?id=" + eventId;
        }
        
    }

// JQUERY
    $(document).ready(function () {

    $(".btnOpen").on("click", function(){
    $("#UpdateEvent").modal("show");

    $tr = $(this).closest("tr");

    var id = $(this).data("id");
    var data = $tr.children("td:not(.hidden)").map(function (){
            return $(this).text();
    }).get();
    $("#EventId").val(id);
    $("#event").val(data[1]);
    $("#StartDate").val(data[2]);
    $("#EndDate").val(data[3]);
    $("#locinput").val(data[4]);
    $("#selectedFileName").text(data[5]);
  
  });
  
});

</script>
<script src="../js/Filter.js"></script>

</body>
</html>