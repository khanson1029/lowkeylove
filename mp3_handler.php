<?php
  session_start();
  ini_set('display_errors', 1);
  ini_set('upload_max_filesize', '10M');
  echo ini_get('upload_max_filesize'), ", " , ini_get('post_max_size');
  require_once "Dao.php";

  // save a product, including name, description, and an image path
  $songname = (isset($_POST["mpegsongname"])) ? $_POST["mpegsongname"] : "";
  $description = (isset($_POST["mpegsongdescription"])) ? $_POST["mpegsongdescription"] : "";
  $author = $_SESSION['username'];
  $imagePath = "";
  $_SESSION['songnames'] += $_POST["mpegsongname"]; 
  if (count($_FILES) > 0) {
    echo print_r($_FILES, 1);
    // exit;
    if ($_FILES["mpegfile"]["error"] > 0) {
      throw new Exception("Error: " . $_FILES["mpegfile"]["error"]);
    } else {
      $basePath = "/app/";

      $imagePath = "music/" . $_FILES["mpegfile"]["name"];
      if (!move_uploaded_file($_FILES["mpegfile"]["tmp_name"], $basePath . $imagePath)) {
        throw new Exception("File move failed");
      }
    }
  }
  try{
    $dao = new Dao();
    $dao->saveMpeg($songname, $description, $imagePath, $author);
  } catch (Exception $e){
    var_dump($e);
      die;
  }

  header("Location:myaccount.php");
  exit;