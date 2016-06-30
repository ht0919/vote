<?php
  $USER="root";
	$PW="";
	$dnsinfo="mysql:dbname=entry_db;host=localhost;charset=utf8";
	try {
		// データベースサーバーへの接続と文字コードの設定
		$pdo = new PDO($dnsinfo, $USER, $PW);
    // 投票テーブルの読み込み
    $sql = "select name,count from entry_tbl";
    $stmt = $pdo->prepare($sql);
  	$stmt->execute(null);
  	$res = "";
    // 投票テーブルの一覧表示
    echo "<table border=\"1\">";
    echo "<tr><th>派閥</th><th>投票数</th></tr>";
  	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr align=\"right\"><td>".$row['name']."</td><td>".$row['count']."</td></tr>";
  	}
    echo "</table>";
    // データベースサーバーから切断
		$pdo = null;
	} catch(PDOException $e) {
    echo "<font color=\"red\">データベースを初期化して下さい</font>";
		//echo $e->getMessage();
	}
?>
