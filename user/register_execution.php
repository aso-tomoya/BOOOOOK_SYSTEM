<<<<<<< HEAD
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ob_start();
    
    $name=$_POST['name'];
    $mail_address=$_POST['mail_address'];
    $user_pass=$_POST['user_pass'];
    $confirm_pass=$_POST['confirm_pass'];
    $postal_code=$_POST['postal_code'];
    $address=$_POST['address'];

    var_dump($_POST);

    if (empty($name) || empty($mail_address) || empty($user_pass) || empty($confirm_pass) || empty($postal_code) || empty($address)) {
        header('Location: register.php?error=1');
        exit();
    }
    if ($user_pass !== $confirm_pass) {
        header('Location: register.php?error=2');
        exit();
    }
    $pdo=new PDO('mysql:host=mysql311.phy.lolipop.lan;
    dbname=LAA1557203-boooook;charset=utf8',
    'LAA1557203',
    'boooook');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql=$pdo->prepare('INSERT INTO user(name,mail_address,user_pass,postal_code,address)VALUES(?,?,?,?,?)');
    $sql->execute([$name,$mail_address,$user_pass,$postal_code,$address]);
    $pdo=null;
    header('Location: login.php');
        exit();
    ob_end_flush();
    ?>
</body>
</html>
=======
<?php

// 完成
$pdo = new PDO('mysql:host=mysql311.phy.lolipop.lan;
        dbname=LAA1557203-boooook;charset=utf8',
        'LAA1557203',
        'boooook');

$name = $_POST['name'];
$mail = $_POST['mail'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$postcord = $_POST['postcord'];
$address = $_POST['address'];

// メールアドレスの重複チェック
$sql = $pdo->prepare('SELECT * FROM user WHERE mail_address = ?');
$sql->execute([$mail]);
$existingUser = $sql->fetch();

if ($existingUser) {
    // メールアドレスが重複している場合
    header('Location: register.php?error=duplicate'); // 登録画面にリダイレクト（エラーを表示）
    exit();
} else {
    // 新規登録処理
    $sql = $pdo->prepare('INSERT INTO user(name, mail_address, user_pass, postal_code, address) VALUES(?,?,?,?,?)');
    $sql->execute([$name, $mail, $password1, $postcord, $address]);
    $pdo = null;
    header('Location: login.php'); // ログイン画面にリダイレクト
    exit();
}
?>
>>>>>>> origin/tomoya
