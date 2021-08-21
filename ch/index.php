
<html lang="ch">
  <head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Urbanist&display=swap" rel="stylesheet">
    <title>Telk论坛</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://telk.glitch.me/style.css">
  </head>
  <body>
    <div class="main">
      <form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
        <p>昵称</p> 
        <input type="text" name="personal_name" id="name" class="name" required><br><br>
        <p>文字</p>
        <textarea name="contents" id="form" spellcheck="false" required></textarea><br><br>
        <input type="submit" value="发送帖子">
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
      $cl_file = 'chpl.txt';
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
      $cl_file = 'chpl.txt';
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
      <p>发布即表示您同意<a href="https://telk.glitch.me/ch/chgl.php">使用条款</a>。</p>
      <p>©Copyright BellMe 2020-2021 All Right Reserved.</p>
    </div>
  </body>
</html>