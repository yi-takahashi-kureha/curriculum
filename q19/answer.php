<!-- PHP課題⑲：プリペアドステートメントで安全な検索処理を作ろう -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>q19</title>
</head>
<body>
<h1>書籍検索 (プリペアドステートメント)</h1>

<form action="" method="GET">
    <label for="search_keyword">検索キーワード:</label>
    <input type="text" id="search_keyword" name="keyword" value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword'], ENT_QUOTES, 'UTF-8') : ''; ?>">
    <button type="submit">検索</button>
</form>

<hr>

<div>
    <?php

    $db_host = 'localhost';
    $db_name = 'bookshop';
    $db_user = 'root';
    $db_pass = '';
    $db_charset = 'utf8mb4';

    $dsn = "mysql:host={$db_host};dbname={$db_name};charset={$db_charset}";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];


    if (isset($_GET['keyword'])) {
        $keyword = trim($_GET['keyword']);
        $safe_keyword_display = htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8');

        echo "<h2>検索結果</h2>";
        echo "<p>検索キーワード: 「" . $safe_keyword_display . "」</p>";

        if ($keyword !== '') {
            try {
                $pdo = new PDO($dsn, $db_user, $db_pass, $options);

                $sql = "SELECT b.title, a.name AS author_name
                        FROM books AS b
                        LEFT JOIN authors AS a ON b.author_id = a.id
                        WHERE b.title LIKE :keyword";

                $stmt = $pdo->prepare($sql);
                $search_param = "%" . $keyword . "%";
                $stmt->bindParam(':keyword', $search_param, PDO::PARAM_STR);

                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    echo "<p>見つかった書籍:</p>";
                    echo "<ul>";
                    while ($row = $stmt->fetch()) {
                        $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
                        $author_display = "";
                        if (isset($row['author_name']) && $row['author_name'] !== null) {
                            $author_display = "（著：" . htmlspecialchars($row['author_name'], ENT_QUOTES, 'UTF-8') . "）";
                        }
                        echo "<li>" . $title . $author_display . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>「" . $safe_keyword_display . "」に一致する書籍は見つかりませんでした。</p>";
                }

            } catch (PDOException $e) {
                echo "<p'>データベースエラー: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</p>";
            } finally {
                $pdo = null;
            }
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
