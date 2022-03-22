<?php
    // // login_handler.php
    session_start();
    require_once("Dao.php");
    if(isset($_POST["userSubmitButton"])){
      $username = $_POST["username"];
      $password = $_POST["password"];
      //hash("sha256", $_POST['password'] . "fKd93Vmz!k*dAv5029Vkf9$3Aa");
    }

    $dao = new Dao();
    $_SESSION['authenticated'] = $dao->userExists($username, $password);

    if($_SESSION['authenticated']){
      header("Location:welcome.php");
      exit;
    }else{
      $_SESSION['authenticated'] = false;
      header("Location:login.php");
      exit;
    }
?> 
<?php
// login_handler.php
// session_start();
// $dao = new Dao();
// // For simplification Lets pretend I got these login credentials from an SQL table.
// if ($dao->userExists($_POST["username"], $_POST["password"])) {
//   $_SESSION["authenticated"] = true;
//   header("Location:welcome.php");

// } else {
//   $_SESSION["authenticated"] = false;

//   header("Location:login.php");
// }
?> 