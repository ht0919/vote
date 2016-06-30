<!DOCTYPE html>
<html lang="ja">
<head><meta charset="UTF-8"><title>犬猫総選挙</title></head>
<body>
  <h1>犬派か猫派の総選挙</h1>
  <h2>現在の投票数</h2>
  <?php require "result.php"; ?>
  <h3>あなたはどっち派？</h3>
  <form method="GET" action="entry.php">
    <input type="radio" name="name" value="犬派">犬派
    <input type="radio" name="name" value="猫派">猫派
    <p><input type="submit" value="投票する"></p>
  </form>
  <form method="GET" action="db_init.php">
    <p><input type="submit" value="データベースを初期化"></p>
  </form>
</body>
</html>
