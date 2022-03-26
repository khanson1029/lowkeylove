<?php
// products.php
// This page lists products and generates links with an id in the query string
require_once "header.php";
require_once "Dao.php";
$dao = new Dao();
$products = $dao->getPdfs();

?>
<form name="loginForm" action="login_handler.php" method="POST">
    <div id="user-container">
        <input type="text" name="username" , placeholder="Song Name">
    </div>
    <div id>
        <input type="text" name="password" , placeholder="Description">
    </div>
    <div class="submit-button">
        <input type="submit" name="userSubmitButton" value="Submit">
    </div>
</form>