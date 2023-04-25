<html>
  <head>
    <meta charset="UTF-8">
    <title>view_message</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  </head>

  <body>
    <div class="view_message">
      <p>メッセージ履歴</p>
      <?php
        $message_log_path = "log/message.log";
        $lines = file($message_log_path);
        foreach ($lines as $line){
          $line_data = explode(" ", $line);
          echo "<p><a href=\"redirect_userpage.php?username=" . htmlspecialchars($line_data[2], ENT_QUOTES, 'UTF-8') . "\">" . $line . "</a></p>";
        }
      ?>
    </div>
  </body>
</html>
