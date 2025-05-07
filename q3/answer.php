<!-- PHP課題③：1〜100までの数字を繰り返し出力しよう -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>q3</title>
</head>
<body>
<h1>1から100までの数字を表示</h1>

<form action="" method="POST" >
    <button type="submit" name="display_numbers">START</button>
    <button type="submit" name="reset">Reset</button>
</form>

<div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['display_numbers'])) {
        echo "<p>実行結果:</p>\n";

        for ($i = 1; $i <= 100; $i++) {
            echo $i . "<br>\n";
        }
    } else {
        echo "<p>「START」ボタンを押すと、ここに数字が表示されます。</p>";
    }
    ?>
</div>
</body>
</html>
