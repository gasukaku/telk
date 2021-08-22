<html>
  <head>
    <meta charset="utf-8">
    <title>掲示板</title>
    <link rel="stylesheet" src="https://telk.glitch.me/style.css">
    <script type="text/javascript" src="https://telk.glitch.me/script.js"></script>
  </head>
  <body>
    <form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
      <input type="text" class="name" name="name" value="" placeholder="コメントを入力">
      <textarea placeholder="" spellcheck="false"></textarea>
    </form>
  </body>
</html>