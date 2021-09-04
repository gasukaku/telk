<html>
  <head>
    <meta charset="utf-8">
    <title>ボドネ検索</title>
    <link rel="stylesheet" href="https://telk.glitch.me/main/style.css">
  </head>
  <body>
    <h1 class="logo">ボドネ検索</h1>
    <?php
    $result = array_filter(glob("chatlog/*.txt"));
    $resultall;
    foreach($result as $rs){
      $resultall = substr($rs,8,strlen($rs));
      $resultall = substr($resultall,0,strlen($resultall)-4);
      if(strpos($resultall,$_GET["text"]) !== false){
        echo '<a class="a" href="https://telk.glitch.me/main/chat.php?room='.$resultall.'">'.$resultall."</a><br>";
      }
    }
    ?>
  </body>
</html>