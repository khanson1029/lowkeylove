<?php require_once 'header.php'; ?>
    <div class="highlight-posts">
        <section role="main">
            <article id="post-of-the-day">
                <header>
                    <h1 class="post-title-login" id="Login1">
                            MY ACCOUNT
                    </h1>
                    <h2 class="post-title-login" id="Login2">Create Your Account</h2>
                </header>
            </article>
        </section>
    </div>
    <form name="signUpForm" action="signuphandler.php" method="POST">
      <div id="name-container">
        <input type="text" name="username", placeholder="Full Name">
      </div>
      <div id="email-container">
        <input type="text" name="email", placeholder="Email">
      </div>
      <div id="user-container">
        <input type="text" name="username", placeholder="Username">
      </div>
      <div id="password-container">
        <input type="text" name="password", placeholder="Password">
      </div>
      <div class="submit-button">
        <input type="submit" name="userSubmitButton" value="Submit">
      </div>
    </form>
    <div class="horizontal-rule-div"></div>
    <div id="Login1">
        <h3>Want to stay up to date on new songs?</h3>
    </div>
    <form name="autoEmailForm" action="emailhandler.php" method="POST">
      <div id="email-container">
          <input type="text" name="email", placeholder="Email">
      </div>
      <div class="submit-button">
        <input type="submit" name="userSubmitButton" value="Submit">
      </div>
    </form>
<?php require_once 'footer.php'; ?>