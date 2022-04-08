<?php
    session_start();
    require_once "Dao.php";
    // if(!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']){
    //         header("Location:login.php");
    // }
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

    <!-- <script type="text/javascript">
          $(document).ready(function() {
          
          var files = document.getElementById("active");
          var audioElement = document.createElement('audio');
          audioElement.setAttribute('src', files.);
          
          audioElement.addEventListener('ended', function() {
              this.play();
          }, false);
          
          audioElement.addEventListener("timeupdate",function(){
              $("#currentTime").text(audioElement.currentTime);
          });
          
          $('#play').click(function() {
              audioElement.play();
              $("#status").text("Status: Playing");
          });
          
          $('#pause').click(function() {
              audioElement.pause();
              $("#status").text("Status: Paused");
          });
          

      });
    </script> -->
    <script type="text/javascript">
       $(document).ready(function(){
      
       $("#play").click(function(){
        nav_audio.play();
       },
      function(){
         nav_audio.load();
        });
       });
    </script>
    <div id="mp3-playlist">
      <ul id="playlist">
      <?php 
                  $dao = new Dao();
                  $songArr = $dao->getMpegs();
                  echo $songArr['mp3_location'];
                  foreach($songArr as $song){
        ?>
        <li class = "active"> 

                        <div class="audio-player">
                      <div class="timeline">
                        <div class="progress"></div>
                      </div>
                      <div class="controls">
                        <div class="play-container">
                        <button id="pause"></button>
                        <div class="toggle-play play" id="play">    
                                <a class="mp3-listen-object-container" href="
                                  <?php echo $song['mp3_location'];?>">
                                      <audio id="nav_audio">
                                          <source src="<?php echo $song['mp3_location'];?>" type="audio/mpeg"></source>
                                      </audio>
                                </a>
                        </div>
                        </div>
                        <div class="time" id="currentTime">
                          <div class="current">0:00</div>
                          <div class="divider">/</div>
                          <div class="length"></div>
                        </div>
                        <div class="name"><?php echo $song['song_name'];?></div> 
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
      
        </li>
      <?php }  ?>
      </ul>
    </div>

<?php require_once 'comments.php'; ?>
<?php require_once 'footer.php'; ?>