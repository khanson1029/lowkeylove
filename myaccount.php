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
        <h4><a href="pdf.php" , class="pdf-upload">Upload Your Sheet Music</a></h4>
    </div>
    <div class="post-title" id="Login2">
        <h4><a href="pdf.php" , class="pdf-upload">Upload Your MP3s</a></h4>
    </div>
    <div class="pie-text-div">       
        <h2 class="post-title-login" id="pie1"># hours played!</h2>
        <h2 class="post-title-login" id="pie2"># songs mastered!</h2>
    </div>
    <div class="pie">
        <div class="piechart"></div>
        <div class="piechart2"></div>
    </div>
<?php require_once 'footer.php'; ?>