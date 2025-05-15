<!-- PHP課題⑰：配列を検索して一致する要素を表示しよう -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>q17</title>
</head>
<body>
<h1>書籍検索</h1>

<form action="" method="GET">
    <label for="search_keyword">検索キーワード:</label>
    <input type="text" id="search_keyword" name="keyword" value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword'], ENT_QUOTES, 'UTF-8') : ''; ?>">
    <button type="submit">検索</button>
</form>

<hr>

<div>
    <?php

    $books = [
        "PHP入門 第3版",
        "実践PHPプログラミング",
        "JavaScript徹底解説",
        "速習Ruby on Rails",
        "PHPフレームワーク Laravel入門",
        "初めてのPython",
        "詳解 PHP",
    ];

    if (isset($_GET['keyword'])) {
        $keyword = trim($_GET['keyword']);
        $safe_keyword = htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8');

        echo "<h2>検索結果</h2>";
        echo "<p>検索キーワード: 「" . $safe_keyword . "」</p>";

        $foundBooks = [];

        if ($keyword !== '') {
            foreach ($books as $bookTitle) {

                if (str_contains(strtolower($bookTitle), strtolower($keyword))) {
                    $foundBooks[] = $bookTitle;
                }
            }
        }

        if (!empty($foundBooks)) {
            echo "<p>見つかった書籍:</p>";
            echo "<ul>";
            foreach ($foundBooks as $foundBook) {
                echo "<li>" . htmlspecialchars($foundBook, ENT_QUOTES, 'UTF-8') . "</li>";
            }
            echo "</ul>";
        } elseif ($keyword !== '') {
            echo "<p>「" . $safe_keyword . "」に一致する書籍は見つかりませんでした。</p>";
        } else {
            echo "<p>検索キーワードを入力してください。</p>";
        }

    } else {
        echo "<p>検索キーワードを入力して「検索」ボタンを押してください。</p>";
    }

    ?>
</div>
</body>
</html>
