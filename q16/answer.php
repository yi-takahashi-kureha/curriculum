<!-- PHP課題⑯：2次元配列で書籍一覧を表示しよう -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>q16</title>
</head>
<body>
<h1>書籍一覧</h1>

<?php
    $books = [
        ['title' => 'PHP入門', 'price' => 2400, 'author' => '山田 太郎'],
        ['title' => 'JavaScript実践ガイド', 'price' => 3200, 'author' => '佐藤 花子'],
        ['title' => 'データベース設計の基礎', 'price' => 2800, 'author' => '田中 一郎'],
    ];

    foreach ($books as $book) {
        echo "<div>";
        $outputParts = [];
        foreach ($book as $key => $value) {
            $displayKey = '';
            $displayValue = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

            if ($key === 'title') {
                $displayKey = '書籍名';
            } elseif ($key === 'price') {
                $displayKey = '価格';
                $displayValue = number_format((int)$value) . '円';
            } elseif ($key === 'author') {
                $displayKey = '著者';
            }

            if ($displayKey) {
                $outputParts[] = "<span>" . htmlspecialchars($displayKey, ENT_QUOTES, 'UTF-8') . "：</span><span class='value'>" . $displayValue . "</span>";
            }
        }
        echo implode("／", $outputParts);
        echo "</div>\n";
    }
    ?>
</body>
</html>
