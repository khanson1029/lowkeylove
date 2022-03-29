<?php
// handler.php
// handle comment posts, saving to MySQL and redirecting back to the list
require_once "Dao.php";

  if (isset($_POST["userSubmitButton"])) {
    $user = $_POST["user"];

    try {
      $uname = $_POST['username'];
      $realName = $_POST['fullname'];
      $email = $_POST['email'];
      $pass = hash("sha256", $_POST['password'] . "fKd93Vmz!k*dAv5029Vkf9$3Aa");
      $dao = new Dao();
      $dao->newUser($realName, $email, $uname, $pass);
    } catch (Exception $e) {
      var_dump($e);
      die;
    }
   }
  header("Location:login.php");
  ?>
