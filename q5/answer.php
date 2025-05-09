<!-- PHP課題⑤：関数を作って処理をまとめよう -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>q5</title>
</head>
<body>
  <h1>関数を使って挨拶メッセージ</h1>

<form action="" method="POST">
  <label for="name_input">名前:</label>
  <input type="text" id="name_input" name="user_name" required placeholder="名前を入力してください">
  <button type="submit">挨拶する</button>
</form>

<?php
function sayHello(string $name): void {
  echo "こんにちは、$name さん！";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST["user_name"]) && trim($_POST["user_name"]) !== "") {
    $inputName = trim($_POST["user_name"]);
    sayHello($inputName);
    echo "<br>";
  } else {
    echo "<p>名前が入力されていません。</p>";
  }
}
?>
</body>
</html>
