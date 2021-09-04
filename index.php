<html>
  <head>
    <meta charset="utf-8">
    <title>Telkユーザーボード</title>
    <link rel="stylesheet" href="https://telk.glitch.me/style.css">
  </head>
  <body>
    <h1 class="logo">Telkユーザーボード</h1>
    <a href="guide.php">利用規約</a>
    <a href="chat.php?room=メイン">メインボード</a>
    <a href="chat.php?room=フィードバック">フィードバックボード</a>
    <input id="RoomName" class="sendName" type="text" placeholder="ボードネーム"><a onclick="makeRoom()" id="href">ボード移動・作成</a><xmp></xmp><br>
    <?php
    $result = array_filter(glob("chatlog/*.txt"),"is_file");
    echo $result[1];
    ?>
    <script type="text/javascript" src="script.js"></script>
  </body>
</html>