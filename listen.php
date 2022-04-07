<?php
    session_start();
    require_once "Dao.php";
    if(!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']){
            header("Location:login.php");
    }
?>

<?php require_once 'header.php'; ?>
    <div class="highlight-posts">
        <section role="main">
            <article id="post-of-the-day">
                <header>
                    <h1 class="post-title">
                            Current Songs
                    </h1>
                </header>
            </article>
        </section>
    </div>
    
    <div class="audio-player">
      <div class="timeline">
        <div class="progress"></div>
      </div>
      <div class="controls">
        <div class="play-container">
          <div class="toggle-play play">
        </div>
        </div>
        <div class="time">
          <div class="current">0:00</div>
          <div class="divider">/</div>
          <div class="length"></div>
        </div>
        <div class="name">Music Song</div>
    <!--     credit for icon to https://saeedalipoor.github.io/icono/ -->
        <div class="volume-container">
          <div class="volume-button">
            <div class="volume icono-volumeMedium"></div>
          </div>
          
          <div class="volume-slider">
            <div class="volume-percentage"></div>
          </div>
        </div>
      </div>
    </div>
    <script  src="js/player.js"></script>
    <div id="mp3-playlist">
      <ul id="playlist">
                <li class="active" id="<?php $i;?>"> 
                  <?php
                   $songNames = array();
                   $songNames[] = $_SESSION["songnames"];

                    foreach($songNames as $song){?>
                      <a class="mp3-listen-object-container" href="
                          <?php echo $song;?>">
                      </a>
                    <?php } ?>
                </li>
      </ul>
    </div>

<?php require_once 'comments.php'; ?>
<?php require_once 'footer.php'; ?>