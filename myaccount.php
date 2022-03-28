<?php 
    session_start();
    require_once 'header.php';
    require_once 'Dao.php';
    if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] === false){
        header("Location:login.php");
    } ?>
    <div class="highlight-posts">
        <section role="main">
            <article id="post-of-the-day">
                <header>
                    <h1 class="post-title-login" id="Login1">
                            MY ACCOUNT
                    </h1>
                </header>
            </article>
        </section>
    </div>
    <div class="post-title" id="Login2">
        <h4 class="pdf-upload">Upload Your Sheet Music</h4>
    </div>
    <form name="pdfForm" action="pdf_handler.php" method="POST">
    <div id = Login2>
        <input type="file" name="file" , size = "50">
    </div>
    <div class="submit-button">
        <input type="submit" name="userSubmitButton" value="Submit">
    </div>
    </form>
    <div class="post-title" id="Login2">
        <h4 class="mp3-upload">Upload Your MP3s</h4>
    </div>
    <form name="mp3Form" action="mp3_handler.php" method="POST">
    <div id = Login2>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div>
          <label for="name">Product Name:</label>
          <input type="text" name="name"/>
        </div>
        <div>
        <label for="name">Product Description:</label>
        <input type="text" name="description"/>
        </div>
        <div>
          <label for="file">Image:</label>
          <input type="file" name="file" id="file"><br>
          <input type="submit" name="submit" value="Submit">
        </div>
     </form>
    </div>
    <div class="submit-button">
        <input type="submit" name="userSubmitButton" value="Submit">
    </div>
    </form>
    <div class="pie-text-div">       
        <h2 class="post-title-login" id="pie1"># hours played!</h2>
        <h2 class="post-title-login" id="pie2"># songs mastered!</h2>
    </div>
    <div class="pie">
        <div class="piechart"></div>
        <div class="piechart2"></div>
    </div>
<?php require_once 'footer.php'; ?>