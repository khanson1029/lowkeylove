<?php
session_start();
require_once "Dao.php";

if($_SESSION['authenticated'] === true){
    $targetfolder = "pdfcontent/";

    $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
    
    $ok=1;
    
    $file_type=$_FILES['file']['type'];
    
    if ($file_type=="application/pdf") {
    
    if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
    
    {
    
    echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
    
    }
    
    else {
    
    echo "Problem uploading file";
    
    }
    
    }
    
    else {
    
    echo "You may only upload PDFs.<br>";
    
    }
}else{
    header("Location:login.php");
}


?>