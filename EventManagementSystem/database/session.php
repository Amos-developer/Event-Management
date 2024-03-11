<?php
session_start();
$User_ID = $_SESSION['User'];
if(!isset($User_ID)){
    header("Location: ../pages/Login.php");
}
?>