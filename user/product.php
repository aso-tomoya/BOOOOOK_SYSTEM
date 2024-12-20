<?php
session_start();

// ヘッダー呼び出し
include_once('../header.php');
include_once('../method/itemGet.php');

// 商品情報取得
$item = get($db, $_GET['id']);
$genre = getGenre($db, $item['genre_id']);
?>


<!-- 完成 -->


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>BOOOOOK-<?= $item['item_name'] ?></title>
</head>
<body>
<div class="product-container">
    <div class="product-detail">
        <div class="product-image">
            <img src="../img/<?= $item['item_img'] ?>" alt="<?= $item['item_name'] ?>">
        </div>
        <div class="product-info">
            <h1><?= $item['item_name'] ?></h1>
            <hr>
            <ul>
                <li>著者： <?= $item['author'] ?></li>
                <li>ジャンル： <?= $genre['genre_name'] ?></li>
                <li>発売日： <?= date('Y/m/d', strtotime($item['release_date'])) ?></li>
                <li>価格： ¥<?= number_format($item['item_price']) ?></li>
            </ul>
            <hr>
            <button class="product-button" onclick="addToCart('<?=$item['item_id']?>')">カートに入れる</button>
        </div>
    </div>

    <div class="product-description">
        <h2>商品説明</h2>
        <p><?= nl2br($item['summary']) ?></p>
    </div>
</div>

<div id="back-to-top" class="back-to-top">
    ↑
</div>

<script src="../script/script.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const backToTopButton = document.getElementById('back-to-top');

    // スクロールイベントの設定
    window.addEventListener('scroll', function() {
        if (window.scrollY > 300) { // スクロールが300pxを超えた場合
            backToTopButton.classList.add('show');
        } else {
            backToTopButton.classList.remove('show');
        }
    });

    // クリックイベントでページトップにスクロール
    backToTopButton.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});
</script>
</body>
</html>
