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
        <h4 class="mp3-upload">My Sheets</h4>
    </div>
    <div class="post-title" id="Login2">
        <h4 class="pdf-upload">No Sheets? Upload!</h4>
    </div>
    <div id = "Login1">
        <form action="pdf_handler.php" method="POST" enctype="multipart/form-data">
        <div id="Login2">
            <input type="text" name="pdfname", placeholder="Song Name"/>
        </div>
        <div id="Login2">
            <input type="text" name="pdfdescription", placeholder="Description"/>
        </div>
        <div id="Login2">
             <input type="file" name="pdffile" id="pdffile"><br>
        </div>
        <div class="submit-button">
            <input type="submit" name="pdfSubmitButton" value="Submit">
        </div>
     </form>
    </div>

    </form>
    <div class="post-title" id="Login2">
        <h4 class="mp3-upload">My Songs</h4>
    </div>
    <ul id="myaccount-playlist">
        <?php 
            $dao = new Dao();
            $songArr = $dao->getMpegs();
            echo $songArr['mp3_location'];
            $count = 0;
            if(!empty($songArr)){
                foreach($songArr as $song){
                    echo '<li class="active1"> 
                                <a href="listen.php">' . $song['song_name'] . '</a>
                          </li>';
                }
            }else{
                echo '<li class="active2"> <a href="myaccount.php">Nothing Here Yet!</a></li>';
            }
            ?>
    </ul>
    <div class="post-title" id="Login2">
        <h4 class="mp3-upload">No Songs? Upload!</h4>
    </div>
    <div id = "Login1">
        <form action="mp3_handler.php" method="POST" enctype="multipart/form-data">
        <div id="Login2">
            <input type="text" name="mpegsongname", placeholder="Song Name"/>
        </div>
        <div id="Login2">
            <input type="text" name="mpegsongdescription", placeholder="Description"/>
        </div>
        <div id="Login2">
            <input type="file" name="mpegfile" id="mpegfile"><br>
        </div>
        <div class="submit-button">
            <input type="submit" name="mpegSubmitButton" value="Submit">
        </div>
     </form>
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