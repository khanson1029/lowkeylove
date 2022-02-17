<?php
// handler.php
// handle comment posts, saving to MySQL and redirecting back to the list
require_once "Dao.php";

  if (isset($_POST["userSubmitButton"])) {
    $comment = $_POST["comment"];

    try {
      $dao = new Dao();
      $dao->saveComment($comment);
    } catch (Exception $e) {
      var_dump($e);
      die;
    }
   }
  header("Location:myaccount.php");