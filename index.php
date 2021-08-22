<html>
  <head>
    <meta charset="utf-8">
    <title>掲示板</title>
    <link rel="stylesheet" href="https://telk.glitch.me/style.css">
  </head>
  <body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      writeData();
    }
    
    readData();
    
    function readData(){
      $log_file = "log.txt";
      
      $fp = fopen(log_file,"rb");
      
      if($fp){
        if(flock($fp, LOCK_SH)){
          while(!feof($fp)){
            $buffer = fgets($fp);
            print($buffer);
          }
          
          flock($fp,LOCK_UN);
        }else{
          print("Fail to file lock!");
        }
        }
      }
    }
    function writeData(){
      $name = $_POST["name"];
      $text = $_POST["text"];
      
      $data = $data."<div class='post'><p class='namespace'>投稿者：".$name."</p>";
      $data = $data."<p class='textspace'>".$text."</p></div>";
      
      $log_file = "log.txt";
      
      $fp = fopen($log_file,"ab");
      
      if($fp){
        
      }
    }
    ?>
    <form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
      <input type="text" class="name bdr" name="name" value="" placeholder="名前を入力"><br>
      <textarea placeholder="コメントを入力" spellcheck="false" name="text" class="text bdr"></textarea><br>
      <input type="submit" value="投稿する" class="in">
    </form>
  </body>
  <script type="text/javascript" src="https://telk.glitch.me/script.js"></script>
</html>