<?php
session_start();
require_once "Dao.php";

if($_SESSION['authenticated'] === true){
    $targetfolder = "music/";

    $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
    
    $ok=1;
    
    $file_type=$_FILES['file']['type'];
    
    if ($file_type=="audio/mpeg3") {
    
    if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
    
    {
    
    echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
    
    }
    
    else {
    
    echo "Problem uploading file";
    
    }
    
    }
    
    else {
    
    echo "You may only upload MP3s.<br>";
    
    }
}else{
    header("Location:login.php");
}


?>