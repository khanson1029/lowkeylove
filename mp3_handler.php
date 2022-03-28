<?php
  // product/upload.php
  require_once "Dao.php";
  $dao = new Dao();

  // save a product, including name, description, and an image path
  $name = (isset($_POST["mpegsongname"])) ? $_POST["mpegsongname"] : "";
  $description = (isset($_POST["mpegsongdescription"])) ? $_POST["mpegsongdescription"] : "";

  $imagePath = "";
  if (count($_FILES) > 0) {
    if ($_FILES["mpegfile"]["error"] > 0) {
      throw new Exception("Error: " . $_FILES["file"]["error"]);
    } else {
      $basePath = "/var/www/cs401_domain";
      $imagePath = "/music" . $_FILES["mpegfile"]["mpegsongname"];
      if (!move_uploaded_file($_FILES["mpegfile"]["tmp_name"], $basePath . $imagePath)) {
        throw new Exception("File move failed");
      }
    }
  }
  $dao->saveMpeg($name, $description, $imagePath);
  header("location:https://lowkeylove.herokuapp.com/myaccount.php");
  ?>