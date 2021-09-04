<html>
  <head>
    <meta charset="utf-8">
    <title>Telkボード</title>
    <link rel="stylesheet" href="https://telk.glitch.me/main/style.css">
  </head>
  <body>
    <h1 class="logo">Telkボード</h1>
    <a href="guide.php">利用規約</a>
    <a href="chat.php?room=メイン">メインボード</a>
    <a href="chat.php?room=フィードバック">フィードバックボード</a><br>
    <input id="RoomName" class="sendName" type="text" placeholder="ボードネーム"><a onclick="makeRoom()" id="href00">ボード移動・作成</a><br>
    <input id="SearchText" class="sendName" type="text" placeholder="ボドネ検索"><a onclick="searchRoom()" id="href01">ボード検索</a><br>
    <script type="text/javascript" src="https://telk.glitch.me/main/script.js"></script>
  </body>
</html>