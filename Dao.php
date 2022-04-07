<?php
require_once "User.php";
// Dao.php
class Dao {
  
  private $host = "us-cdbr-east-05.cleardb.net";
  private $db = "heroku_0fbcb350a533112";
  private $user = "b991e131224871";
  private $pass = "43f12b19";

  //setup User objects
  private $userFile = "users.txt";


  public function getConnection () {
    return
      new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
          $this->pass);
  }


  public function newUser($name, $email, $username, $password){
    $conn = $this->getConnection();

    $newUserQuery = 
        "INSERT INTO users
         (actualname, username, pass, email)
         VALUES
         (:actualname, :username, :pass, :email)";

    $q = $conn->prepare($newUserQuery);
    $q->bindParam(":actualname", $name);
    $q->bindParam(":username", $username);
    $q->bindParam(":pass", $password);
    $q->bindParam(":email", $email);
    $q->execute();

  }

  public function newPDF($location, $songName, $author, $description, $date){
    $conn = $this->getConnection();
    
    $newPDfQuery = 
        "INSERT INTO pdfs
         (pdf_location, song_name, song_author, pdf_description, date_added)
         VALUES
         (:pdf_location, :song_name, :song_author, :pdf_description, :date_added)";

    $q = $conn->prepare($newPDfQuery);
    $q->bindParam(":pdf_location", $location);
    $q->bindParam(":song_name", $songName);
    $q->bindParam(":song_author", $author);
    $q->bindParam(":description", $description);
    $q->bindParam(":date_added", $date);
    $q->execute();

  }

 
  public function newMP3($location, $songName, $author, $description, $date){
    $conn = $this->getConnection();
    
    $newMP3Query = 
        "INSERT INTO mp3s
         (mp3_location, song_name, song_author, mp3_description, date_added)
         VALUES
         (:mp3_location, :song_name, :song_author, :mp3_description, :date_added)";

    $q = $conn->prepare($newMP3Query);
    $q->bindParam(":mp3_location", $location);
    $q->bindParam(":song_name", $songName);
    $q->bindParam(":song_author", $author);
    $q->bindParam(":mp3_description", $description);
    $q->bindParam(":date_added", $date);
    $q->execute();

  }


  public function newSong($name, $author, $genre, $description){
    $conn = $this->getConnection();
    
    $newSongQuery = 
        "INSERT INTO songs
         (song_name, song_author, song_genre, song_description)
         VALUES
         (:song_name, :song_author, :song_genre, :song_description)";

    $q = $conn->prepare($newSongQuery);
    $q->bindParam(":song_name", $name);
    $q->bindParam(":song_author", $author);
    $q->bindParam(":song_genre", $genre);
    $q->bindParam(":song_description", $description);
    $q->execute();

  }

  public function newStat($username, $hours, $learned, $uploads, $likes){
    $conn = $this->getConnection();
    
    $newStatQuery = 
        "INSERT INTO stats
         (username, hours_played, songs_learned, songs_uploaded, liked_songs)
         VALUES
         (:username, :hours_played, :songs_learned, :songs_uploaded, :liked_songs)";

    $q = $conn->prepare($newStatQuery);
    $q->bindParam(":username", $username);
    $q->bindParam(":hours_played", $hours);
    $q->bindParam(":songs_learned", $learned);
    $q->bindParam(":songs_uploaded", $uploads);
    $q->bindParam(":liked_songs", $likes);
    $q->execute();

  }

  public function userExists($username, $pass) {
    $conn = $this->getConnection();
    try{
      $q = $conn->prepare("select count(*) as total from users where username = :username and pass = :pass");
      $q->bindParam(":username", $username);
      $q->bindParam(":pass", $pass);
      $q->execute();
      $row = $q->fetch();
      if($row['total'] == 1){
        return true;
      }else{
        return false;
      }
    } catch(Exception $e){
      echo print_r($e, 1);
      exit;
    }
  }
  
  public function saveComment ($comment) {
    $conn = $this->getConnection();
    $saveQuery =
        "INSERT INTO comments
        (comment, username)
        VALUES
        (:comment, :username)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->bindParam(":username", $_SESSION['username']);
    $q->execute();
  }

  public function getComments () {
    $conn = $this->getConnection();
    return $conn->query("SELECT * FROM comments");
  }

  public function savePdf($name, $description, $pdfPath, $author) {
    $conn = $this->getConnection();
    $saveQuery =
        "INSERT INTO pdfs
        (pdf_location, song_name, song_author, pdf_description)
        VALUES
        (:pdf_location, :song_name, :song_author, :pdf_description)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":pdf_location", $pdfPath);
    $q->bindParam(":song_name", $name);
    $q->bindParam(":song_author", $author);
    $q->bindParam(":pdf_description", $description);
    
    $q->execute();
  }

  public function getPdfs ($user) {
    $conn = $this->getConnection();
    $getQuery = "SELECT song_author, song_name, pdf_description, pdf_location FROM pdfs WHERE song_author = :user";
    $q = $conn->prepare($getQuery);
    $q->bindParam(":user", $user);
    $q->execute();
    return reset($q->fetchAll());
  }

  public function saveMpeg ($name, $description, $mpegPath, $author) {
    $conn = $this->getConnection();
    $saveQuery =
        "INSERT INTO mp3s
        (mp3_location, song_name, song_author, mp3_description)
        VALUES
        (:mp3_location, :song_name, :song_author, :mp3_description)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":mp3_location", $mpegPath);
    $q->bindParam(":song_name", $name);
    $q->bindParam(":song_author", $author);
    $q->bindParam(":mp3_description", $description);
    $q->execute();
  }

  public function getMpegs () {
    $conn = $this->getConnection();
    $getQuery = "SELECT mp3_location, song_name FROM mp3s";
    $q = $conn->prepare($getQuery);
    $q->execute();
    return $q->fetchAll();
  }

  public function getSongTitles(){
    $conn = $this->getConnection();
    $getQuery = "SELECT song_name FROM mp3s";
    $q = $conn->prepare($getQuery);
    $q->execute();
    return $q->fetchColumn();
  }

  public function getPath(){
    $conn = $this->getConnection();
    $getQuery = "SELECT mp3_location FROM mp3s";
    $q = $conn->prepare($getQuery);
    $q->execute();
    return $q->fetchColumn();
  }
}