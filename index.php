
<html>
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <title>Telkフォーラム</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://telk.glitch.me/style.css">
    <script type="text/javascript" src="https://telk.glitch.me/script.js"></script>
  </head>
  <body>
    <div class="main">
      <p>Telkフォーラム</p>
      <form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
        名前 <input type="text" name="personal_name" required><br><br>
        <p>投稿内容 </p>
        <textarea name="contents" required></textarea><br><br>
        <input type="submit" name="btn1" value="投稿する">
      </form>
    </div>
    <div class="wake"></div>
    <div class="sub">
      <?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      writeData();
  }
  readData();
  function readData(){
      $cl_file = 'cl.txt';
      $fp = fopen($cl_file, 'rb');
      if ($fp){
          if (flock($fp, LOCK_SH)){
              while (!feof($fp)) {
                  $buffer = fgets($fp);
                  print($buffer);
              }
              flock($fp, LOCK_UN);
          }else{
              print('ファイルロックに失敗しました');
          }
      }
      fclose($fp);
  }
  function writeData(){
      $personal_name = $_POST['personal_name'];
      $contents = $_POST['contents'];
      $contents = nl2br($contents);
      $data = $data."<div class='post'><p>投稿者:".$personal_name."</p>\r\n";
      $data = $data."<div class='solid'></div>\r\n";
      $data = $data."<p>".$contents."</p>\r\n</div>";
      $keijban_file = 'cl.txt';
      $fp = fopen($keijban_file, 'ab');
      if ($fp){
          if (flock($fp, LOCK_EX)){
              if (fwrite($fp,  $data) === FALSE){
                  print('ファイル書き込みに失敗しました');
              }
              flock($fp, LOCK_UN);
          }else{
              print('ファイルロックに失敗しました');
          }
      }
      fclose($fp);
  }
      ?>
      <div class="solid"></div>
      <p>容量の問題もあるので、ここに書かれたコメントは予告なく削除される場合もあります</p>
      <p>©Copyright BellMe 2020-2021 All Right Reserved.</p>
    </div>
  </body>
</html>