<?php
ob_start();
session_start();
?>

<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>商品詳細</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="index.php">商品紹介サイト</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav my-2 mt-lg-0 ml-auto">
                <?php if(isset($_SESSION['user'])){?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">一覧</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../app/functions/logout.php">ログアウト</a>
                </li>
                <?php }else{ ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">ログイン</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">ユーザ登録</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </nav>