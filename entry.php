<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8"><title>投票</title>
  <meta http-equiv="refresh" content="1;URL=index.php">
</head>
<body>
  <h1>投票</h1>
  <?php
    $USER="root";
    $PW="";
    $dnsinfo="mysql:dbname=entry_db;host=localhost;charset=utf8";
    try {
      // クライアントからデータを受取
      if (!isset($_GET['name'])) die("犬派か猫派を選択してください");
      $name = $_GET['name'];
      // データベースサーバーへの接続と文字コードの設定
      $pdo = new PDO($dnsinfo, $USER, $PW);
      // 投票テーブルの更新（投票数に1を足す）
      $pdo->query("UPDATE entry_tbl SET count=count+1 WHERE name='$name'");
      // データベースサーバーから切断
      $pdo = null;
      echo "<p>あなたは $name に投票しました。</p>";
    } catch(PDOException $e) {
      $res = $e->getMessage();
    }
  ?>
  <p><a href="index.php">戻る</a></p>
</body>
</html>
