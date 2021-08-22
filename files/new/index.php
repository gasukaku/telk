<html>
  <head>
    <meta charset="utf-8">
    <title>セミコロン通信</title>
    <link rel="stylesheet" href="https://telk.glitch.me/style.css">
  </head>
  <body>
    <div class="posts">
      <?php
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        mkfolder();
      }
      function mkfolder("https://telk.glitch.me");
      ?>
    </div>
    <form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
      <input type="text" spellcheck="false" name="personal_name" placeholder="作成" required><br><br>
      <input type="submit" value="投稿する">
    </form>
  </body>
  <script type="text/javascript" src="https://telk.glitch.me/script.js"></script>
</html>