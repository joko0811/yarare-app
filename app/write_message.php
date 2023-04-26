<?php
  # 禁止文字列が含まれていないかチェック
  $check_username = strpos(@$_POST["username"], "unko");

  if ($check_username === false){
    # メッセージの書き出し
    $file_path = "message/" . @$_POST["username"];
    $write_flag = file_put_contents($file_path, @$_POST["message"] . "\n", FILE_APPEND);

    # ログ出力
    $time_data = time();
    $log_text = "[w] " . date('Y:m:d:H:i:s', $time_data) . " " . htmlspecialchars(@$_POST["username"]) . "\n";
    $message_log_path = "log/message.log";
    file_put_contents($message_log_path, $log_text, FILE_APPEND);
  }

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
        if ($check_username === false){
          if ($write_flag === false){
            echo "ファイルの書き込みに失敗しました";
          } else {
            echo "ファイルの書き込みに成功しました";
          }
        }else{
          echo "ユーザー名が不正です";
        }
      ?>
    </div>
  <p><a href="index.php">メインページに戻る</a></p>
  </body>
</html>
