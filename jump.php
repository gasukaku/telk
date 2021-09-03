<html>
  <head>
    <meta charset="utf-8">
    <title><?php print($_GET["tourl"]); ?> へ飛ぼうとしています...</title>
    <link rel="stylesheet" href="https://telk.glitch.me/style.css">
  </head>
  <body>
    <a href="<?php print($_GET["tourl"]); ?>"><?php print($_GET["tourl"]); ?></a>
    <p>上のリンクをクリックすると飛べます</p>
  </body>
</html>