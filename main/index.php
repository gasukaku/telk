<html>
  <head>
    <meta charset="utf-8">
    <title>Telkユーザーボード</title>
    <link rel="stylesheet" href="https://telk.glitch.me/main/style.css">
  </head>
  <body>
    <h1 class="logo">Telkユーザーボード</h1>
    <a href="guide.php">利用規約</a>
    <a href="chat.php?room=メイン">メインボード</a>
    <a href="chat.php?room=フィードバック">フィードバックボード</a>
    <input id="RoomName" class="sendName" type="text" placeholder="ボードネーム"><a onclick="makeRoom()" id="href">ボード移動・作成</a><xmp></xmp><br>
    <h1 class="logo">ボード一覧</h1>
    <?php
    $result = array_filter(glob("chatlog/*.txt"));
    $resultall;
    foreach($result as $rs){
      $resultall = substr($rs,8,strlen($rs));
      $resultall = substr($resultall,0,strlen($resultall)-4);
      echo '<a class="a" href="https://telk.glitch.me/main/chat.php?room='.$resultall.'">'.$resultall."</a><br>";
    }
    ?>
    <script type="text/javascript" src="https://telk.glitch.me/main/script.js"></script>
  </body>
</html>