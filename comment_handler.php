<?php
// handler.php
// handle comment posts, saving to MySQL and redirecting back to the list
session_start();
require_once "Dao.php";

  if (isset($_POST["commentButton"])){
    if($_SESSION['authenticated'] === true){
      $comment = $_POST["comment"];
      try {
        $dao = new Dao();
        $dao->saveComment($comment);
      } catch (Exception $e) {
        var_dump($e);
        die;
      }
      header("Location:index.php");
    }else{
      header("Location:login.php");
    }

   }
  