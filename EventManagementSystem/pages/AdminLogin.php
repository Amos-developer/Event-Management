<?php
session_start();
require_once("../database/dbconnection.php");
$Error = "";
if(isset($_POST["submit"])){
    $Username = mysqli_real_escape_string($conn,trim($_POST["Uname"]));
    $Password = mysqli_real_escape_string($conn,trim($_POST["pwd"]));
    $Username = stripcslashes($Username);
    $Password = stripcslashes($Password);
    if(empty($Username) || empty($Password)){
        $Error = "All credentials required";
    }
    else{

        $sql = "SELECT * FROM Admin WHERE UserName = '$Username' AND Password = '$Password'";

        $result = $conn->query($sql);

        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $_SESSION['admin'] = $row['UserName'];
            header("Location: ../pages/Dashboard.php");
        }else{
            $Error = "Incorrect Username or Password";
        }
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap-5.3.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../asserts/icons/fontawesome-6.2.1/css/all.css">
    <link rel="stylesheet" href="../css/AdminLogin.css">
    <link rel="icon" href="../asserts/icons/favicon.ico">
    <script src="../css/bootstrap-5.3.0-dist/js/bootstrap.js"></script>
    <script src="../js/jquery-3.6.1.min.js" ></script>
    <title>Login</title>
    <style>
     .myhead{
      margin-top:0px;
      margin-bottom:0px;
      text-align:center;
      }
    </style>
</head>
<body>

<div class="container-fluid login-content">

      <form action="" method="POST">
        <h3 class="myhead">Admin Login</h3>
        <hr />
        <?php
        echo "<p class = 'text-danger text-center'>$Error</p>";
        ?>
        <div class="form-group input-group">
             <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
            <input type="text" class="form-control"  id="Uname" name="Uname" placeholder="Username">
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
            <input type="password" class="form-control"  id="pwd" name="pwd" placeholder="Password">
        </div>
  
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    
    </form>

</div>

</body>
</html>