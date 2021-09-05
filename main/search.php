<html>
  <head>
    <meta charset="utf-8">
    <title>ボドネ検索：<?php print($_GET["text"]) ?></title>
    <link rel="stylesheet" href="https://telk.glitch.me/main/style.css">
  </head>
  <body>
    <input id="SearchText" class="sendName" type="text" placeholder="ボドネ検索"><a onclick="searchRoom()" id="href01">ボード検索</a><br>
    <?php
    $result = array_filter(glob("chatlog/*.txt"));
    $resultall;
    foreach($result as $rs){
      $resultall = substr($rs,8,strlen($rs));
      $resultall = substr($resultall,0,strlen($resultall)-4);
      if($_GET["text"] == ""){
        echo '<a class="a" href="https://telk.glitch.me/main/chat.php?room='.$resultall.'">'.$resultall."</a><br>";
      }elseif(strpos($resultall,$_GET["text"]) !== false){
        echo '<a class="a" href="https://telk.glitch.me/main/chat.php?room='.$resultall.'"><xmp>'.$resultall."</xmp></a><br>";
      }
    }
    ?>
    <a class="a plus" href="https://telk.glitch.me/main/">メインページへ戻る</a>
    <script type="text/javascript" src="https://telk.glitch.me/main/script.js"></script>
  </body>
</html>