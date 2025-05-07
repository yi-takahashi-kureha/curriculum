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

<table>
    <thead>
        <tr>
            <th>書籍名</th>
            <th>価格 (円)</th>
            <th>著者名</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $books = [
            [
                'title' => 'PHP入門',
                'price' => 2400,
                'author' => '山田 太郎'
            ],
            [
                'title' => 'JavaScript実践ガイド',
                'price' => 3200,
                'author' => '佐藤 花子'
            ],
            [
                'title' => 'データベース設計の基礎',
                'price' => 2800,
                'author' => '田中 一郎'
            ],
            [
                'title' => 'Webデザインの教科書',
                'price' => 2600,
                'author' => '鈴木 次郎'
            ]
        ];

        foreach ($books as $book) {
            echo "<tr>\n";

            $safe_title = htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8');
            echo "    <td>" . $safe_title . "</td>\n";

            $formatted_price = number_format($book['price']);
            $safe_price = htmlspecialchars($formatted_price, ENT_QUOTES, 'UTF-8');
            echo "    <td>" . $safe_price . "</td>\n";

            $safe_author = htmlspecialchars($book['author'], ENT_QUOTES, 'UTF-8');
            echo "    <td>" . $safe_author . "</td>\n";

            echo "</tr>\n";
        }
        ?>
    </tbody>
</table>
</body>
</html>
