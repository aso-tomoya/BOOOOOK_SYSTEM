<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>管理者トップ</title>
</head>
<body>

<?php include '../header.php' ?>
<div class="container">
    <form action="manage_products.php">
        <div class="sel_botton"><input type="submit" name="pro_ad" value="商品管理"></div>
    </form>

    <form action="manage_users.php">
        <div class="sel_botton"><input type="submit" name="user_ad" value="ユーザー管理"></div>
    </form>
</div>

</body>
</html>
