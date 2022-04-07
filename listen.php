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

    <script type="text/javascript">
      $(document).ready(function(){
      $("a").hover(function(){
        nav_audio.play();
        },
      function(){
        nav_audio.load();
        });
      });
    </script>

    <div id="mp3-playlist">
      <ul id="playlist">
        <li class = "active"> 
              <audio id="nav_audio">
                  <source src="/music/Watercolors.mp3" type="audio/mpeg"></source>
              </audio>
          <!-- <a href="/music/Watercolors.mp3">Watercolors
              <audio id="nav_audio">
                  <source src="/music/Watercolors.mp3" type="audio/mpeg"></source>
              </audio>
          </a> -->
        <?php 
                  $dao = new Dao();
                  $songArr = $dao->getMpegs();
                  echo $songArr['mp3_location'];
                  foreach($songArr as $song){
        ?>
              <a class="mp3-listen-object-container" href="

              <?php echo $song['mp3_location'];?>">
              <?php echo $song['song_name'];?>
                    <audio id="nav_audio">
                        <source src="<?php echo $song['mp3_location'];?>" type="audio/mpeg"></source>
                    </audio>
            </a>
          <?php }  ?>
        </li>
      </ul>
    </div>

<?php require_once 'comments.php'; ?>
<?php require_once 'footer.php'; ?>