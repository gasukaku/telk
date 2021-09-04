<html>
  <head>
    <meta charset="utf-8">
    <title>Telk platform</title>
    <link rel="stylesheet" href="https://telk.glitch.me/style.css">
  </head>
  <body>
    <?php
  echo "ルーム：".$_GET["room"]."\n";
    ?>
    <div class="posts">
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    writeData();
}

readData();

function readData(){
    $log_file = 'chatlog/'.$_GET["room"].'.txt';

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
    date_default_timezone_set('Asia/Tokyo');
    $data = "<div class='post'><xmp>@".$personal_name."</xmp>"."<xmp>".$contents."</xmp><p class='date'>".date("Y/m/d H:i:s")."</p></div>".$data;

    $log_file = 'chatlog/'.$_GET["room"].'.txt';

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
    <form method="POST" action="<?php print($_SERVER['https://telk.glitch.me/chat.php?room='.$_GET[room]]) ?>">
      <input class="sendName" type="text" spellcheck="false" name="personal_name" placeholder="ニックネームを入力" required><br><br>
      <textarea class="sendBody" name="contents" wrap="off" spellcheck="false" placeholder="投稿内容を入力" required></textarea><br><br>
      <input type="submit" class="sendButton" value="利用規約に同意して投稿する"> <a href="https://telk.glitch.me/guide.php">利用規約の確認</a>
    </form>
  </body>
  <script type="text/javascript" src="https://telk.glitch.me/script.js"></script>
</html>