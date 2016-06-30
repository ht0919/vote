<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8"><title>データベースの初期化</title>
  <meta http-equiv="refresh" content="1;URL=index.php">
</head>
<body>
<?php
	$USER="root";
	$PW="";
	$dnsinfo="mysql:dbname=entry_db;host=localhost;charset=utf8";
	try {
		// データベースサーバーへの接続と文字コードの設定
		$pdo = new PDO($dnsinfo, $USER, $PW);
		// 古いデータベースが残っていたら削除
		$pdo->query("drop database IF EXISTS entry_db");
		// データベースの作成
		$pdo->query("create database entry_db CHARACTER SET utf8");
		// データベースの選択
		$pdo->query("use entry_db");
		// 投票テーブルの作成
		$pdo->query("create table entry_tbl (name text, count int)");
		// 投票テーブの初期データ登録
		$pdo->query("insert into entry_tbl values ('犬派',0),('猫派',0)");
		// データベースサーバーから切断
		$pdo = null;
	} catch(PDOException $e) {
		$res = $e->getMessage();
	}
	echo "データベースを初期化しました。";
?>
<p><a href="index.php">戻る</a></p>
</body>
</html>
