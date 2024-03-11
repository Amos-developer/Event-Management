<?php
session_start();
$Admin = $_SESSION["admin"];
if(!isset($Admin)){
    header("Location: ../pages/AdminLogin.php");
}

