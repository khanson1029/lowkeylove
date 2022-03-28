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
     </form>
    </div>
    <div class="submit-button">
        <input type="submit" name="pdfSubmitButton" value="Submit">
    </div>
    </form>
    <div class="post-title" id="Login2">
        <h4 class="mp3-upload">Upload Your MP3s</h4>
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
     </form>
    </div>
    <div class="submit-button">
        <input type="submit" name="mpegSubmitButton" value="Submit">
    </div>
    <div class="post-title" id="Login2">
        <h4 class="mp3-upload">Your MP3s</h4>
    </div>
    <ul id="playlist">
        <li class="active">
            <a href="https://www.archive.org/download/bolero_69/Bolero.mp3">
                    Ravel Bolero
            </a>
        </li>
        <li>
            <a href="https://www.archive.org/download/MoonlightSonata_755/Beethoven-MoonlightSonata.mp3">
                    Moonlight Sonata - Beethoven
            </a>
        </li>
        <li>
            <a href="https://www.archive.org/download/CanonInD_261/CanoninD.mp3">
                    Canon in D Pachabel
            </a>
        </li>
        <li>
            <a href="https://www.archive.org/download/PatrikbkarlChamberSymph/PatrikbkarlChamberSymph_vbr_mp3.zip">
                    patrikbkarl chamber symph
            </a>
        </li>
    </ul>

    <div class="pie-text-div">       
        <h2 class="post-title-login" id="pie1"># hours played!</h2>
        <h2 class="post-title-login" id="pie2"># songs mastered!</h2>
    </div>
    <div class="pie">
        <div class="piechart"></div>
        <div class="piechart2"></div>
    </div>
<?php require_once 'footer.php'; ?>