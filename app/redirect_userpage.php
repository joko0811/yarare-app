<html>
  <head>
    <meta charset="UTF-8">
    <title>redirect_userpage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <?php
      $redirect_time = 5;
      $redirect_page = "~" . @$_GET['username'] . "/";
      echo "<meta http-equiv=\"refresh\" content=\"1; URL='". $redirect_page . "'\">";
    ?>
  </head>

  <body>
    <div class="redirect_message">
      <p><?php echo $redirect_time . "秒後に" . htmlspecialchars(@$_POST['username'], ENT_QUOTES, 'UTF-8'); ?>さんのページに遷移します</p>
    </div>
  </body>
</html>
