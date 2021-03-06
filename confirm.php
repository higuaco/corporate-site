<?php
        // 値の受け取り（エスケープ・空っぽ処理付き）
  $name = $_POST['name'];
  $email = $_POST['email'];
  $text = $_POST['text'];
  $name = isset($_POST['name'])? htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8'):'';
  $email = isset($_POST['email'])? htmlspecialchars($_POST['email'], ENT_QUOTES, 'utf-8'):'';
  $text = isset($_POST['text'])? htmlspecialchars($_POST['text'], ENT_QUOTES, 'utf-8'):'';

?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>確認画面 | SQUARE, inc.</title>
  <link rel="icon" href="favicon.ico">
  <meta name="viewport"
    content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
  <header>
    <div class="container">
      <div class="header-logo">
        <h1><a href="/"><img src="img/square_logo.png" id="logo" alt="ロゴ"></a></h1>
      </div>

      <!-- ハンバーガーメニューボタン -->
      <div class="toggle">
        <div>
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>

      <nav class="sp-menu menu">
        <ul>
          <li><a href="index.html#service">サービス</a></li>
          <li><a href="index.html#news">お知らせ</a></li>
          <li><a href="index.html#about">会社概要</a></li>
          <li><a href="index.html#contact">お問い合わせ</a></li>
        </ul>
      </nav>

      <nav class="pc-menu menu-left menu">
        <ul>
          <li><a href="index.html#service">サービス</a></li>
          <li><a href="index.html#news">お知らせ</a></li>
          <li><a href="index.html#about">会社概要</a></li>
          <li><a href="index.html#contact">お問い合わせ</a></li>
        </ul>
      </nav>

    </div>
  </header>
  <main>
    <!-- contact conf -->
    <div class="wrapper last-wrapper">
      <div class="container">
        <div class="wrapper-title">
          <h3>CONFIRM</h3>
          <p>お問い合わせ内容</p>
        </div>
        <form method="post" action="send.php" class="conf-form">
          <div class="form-group">
            <p>お名前 *</p>
            <p><?php echo $name; ?></p>
            <input type="hidden" name="name" value="<?php echo $name; ?>">
            <?php if($name===''): ?>
            <p class=" error">名前が入力されていません</p>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <p>Email *</p>
            <p><?php echo $email; ?></p>
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <?php if($email===''): ?>
            <p class="error">メールアドレスが入力されていません</p>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <p>お問い合わせ内容 *</p>
            <p><?php echo $text; ?></p>
            <input type="hidden" name="text" value="<?php echo $text; ?>">
            <?php if($text===''): ?>
            <p class="error">お問い合わせ内容が入力されていません</p>
            <?php endif; ?>
          </div>
          <?php if($name!=''&&$email!=''&&$text!=''): ?>
          <p>この内容で送信してよろしいですか？</p>
          <button type="submit" class="btn btn-submit">送信する</button>
          <?php else: ?>
          <button class="btn btn-return">戻る</button>
          <?php endif; ?>
        </form>
      </div>
    </div>
    <!-- end contact conf -->
  </main>
  <footer>
    <div class="container">
      <p>Copyright @ 2018 SQUARE, inc.</p>
    </div>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
  $(function() {
    // ハンバーガーメニューの動作
    $('.toggle').click(function() {
      $("header").toggleClass('open');
      $(".sp-menu").slideToggle(500);
    });
    $('.btn-return').click(function() {
      window.history.back(-1);
      return false;
    });

  });
  </script>

</body>

</html>