
<html lang="en">
  <head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Urbanist&display=swap" rel="stylesheet">
    <title>Telkフォーラム</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://telk.glitch.me/style.css">
  </head>
  <body>
    <div class="main">
      <form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
        <p>ニックネーム</p> 
        <input type="text" name="personal_name" id="name" class="name" required><br><br>
        <p>投稿内容 </p>
        <textarea name="contents" id="form" required></textarea><br><br>
        <input type="submit" value="投稿する">
      </form>
    </div>
    <div class="sub">
      <div class="com" id="com">
      <?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      writeData();
  }
  readData();
  function readData(){
      $cl_file = 'jppl.txt';
      $fp = fopen($cl_file, 'rb');
      if ($fp){
          if (flock($fp, LOCK_SH)){
              while (!feof($fp)) {
                  $buffer = fgets($fp);
                  print($buffer);
              }
              flock($fp, LOCK_UN);
          }else{
              print('Fail File lock!');
          }
      }
      fclose($fp);
  }
  function writeData(){
      $personal_name = $_POST['personal_name'];
      $contents = $_POST['contents'];
      $data = $data."<div class='post'><xmp>@".$personal_name."</xmp>";
      $data = $data."<div class='solid'></div>";
      $data = $data."<p><xmp>".$contents."</xmp></p></div>";
      $cl_file = 'jppl.txt';
      $fp = fopen($cl_file, 'ab');
      if ($fp){
          if (flock($fp, LOCK_EX)){
              if (fwrite($fp,  $data) === FALSE){
                  print('Fail File write!');
              }
              flock($fp, LOCK_UN);
          }else{
              print('Fail File lock!');
          }
      }
      fclose($fp);
  }
      ?>
    </div>
      <div class="solid"></div>
      <p>投稿したと同時に<a href="https://telk.glitch.me/jp/jpgl.php">利用規約</a>に同意したことになります。</p>
      <p>©Copyright BellMe 2020-2021 All Right Reserved.</p>
    </div>
  </body>
</html>