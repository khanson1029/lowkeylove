
<?php
// login_handler.php
session_start();
require_once("Dao.php");
$username = $_POST["username"];
$password = $_POST["password"];

$dao = new Dao();
$_SESSION['authenticated'] = $dao->userExists($username, $password);

if ("ckennington@gmail.com" == $_POST["username"] &&
    "lollipop" == $_POST["password"]) {
  $_SESSION["access_granted"] = true;
  header("Location:granted.php");

} else {
  $status = "Invalid username or password";
  $_SESSION["status"] = $status;
  $_SESSION["username"] = $_POST["username"];
  $_SESSION["access_granted"] = false;

  header("Location:login.php");
}
?> 