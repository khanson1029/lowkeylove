<?php
    // // login_handler.php
    session_start();
    require_once("Dao.php");
    if(isset($_POST["userSubmitButton"])){
      $username = $_POST["username"];
      $password = hash("sha256", $_POST['password'] . "fKd93Vmz!k*dAv5029Vkf9$3Aa");
      $_SESSION['username'] = $username;
    }
    echo "hi";
    $dao = new Dao();
    $_SESSION['authenticated'] = $dao->userExists($username, $password);

    if($_SESSION['authenticated']){
      header("Location:/app/myaccount.php");
      exit;
    }else{
      $_SESSION['authenticated'] = false;
      header("Location:/app/login.php");
      exit;
    }
?> 