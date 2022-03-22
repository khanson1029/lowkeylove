<?php

session_start();
require_once("header.php");
  if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"]) {
    header("Location:welcome.php");
  }

  $username = "";
  if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
  }
?>
<div class="highlight-posts">
    <section role="main">
        <article id="post-of-the-day">
            <header>
                <h1 class="post-title-login" id="Login1">
                    MY ACCOUNT
                </h1>
                <h2 class="post-title-login" id="Login2">
                    Login:
                </h2>
            </header>
        </article>
    </section>
</div>
<form name="loginForm" action="login_handler.php" method="POST">
    <div id="user-container">
        <input type="text" name="username" , placeholder="Username">
    </div>
    <div id>
        <input type="text" name="password" , placeholder="Password">
    </div>
    <div class="submit-button">
        <input type="submit" name="userSubmitButton" value="Submit">
    </div>
</form>
<div class="horizontal-rule-div"></div>
<div id="Login2">
    <h3>Don't have an account?</h3>
</div>
<div class="post-title" id="Login2">
    <h4><a href="signup.php" , class="signup">Create one</a></h4>
</div>
<?php require_once 'footer.php'; ?>