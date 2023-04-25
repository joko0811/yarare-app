<?php
  # メッセージの書き出し
  $file_path = realpath("message/" . @$_POST["username"]);
  if (file_exists($file_path)){
    touch($file_path);
  }
  $write_flag = file_put_contents($file_path, @$_POST["message"] . "\n", FILE_APPEND);

  # ログ出力
  $time_data = time();
  $log_text = "[w] " . date('Y:m:d:H:i:s', $time_data) . " " . @$_POST["username"] . "\n";
  $message_log_path = realpath("log/message.log");
  if($message_log_path === false){
    touch($file_path)
  }
  file_put_contents($message_log_path, $log_text, FILE_APPEND);
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>write_conf</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  </head>

  <body>
    <div class="write_result">
      <?php
        if ($write_flag === false){
          echo "ファイルの書き込みに失敗しました";
        } else {
          echo "ファイルの書き込みに成功しました";
        }
      ?>
    </div>
  <p><a href="index.php">メインページに戻る</a></p>
  </body>
</html>