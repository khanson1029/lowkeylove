<?php
  // product/upload.php
  require_once "Dao.php";
  $dao = new Dao();

  // save a product, including name, description, and an image path
  if(isset($_POST["pdfSubmitButton"])){
    $name = $_POST['pdfname'];
    $description = $_POST['pdfdescription'];
    $author = $_SESSION['username']; 
  }else{
      header("Location:myaccount.php");exit;
  }

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
  $dao->savePdf($name, $description, $imagePath, $author);
  header("Location:myaccount.php");
  exit;
  ?>