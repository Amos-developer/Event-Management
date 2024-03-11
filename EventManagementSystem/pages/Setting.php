<?php
    require_once("../database/dbconnection.php");
    $page ="setting";
    $Error = "";
    $success = "";
    if(isset($_POST["changebtn"])){
        $oldPassword = $_POST["old"];
        $newPassword = $_POST["new"];
        $comfirmpwd = $_POST["comfirm"];

        if(!empty($oldPassword) || !empty($newPassword) || !empty($comfirmpwd)){

        if(!empty($newPassword) || !empty($comfirmpwd)){

        $sql = "SELECT * FROM Admin WHERE UserName=UserName";

        $result = $conn->query($sql);

        $row = $result->fetch_assoc();
        if($oldPassword != $row["Password"]){
            $Error = "Wrong Old Password";
        }else{
            if($newPassword != $comfirmpwd){
                $Error = "Passwords do not match";
            }else{

                $query_update = "UPDATE Admin SET Password = '$newPassword' WHERE UserName=UserName";

                $res = $conn->query($query_update);

                if($res){
                    $success = "Password updated successfully";
                }else{
                    $success = "Password change failed";
                }
            }
        }

    }else{
        $Error = "The new password can not be empty";
    }

    }
    else{
    $Error = "Fill all the fields";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Setting.css">
    <link rel="icon" href="../asserts/icons/favicon.ico">
    <link rel="stylesheet" href="../css/bootstrap-5.3.0-dist/css/bootstrap.css">
    <script src="../css/bootstrap-5.3.0-dist/js/bootstrap.js" ></script>
    <title>Setting</title>
</head>
<body>
    <?php
        require_once("../pages/Header.php");
    ?>

    <div class="wrapper">
        <div class="content">

            <div class="col-lg-12"  style="border-bottom: 1px solid rgb(16, 16, 123); margin: 10px; width: auto;">
                <h1 style="width: auto; font-size: 2rem; margin: 10px;">Account Setting</h1>
            </div>

            <div class="col-lg-12 eventForm">
                
                <form action="" method="POST">
                    <div class="div_content">
                    <div class="div_head" style="background: #F5F5F5; padding: 5px">
                    <p style="width: auto;">Change Password</p>
                   </div> 
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
                        <label for="oldPwd"><strong>Old Password:</strong></label>
                        <input type="password" class="form-control"  id="oldPwd" name="old">
                    </div>
                    <div class="form-group">
                        <label for="newPwd"><strong>New Password:</strong></label>
                        <input type="password" class="form-control" id="newPwd" name="new">
                    </div>
                    <div class="form-group">
                        <label for="comfirmPwd"><strong>Confirm Password:</strong></label>
                        <input type="password" class="form-control" id="comfirmPwd" name="comfirm">
                    </div>
                    
                    <button type="submit" name="changebtn" class="btn btn-primary" style="margin: 20px;" >Submit</button>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>