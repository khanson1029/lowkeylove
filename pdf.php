<?php
// products.php
// This page lists products and generates links with an id in the query string
require_once "header.php";
require_once "Dao.php";
$dao = new Dao();
$products = $dao->getPdfs();

?>
<form name="loginForm" action="login_handler.php" method="POST">
    <!-- <div id="user-container">
        <input type="text" name="songname" , placeholder="Song Name">
    </div> -->
    <div id>
        <input type="file" name="file" , size = "50">
    </div>
    <div class="submit-button">
        <input type="submit" name="userSubmitButton" value="Submit">
    </div>
</form>
<?php

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

?>
