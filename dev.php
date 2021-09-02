<html>
  <head>
    <meta charset="utf-8">
    <title><?php print $dev[$_GET["name"]]; ?></title>
    <link rel="stylesheet" href="https://myfuncs.glitch.me/funcs/djunk.css">
  </head>
  <body style="padding:5%; padding-right:50%;">
    <p class="djunk section title">
      <?php
      $dev = [
        "まろさん"
      ];
      echo $dev[$_GET["name"]]
      ?>
    </p>
  </body>
  <script type="text/javascript" src="https://telk.glitch.me/script.js"></script>
</html>