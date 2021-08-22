<html>
  <head>
    <meta charset="utf-8">
    <title>掲示板</title>
    <link rel="stylesheet" href="https://telk.glitch.me/style.css">
  </head>
  <body>
    <div class="posts">
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    writeData();
}

readData();

function readData(){
    $log_file = 'log.txt';

    $fp = fopen($log_file, 'rb');

    if ($fp){
        if (flock($fp, LOCK_SH)){
            while (!feof($fp)) {
                $buffer = fgets($fp);
                print($buffer);
            }

            flock($fp, LOCK_UN);
        }else{
            print('ファイルロックに失敗しました');
        }
    }

    fclose($fp);
}

function writeData(){
    $personal_name = $_POST['personal_name'];
    $contents = $_POST['contents'];

    $data = "<hr>\r\n";
    $data = $data."<div class='post'><p class='postname'>投稿者:".$personal_name."</p>\r\n";
    $data = $data."<div class='line'></div>\r\n";
    $data = $data."<p class='postbody'>".$contents."</p></div>";

    $log_file = 'log.txt';

    $fp = fopen($log_file, 'ab');

    if ($fp){
        if (flock($fp, LOCK_EX)){
            if (fwrite($fp,  $data) === FALSE){
                print('ファイル書き込みに失敗しました');
            }

            flock($fp, LOCK_UN);
        }else{
            print('ファイルロックに失敗しました');
        }
    }

    fclose($fp);
}

?>
    </div>
    <form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
      <input type="text" name="personal_name"><br><br>
      <textarea name="contents" wrap="off" spellcheck="false">
      </textarea><br><br>
      <input type="submit" value="投稿する">
    </form>
  </body>
  <script type="text/javascript" src="https://telk.glitch.me/script.js"></script>
</html>