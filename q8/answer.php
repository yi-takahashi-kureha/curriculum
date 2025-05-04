<!-- PHP課題⑧：年齢に応じてメッセージを切り替えよう -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>q8</title>
</head>
<body>
  <h1>年齢チェッカー</h1>

  <form action="answer.php" method="POST">
    <label for="age">年齢を入力して下さい</label>
    <input type="text" name="age" id="age" required>
    <input type="submit" value="チェックする">
  </form>

  <?php
  if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['age'])) {
    $age = (int)$_POST['age'];

    if($age < 18) {
      echo "<p>未成年です</p>";
    } elseif ($age >= 18 && $age < 65) {
      echo "<p>成人です</p>";
    } else {
      echo "<p>シニアです</p>";
    }
  }
  ?>
</body>
</html>
