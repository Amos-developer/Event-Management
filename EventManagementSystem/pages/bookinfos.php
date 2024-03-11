<?php
$page = "venuebook";
require_once("../database/dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" href="../css/bookinfos.css">
    <link rel="icon" href="../asserts/icons/favicon.ico">
    <link rel="stylesheet" href="../css/bootstrap-5.3.0-dist/css/bootstrap.css">
    <script src="../css/bootstrap-5.3.0-dist/js/bootstrap.js" ></script>
    <title>Booking Info</title>
</head>
<body>
    <?php
        include('../pages/Header.php');
    ?>

    <div class="wrapper">

        <div class="content">

            <div class="heading" style="margin: 10px;" >
                <p class="listhead" style="width: 200px; margin: 10px;">Venue Booking List</p>
                <!-- <button class="btn btn-primary" style="margin: 10px; padding: 4px 30px;">+ new</button> -->
            </div>
            <hr style="border: 1px solid rgb(16, 16, 123); margin: 10px;"/>

            <div class="filter-details" style="margin: 10px;">
                <p class="filter-options">Show<span>
                    <select>
                        <option value="1">10</option>
                        <option value="2">20</option>
                        <option value="3">30</option>
                        <option value="4">40</option>
                    </select>
                </span>entries</p>
                <div class="search" style="margin-right: 10px; width: 210px; padding: 5px;" >
                    <label for="search">Search:</label>
                    <button type="reset" class="btn btn-danger btnreset" style="padding: 1px; border: none;">reset</button>
                    <input type="search"  class="search" id="search">
                </div>
                
            </div>

              <div class="table-responsive-sm info">          
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Booking Information</th>
                            <th>Customer Information</th>
                            <th>Booking Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                <tbody id="info_table">
                    <?php
                        $sql = "SELECT CUSTOMERS.* , BOOKING.*
                        FROM CUSTOMERS
                        JOIN BOOKING ON CUSTOMERS.ID = BOOKING.User_ID
                        WHERE CUSTOMERS.ID = BOOKING.User_ID
                        ";

                        $result = $conn->query($sql);

                        if($result->num_rows > 0){
                            $count = 1;
                            while($row = $result->fetch_assoc()){
                                echo "
                                <tr>
                                <td class = 'hidden'>".$row["id"]."</td>
                                <td>".$count."</td>
                                <td>"  ."Event: ". "<strong>" .$row["EventName"]. "</strong>" ."<br>". 
                                "Number of people: ". "<strong>".$row["Number_People"]. "</strong>"."<br>". 
                                "Booking Date: ". "<strong>" .$row["Booking_Date"]. "</strong>"."<br>".
                                "Booking Number: ". "<strong>" .$row["Booking_ID"]. "</strong>"."<br>".
                                "</td>
                           
                                <td>"."Booked by: "."<strong>".$row["FullName"]. "</strong>" ."<br>".
                                "Email: ". "<strong>" .$row["Email"]. "</strong>" ."<br>".
                                "Phone: ". "<strong>" .$row["Phone"]. "</strong>" ."<br>".
                                "Gender: ". "<strong>" .$row["Gender"]. "</strong>" ."<br>".
                                "</td>

                                <td>"."<p style = 'background: #0D6EFD; color: #fff; text-align: center; margin-top: 30px;'>".$row["Booking_Status"]."</p>"."</td>
                                <td><a type = 'submit' name = 'submit' title='Edit' data-placement ='auto' 
                                 class='btn btn-primary btnadd' style = 'margin-top: 22px; padding: 5px 20px; border: 2px solid #0D6EFD' href='#'>
                                <i class = 'fas fa-edit'></i></a></td>
                                </tr>";
                                $count++;
                            }
        
                        }else{
                            die($conn->error);
                        }
                        $conn->close();
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <!-- The Modal -->
<div class="modal fade" id="InfoEdit" tabindex="-1" aria-labelledby="modal-title" aria-text="true">

  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="modal-title">Booking Informations</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">&times;</button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
      
        <form action="UpdateInfo.php" method="POST" id="myForm">

          <div class="form-group">
              <input type="hidden" class="form-control" id="detail_id" name="detail_id">
          </div>
            <div class="form-group">
              <input type="hidden" class="form-control" id="Binfo" name="Binfo">
          </div>
            <div class="form-group">
              <input type="hidden" class="form-control" id="Cinfo" name="Cinfo">
          </div>
         <div class="form-group">
              <input type="text" class="form-control" id="status" name="status" readonly style="background-color: #F5F5F5; cursor: not-allowed;" >
              <select name="status" id="status" style="width: 100%; margin: 1px">
                <option value="Comfirmed">Comfirmed</option>
                <option value="Cancelled">Cancelled</option>
                <option value="NotcomfirmedYet">NotcomfirmedYet</option>
              </select>
         </div>
           <div class="form-group">
              <input type="hidden" class="form-control" id="action" name="action">
          </div><br>
        
        <button type="submit" class="btn btn-primary" name="submitbtn">TAKE ACTION</button>
      </form>
      </div>

    </div>
  </div>

</div>

<!-- end -->
<script src="../js/Filter.js" ></script>
<script>
    $(document).ready(function(){
        $(".btnadd").on("click", function(){
            $("#InfoEdit").modal("show");

            $tr = $(this).closest("tr");

            var id = $(this).data("id");
            $data = $tr.children("td:not(.hidden)").map(function(){
                return $(this).text();
            }).get();

            $("#detail_id").val(id);
            $("#Binfo").val($data[1]);
            $("#Cinfo").val($data[2]);
            $("#status").val($data[3]);
            $("#action").val($data[4]);
        });

    });
</script>
</body>
</html>