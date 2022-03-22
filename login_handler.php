<!-- <?php
    // // login_handler.php
    // session_start();
    // require_once("Dao.php");
    // if(isset($_POST["userSubmitButton"])){
    //   $username = $_POST["username"];
    //   $password = hash("sha256", $_POST['password'] . "fKd93Vmz!k*dAv5029Vkf9$3Aa");
    // }

    // $dao = new Dao();
    // $_SESSION['authenticated'] = $dao->userExists($username, $password);

    // if($_SESSION['authenticated']){
    //   header("Location:welcome.php");
    //   exit;
    // }else{
    //   $_SESSION['authenticated'] = false;
    //   header("Location:login.php");
    //   exit;
    // }
?>  -->
<?php
// login_handler.php
session_start();

// For simplification Lets pretend I got these login credentials from an SQL table.
if ("ckennington@gmail.com" == $_POST["email"] &&
    "lollipop" == $_POST["password"]) {
  $_SESSION["access_granted"] = true;
  header("Location:granted.php");

} else {
  $status = "Invalid username or password";
  $_SESSION["status"] = $status;
  $_SESSION["email_preset"] = $_POST["email"];
  $_SESSION["access_granted"] = false;

  header("Location:login.php");
}
?> 