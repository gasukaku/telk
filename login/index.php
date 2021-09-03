<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://telk.glitch.me/login/style.css">
  </head>
  <body>
    <?php
    if($_GET["score"] == ""){ ?>
    <h1>Login</h1>
    <input type="text" class="bot" value="" placeholder="Username"><br>
    <input type="text" class="bot" value="" placeholder="Password"><br>
    <a href="?score=success"><input type="button" class="boty" value="Login"></a>
    <?php }elseif($_GET["score"] == "success"){ ?>
    <h1>Login successed.</h1>
    <?php } ?>
  </body>
</html>