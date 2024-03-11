<?php
session_start();
error_reporting();
$Error = "";
require_once("../database/dbconnection.php");

if(isset($_POST["submit"])){
$Username = $_POST["Uname"];
$Password = $_POST["pwd"];
$remember = $_POST["remember"];
$Username = stripcslashes($Username);
$Password = stripcslashes($Password);
$Username = mysqli_real_escape_string($conn,trim($Username));
$Password = mysqli_real_escape_string($conn,$Password);

if(isset($remember) && $remember == 1){
   // setcookies
  setcookie("Uname", $Username, time() + 3600 * 24);
  setcookie("Pword", $Password, time() + 3600 * 24);
}else{
  $Error = "Unable to set";
}

if(!empty($Username) && !empty($Password)){

// Query to select the username and password from the database
$sql = "SELECT * FROM CUSTOMERS WHERE UserName = '$Username' AND Password = '$Password'";

// Excute the query
$result = $conn->query($sql);

if($result->num_rows == 1){
  // Fetching the rows and set the session according to id
  $row = $result->fetch_assoc();
  $_SESSION['User'] = $row['id'];
  $_SESSION['name'] = $row['FullName']; 
  header("Location: ../pages/UserProfile.php");
}else{
   $Error = "Invalid Username or Password";
}

}else{
   $Error = "All credentials required";
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
    <link rel="stylesheet" href="../asserts/icons/fontawesome-6.2.1/css/all.css">
    <link rel="stylesheet" href="../css/Login.css">
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
<div class="loder" id="pre-loader">
</div>

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
    </ul>
  </div>
</nav>

<div class="container-fluid login-content">
 <div class="row">
    <div class="col-lg-6">
      
      <form action="" method="POST">
        <h3 class="myhead">User Login</h3>
        <hr />
        <?php
        if($Error!= ""){
          echo '<p class="text-danger text-center">'.$Error.'</p>';
        }
        ?>
        <div class="form-group input-group">
             <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
            <input type="text" class="form-control"  id="Uname" name="Uname"
            value="<?php if(isset($_COOKIE['Uname'])){
              echo $_COOKIE['Uname'];
            } ?>" 
            placeholder="Username">
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
            <input type="password" class="form-control"  id="pwd" name="pwd"
            value="<?php if(isset($_COOKIE['Pword'])){
              echo $_COOKIE['Pword'];
            } ?>" placeholder="Password">
        </div>
        <input type="checkbox" name="remember" value="1"> Remember Me<br><br>
  
        <button type="submit" class="btn btn-primary" name="submit" onclick="Load()" id="press"  >Submit</button>
        <p>Don't have an account?<a href="../pages/Venues.php" style="text-decoration: none"> Sign Up </a></p>
    </form>
    </div>

    <div class="col-lg-6 col-category">
      <div class="event-category">
        <P style="text-align: center;" ><strong>EVENT CATEGORY</strong></P>
        <p class="category-name">Sport Events</p>
        <p class="category-name">Music Events</p>
        <p class="category-name">Busiiness Events</p>
      </div>
    </div>
    <!--End of row  -->
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
</body>
</html>