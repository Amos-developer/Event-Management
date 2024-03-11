<?php
$page = "Logout";
session_start();
session_unset();
session_destroy();
header("Location: ../pages/AdminLogin.php");
