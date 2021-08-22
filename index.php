<html>
  <head>
    <meta charset="utf-8">
    <title>掲示板</title>
    <link rel="stylesheet" href="https://telk.glitch.me/style.css">
  </head>
  <body>
    <form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
      <input type="text" class="name bdr" name="name" value="" placeholder="名前を入力"><br>
      <textarea placeholder="コメントを入力" spellcheck="false" name="text" class="text bdr"></textarea><br>
      <input type="submit" value="">
    </form>
  </body>
  <script type="text/javascript" src="https://telk.glitch.me/script.js"></script>
</html>