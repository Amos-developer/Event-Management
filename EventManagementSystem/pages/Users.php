<?php
require_once("../database/dbconnection.php");
$page = "manageusers";

if(isset($_GET["id"])){
    $id = $_GET["id"];

    $sql = "DELETE FROM CUSTOMERS WHERE id = '$id'";
    $res = $conn->query($sql);

    if ($res) {
        header('Location: ../pages/Users.php');
    } else {
        echo "Error deleting record: " . $conn->error;
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
    <script src="../css/bootstrap-5.3.0-dist/js/bootstrap.js"></script>
    <script src="../js/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" href="../css/Users.css">
    <title>Users</title>
</head>
<body>
    <?php
        require_once("../pages/Header.php");
    ?>

    <div class="wrapper">

        <div class="content">

           <div class="heading" style="border-bottom: 1px solid rgb(16, 16, 123); margin: 10px;">
             <h1 class="listhead" style="width: auto; font-size: 2rem; margin: 10px;">Manage Users</h1>
             <button class="btn btn-primary " id="btnadd" style="margin: 10px; padding: 4px 60px;"
              data-bs-toggle="modal" data-bs-target="#AddNew">+ Add</button>
           </div>
           
        <div class="infomations" style="margin: 10px; border: 2px solid #DDDDDD;">
           <div class="table-head" style="background: #F5F5F5; padding: 5px" >
                <p style="width: auto;">Manage Users</p>
            </div> 

            <p class="filter-options" style="margin: 15px; font-size: 13px;">Show<span>
                    <select>
                        <option value="1">10</option>
                        <option value="2">20</option>
                        <option value="3">30</option>
                        <option value="4">40</option>
                    </select>
            </span>entries</p>
            <div class="table-responsive-sm info">    

                <table class="table table-bordered table-striped" id="UserTable" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fullname</th>
                            <th>User name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once("../database/dbconnection.php");

                            // Query to select all the users
                            $sql = "SELECT * FROM CUSTOMERS";

                            // Execute the query
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                               $count = 1;                               
                                while($row = $result->fetch_assoc()){
                                    echo "<tr><td class='hidden'>".$row['id']."</td><td>"
                                    .$count."</td><td>"
                                    .$row['FullName']."</td><td>"
                                    .$row['UserName']."</td><td>"
                                    .$row['Email']."</td><td>"
                                    .$row['Phone']."</td><td>"
                                    .$row['Gender']."</td><td>"
                                    .$row['Password']."</td><td>"
                                    ."<a class='btn btn-danger' onclick = 'deleteConfirm($row[id])' style = 'margin: 2px; padding: 2px 10px; border-radius: 50%' href='#'>
                                    <i class = 'fas fa-trash-alt'></i></a>
                                      <a class='btn btn-primary btnOpen' data-id='$row[id]' name = 'Edit' 
                                      style = 'margin: 2px; padding: 2px 10px; border-radius: 50%' href='#'><i class = 'fas fa-edit'></i></a>"
                                    ."</td></tr>";
                                    $count++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>

            </div>
        </div>
    </div>

    <!--  -->
<!-- The Modal -->
<div class="modal fade" id="Edit" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">

  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="modal-title">Edit User details</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"
        onclick="window.location.href = '../pages/Users.php'">&times;</button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
      
        <form action="" method="POST" name="form" id="updateForm">
          <div class="form-group">
              <input type="hidden" class="form-control" id="Update_id" name="Update_id">
          </div>
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="message_body">
                    <p id="message"></p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
          <div class="form-group">
            <label for="Fname"><strong>Fullname</strong></label>
              <input type="text" class="form-control" id="Fname" name="Fname">
          </div>

          <div class="form-group">
            <label for="Uname"><strong>Username</strong></label>
              <input type="text" class="form-control" id="Uname" name="Uname">
          </div>

         <div class="form-group">
            <label for="Email"><strong>Email</strong></label>
              <input type="email" class="form-control" id="Email" name="Email">
         </div>
          <div class="form-group">
            <label for="Phone"><strong>Phone</strong></label>
              <input type="tel" class="form-control" id="Phone" name="Phone" maxlength="10" pattern="[0-9]{10}">
         </div><br>
          <div class="form-group">
            <label for="Gender"><strong>Gender</strong></label>
              <input type="radio" value="Male" name="Gender" checked><strong>Male</strong>
              <input type="radio" value="Female" name="Gender"><strong>Female</strong>
              <input type="radio" value="Others" name="Gender"> <strong>Others</strong>
         </div><br>
          <div class="form-group">
            <label for="Password"><strong>Password</strong></label>
              <input type="password" class="form-control" id="Password" name="Password">
         </div>

        <button type="submit" class="btn btn-primary" name="Updatebtn" id="Updatebtn">SAVE CHANGES</button>
       </form>
      </div>

    </div>
  </div>

</div>

<!-- The Modal -->
<div class="modal fade" id="AddNew" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="modal-title">Add New User</h4>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close" 
         onclick="window.location.href = '../pages/Users.php'">&times;</button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <form action="" method="POST" name="form" id="form">
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="myAlert">
                <strong id="text"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           <div class="form-group">
            <label for="Fullname"><strong>Fullname:</strong></label>
              <input type="text" class="form-control" id="Fullname" name="Fullname">
          </div>
          <div class="form-group">
            <label for="Username"><strong>Username:</strong></label>
              <input type="text" class="form-control" id="Username" name="Username">
          </div>
          <div class="form-group">
            <label for="mail"><strong>Email</strong></label>
              <input type="email" class="form-control" id="mail" name="mail">
          </div><br>
          <div class="form-group">
            <label for="pnumber"><strong>Phone</strong></label>
              <input type="tel" class="form-control" id="ptel" name="pnumber" maxlength="10" pattern="[0-9]{10}" >
          </div><br>
           <div class="form-group">
            <label for="gender"><strong>Gender</strong></label>
              <input type="radio" value="Male" name="gender" checked><strong>Male</strong>
              <input type="radio" value="Female" name="gender"><strong>Female</strong>
              <input type="radio" value="Others" name="gender"> <strong>Others</strong>
         </div><br>
         <div class="form-group">
            <label for="pass"><strong>Password</strong></label>
              <input type="password" class="form-control" id="pass" name="pass">
         </div>

          <hr>
        <button type="submit" class="btn btn-primary">Add User</button>

      </form>
      </div>
    </div>
  </div>
</div>

<script src="../ajax/Edit.js" ></script>
<script src="../ajax/AddNew.js"></script>
<script>
    $(document).ready(function (){
      
        $(".btnOpen").on("click", function (e){
            e.preventDefault();
            $("#Edit").modal("show");

            $tr = $(this).closest("tr");

            var id = $(this).data("id");
            var data = $tr.children("td:not(.hidden)").map( function (){
                return $(this).text();
            }).get();

            $("#Update_id").val(id);
            $("#Fname").val(data[1]);
            $("#Uname").val(data[2]);
            $("#Email").val(data[3]);
            $("#Phone").val(data[4]);
            $("#Gender").val(data[5]);
            $("#Password").val(data[6]);
            
            
        });

        $("#updateForm").on("submit", function(e){
          e.preventDefault();
          this.reset();
          setTimeout(()=>{
             $("#Edit").modal("hide");
          }, 2000);
        });
    });

    function deleteConfirm(deleteId) {
      if(confirm('Are you sure you want to delete this user?')){
          window.location.href = "../pages/Users.php?id=" + deleteId;
      }
    }
</script>

</body>
</html>