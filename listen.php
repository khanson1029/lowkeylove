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

    <script type="text/javascript">
          $(document).ready(function() {
            var count = false;
            var count = 0;

            $('.active').each(function() {
              var filename = $(this).data('filename');
              var audioElement = document.createElement('audio');

              audioElement.setAttribute('src', filename);

              $('#play' + count).click(function(){
                audioElement.play();
                // I need to put something here to make all the other songs pause/reset //
              });

              $('#pause' + count).click(function(){
                audioElement.pause();
                audioElement.currentTime = 0;
              });

              count++;
            });  
      });
    </script>
    <div id="mp3-playlist">
      <ul id="listen-playlist">
      <?php 
          $dao = new Dao();
          $songArr = $dao->getMpegs();
          echo $songArr['mp3_location'];
          $count = 0;
          foreach($songArr as $song){
        ?>
        <li class="active" data-filename="<?php echo $song['mp3_location'] ?>"> 

                        <div class="audio-player">
                      <div class="timeline">
                        <div class="progress"></div>
                      </div>
                      <div class="controls">
                        <div class="play-container">
                        <button class="stop" id="pause<?php echo $count; ?>"></button>
                        <div class="toggle-play play" id="play<?php echo $count; ?>" >    
                            <audio src="<?php echo $song['mp3_location'];?>" type="audio/mpeg"></source></audio>
                        </div>
                        </div>
                        <!-- <div class="time" id="currentTime">
                          <div class="current">0:00</div>
                          <div class="divider">/</div>
                          <div class="length"></div>
                        </div> -->
                        <div class="name"><?php echo $song['song_name'];?></div> 
                        <div class="volume-container">
                          <div class="volume-button">
                            <div class="volume icono-volumeMedium"></div>
                          </div>
                        </div>
                      </div>
                    </div>
      
        </li>
      <?php $count++; }  ?>
      </ul>
    </div>

<?php require_once 'comments.php'; ?>
<?php require_once 'footer.php'; ?>