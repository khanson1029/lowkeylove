<?php
// granted.php
require_once("header.php");
session_start();

if (isset($_SESSION["access_granted"]) && !$_SESSION["access_granted"] ||
   !isset($_SESSION["access_granted"])) {
  $_SESSION["status"] = "You need to log in first";
  header("Location:login.php");
}

echo "ACCESS GRANTED";
require_once("footer.php");
?>
  

