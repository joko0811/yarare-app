<html>
  <head>
    <meta charset="UTF-8">
    <title>input_message</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  </head>

  <body>
    <div class="input_message">
      <form action="write_message.php" method="post" id="message_form">
        <p> 送信先ユーザ名:<input type="text" name="username" value=""></p>
        <p> メッセージ    :<textarea name="message" cols="30" rows="5"></textarea></p>
        <input type="submit" >
      </form>
    </div>
  </body>
</html>
