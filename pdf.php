<?php
// products.php
// This page lists products and generates links with an id in the query string
session_start();
require_once "header.php";

?>
<form name="pdfForm" action="pdf_handler.php" method="POST">
    <div id = Login2>
        <input type="file" name="file" , size = "50">
    </div>
    <div class="submit-button">
        <input type="submit" name="userSubmitButton" value="Submit">
    </div>
</form>

