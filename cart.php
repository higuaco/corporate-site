<?php
  $delete_name = isset($_POST['delete_name'])? htmlspecialchars($_POST['delete_name'], ENT_QUOTES, 'utf-8') : '';

    session_start();

    if($delete_name != '') unset($_SESSION['products'][$delete_name]);
    
    $total = 0;
    $products = isset($_SESSION['products'])? $_SESSION['products']:[];
    foreach($products as $name => $product){
          //各商品の小計を取得
          $subtotal = (int)$product['price']*(int)$product['count'];
          //各商品の小計を$totalに足す
          $total += $subtotal;
      }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>カート | SQUARE, inc.</title>
  <meta name="description" content="ここにサイトの説明文">
  <link rel="icon" href="favicon.ico">
  <meta name="viewport"
    content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
  <!-- icon -->
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
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
      <div class="cart">
        <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
      </div>
      <nav class="sp-menu menu">
        <ul>
          <li><a href="index.html#service">サービス</a></li>
          <li><a href="shop.php">商品一覧</a></li>
          <li><a href="index.html#news">お知らせ</a></li>
          <li><a href="index.html#about">会社概要</a></li>
          <li><a href="index.html#contact">お問い合わせ</a></li>
        </ul>
      </nav>

      <nav class="pc-menu menu-left menu">
        <ul>
          <li><a href="index.html#service">サービス</a></li>
          <li><a href="shop.php">商品一覧</a></li>
          <li><a href="index.html#news">お知らせ</a></li>
          <li><a href="index.html#about">会社概要</a></li>
          <li><a href="index.html#contact">お問い合わせ</a></li>
        </ul>
      </nav>
      <nav class="pc-menu menu-right menu">
        <ul>
          <li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
          <li><a href="register.html">会員登録</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <main>
    <div class="breadcrumbs">
      <div class="container">
        <ul>
          <li><a href="index.php">TOP</a></li>
          <li>カート</li>
        </ul>
      </div>
    </div>
    <div class="wrapper last-wrapper">
      <div class="container">
        <div class="wrapper-title">
          <h3>MY CART</h3>
          <p>カート</p>
        </div>
        <div class="cartlist">
          <table class="cart-table">
            <thead>
              <tr>
                <th>商品名</th>
                <th>価格</th>
                <th>個数</th>
                <th>小計</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($products as $name => $product): ?>
              <tr>
                <td label="商品名："><?php echo $name; ?></td>
                <td label="価格：" class="text-right">&yen;<?php echo $product['price']; ?></td>
                <td label="個数：" class="text-right"><?php echo $product['count']; ?></td>
                <td label="小計：" class="text-right">&yen;<?php echo $product['price']*$product['count']; ?></td>
                <td>
                  <form action="cart.php" method="post">
                    <input type="hidden" name="delete_name" value="<?php echo $name; ?>">
                    <button type="submit" class="btn btn-red">削除</button>
                  </form>
                </td>
              </tr>
              <?php endforeach; ?>
              <tr class="total">
                <th colspan="3">合計</th>
                <td colspan="2">&yen;<?php echo $total; ?></td>
              </tr>
            </tbody>
          </table>
          <div class="cart-btn">
            <button type="button" class="btn btn-blue">購入手続きへ</button>
            <button type="button" class="btn btn-gray">お買い物を続ける</button>
          </div>
        </div>
      </div>
    </div>

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