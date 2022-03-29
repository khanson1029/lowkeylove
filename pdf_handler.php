<?php
  session_start();
  ini_set('display_errors', 1);
  require_once("Dao.php");

  // save a product, including name, description, and an image path
//   if(isset($_POST["pdfSubmitButton"])){
//     $songname = $_POST['pdfname'];
//     $description = $_POST['pdfdescription'];
//     $author = $_SESSION['username']; 
//   }else{
//       header("Location:myaccount.php");exit;
//   }
  $name = (isset($_POST["name"])) ? $_POST["name"] : "";
  $description = (isset($_POST["description"])) ? $_POST["description"] : "";
  $author = $_SESSION['username'];
  $imagePath = "";
  if (count($_FILES) > 0) {
    if ($_FILES["pdffile"]["error"] > 0) {
      throw new Exception("Error: " . $_FILES["pdffile"]["error"]);
    } else {
      $basePath = "/var/www/cs401_domain/pdfcontent/";
    //   echo print_r($_FILES, 1);
    //   exit;
    //  $imagePath = $_FILES["pdffile"]["name"];
      if (!move_uploaded_file($_FILES["pdffile"]["tmp_name"], $basePath . $imagePath)) {
        throw new Exception("File move failed");
      }
    }
  }
  try{
    $dao = new Dao();
    $dao->savePdf($songname, $description, $imagePath, $author);
  } catch (Exception $e){
      var_dump($e);
        die;
    }
  header("Location:myaccount.php");
  exit;
  