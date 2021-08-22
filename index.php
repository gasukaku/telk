<html>
  <head>
    <meta charset="utf-8">
    <title>Telk/title>
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

    $data = $data."<div class='post'><p class='postname'><xmp>投稿者:".$personal_name."</xmp></p>";
    $data = $data."<p class='postbody'><xmp>".$contents."</xmp></p></div>";

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
      <input type="text" spellcheck="false" name="personal_name" placeholder="ニックネームを入力" required><br><br>
      <textarea name="contents" wrap="off" spellcheck="false" placeholder="投稿内容を入力" required></textarea><br><br>
      <input type="submit" value="投稿する">
    </form>
  </body>
  <script type="text/javascript" src="https://telk.glitch.me/script.js"></script>
</html>