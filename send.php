<?php
        //PHPMailerソースを読み込む
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';
        require 'PHPMailer/src/POP3.php';
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/OAuth.php';
        require 'PHPMailer/language/phpmailer.lang-ja.php';

        //使う
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;


  $name = isset($_POST['name'])? htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8'):'';
  $email = isset($_POST['email'])? htmlspecialchars($_POST['email'], ENT_QUOTES, 'utf-8'):'';
  $text = isset($_POST['text'])? htmlspecialchars($_POST['text'], ENT_QUOTES, 'utf-8'):'';


  //メール内容カスタマイズ
  $mail_body ='<h1>'.$name.'さま</h1></p><p>お問い合わせありがとうございます。</p><p>後日担当者よりご連絡いたします。</p>';
  $mail_body.='<br>';
  $mail_body.="-----------------------------------";
  $mail_body.='<p>お問い合わせ内容：'.$text.'</p>';
  $mail_body.="-----------------------------------";
  $mail_body.='<br>';
  $mail_body.='<p>このメールに心当たりがない場合は破棄してください。</p>';

  $mail = new PHPMailer(true);
  $mail->SMTPDebug = 2; //デバックモード 0にすると表示されない
  $mail->isSMTP();
  $mail->Host='smtp.mailtrap.io';
  $mail->SMTPAuth= true;
  $mail->Username = '81fbccae4bb223';
  $mail->Password = 'b6d78bf0a37577';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 2525;
  $mail->Charset = 'utf-8';
  $mail->isHTML(true);
  $mail->CharSet = 'UTF-8'; //文字化け防止
  $mail->setFrom('higuu28@gmail.com','送信元として表示する名前');
  $mail->addAddress($email,$name);
  $mail->Subject = mb_encode_mimeheader('お問い合わせありがとうございます','ISO-2022-JP');
  $mail->Body = $mail_body;

  try{
      if($mail->send()){
          $result = 'お問い合わせありがとうございました。';
      }else{
          $result = '送信できませんでした。';
      };
  }catch(Exception $e){
      $result = '送信できませんでした。';
  }

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>お問い合わせ内容送信 | SQUARE, inc.</title>
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
    <!-- contact send -->
    <div class="wrapper last-wrappaer">
      <div class="container">
        <div class="wrapper-title">
          <h3>SEND</h3>
          <p>お問い合わせ送信</p>
        </div>
        <div class="wrapper-body">
          <div class="thanks">
            <h4><?php echo $result; ?></h4>
          </div>
          <button type="submit" class="btn btn-gray" onclick="location.href='index.html'">トップページに戻る</button>
        </div>
      </div>
    </div>
    <!-- end contact send -->
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
  });
  </script>

</body>

</html>