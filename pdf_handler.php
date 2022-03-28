<?php
  // product/upload.php
  require_once "Dao.php";
  $dao = new Dao();

  // save a product, including name, description, and an image path
  $name = (isset($_POST["pdfname"])) ? $_POST["pdfname"] : "";
  $description = (isset($_POST["pdfdescription"])) ? $_POST["pdfdescription"] : "";

  $imagePath = "";
  if (count($_FILES) > 0) {
    if ($_FILES["pdffile"]["error"] > 0) {
      throw new Exception("Error: " . $_FILES["pdffile"]["error"]);
    } else {
      $basePath = "/var/www/cs401_domain";
      $imagePath = "/pdfcontent" . $_FILES["pdffile"]["pdfname"];
      if (!move_uploaded_file($_FILES["pdffile"]["tmp_name"], $basePath . $imagePath)) {
        throw new Exception("File move failed");
      }
    }
  }
  $dao->savePdf($name, $description, $imagePath);
  header("Location:myaccount.php");
  ?>