<?php
  # check bad str
  $check_username = strpos(@$_POST["username"], "unko");
  $check_dir_traversal = strpos(@$_POST["username"], "../");
  $writable = (($check_username === false) && ($check_dir_traversal == false))

  if ($writable){
    # writing message
    $file_path = "message/" . @$_POST["username"];
    $write_flag = file_put_contents($file_path, @$_POST["message"] . "\n", FILE_APPEND);

    # writing log
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
        if ($writable === false){
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
