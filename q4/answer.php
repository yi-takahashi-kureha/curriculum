<!-- PHP課題④：配列を使ってデータを一覧表示しよう -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>q4</title>
</head>
<body>
<h1>配列の要素を foreach で出力</h1>

    <?php
    $Array = ["りんご", 9, "バナナ", 99, "みかん"];

    echo "<p>配列の内容:</p>\n";
    echo "<ul>\n";

    foreach ($Array as $item) {
        echo "<li>" . $item . "</li>\n";
    }
    echo "</ul>\n";
    ?>
</body>
</html>
