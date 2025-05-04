<!-- 課題②：偶数か奇数かを判定しよう -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>q2</title>
</head>
<body>
  <h1>偶数or奇数チェッカー💫</h1>
  <form action="answer.php" method="POST">
    <label for="number">数字を入力してください：</label>
    <input type="number" id="number" name="number" required>
    <button type="submit">判定する</button>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST['number'];
        if ($number % 2 == 0) {
          echo "<p>入力された値は [$number]です。これは偶然です。</p>";
        } else {
          echo "<p>入力された値は [$number]です。これは奇数です。</p>";
        }
      }
    ?>
  </form>
</body>
</html>
