<!-- PHP課題⑱：PDOを使ってDBに接続＆SELECTしてみよう -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>q18</title>
</head>
<body>
<h1>書籍一覧 (データベースより)</h1>

<?php
// ----- XAMMP環境でのPDO接続設定 -----
$db_host = 'localhost';
$db_name = 'bookshop';
$db_user = 'root';
$db_pass = '';
$db_charset = 'utf8mb4';

// (Data Source Name) の設定[どのデータベースに、どのドライバで接続するかを指定する文字列]
$dsn = "mysql:host={$db_host};dbname={$db_name};charset={$db_charset}";

// PDO接続オプション['エラー発生時に例外をスロー', '結果を連想配列として取得', 'プリペアドステートメントのエミュレーションを無効']
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
// ------------------------------------

try {
    // PDOインスタンスの作成 (データベースへの接続)
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);

    echo "<p>データベースへの接続に成功しました。</p>";

    $sql = "SELECT title, price FROM books";
    $stmt = $pdo->prepare($sql); // プリペアドステートメントを作成
    $stmt->execute(); // プリペアドステートメントを実行

    echo "<h2>書籍リスト:</h2>";
    if ($stmt->rowCount() > 0) {
        echo "<ul>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
            $price = htmlspecialchars(number_format($row['price']), ENT_QUOTES, 'UTF-8');
            echo "<li>書籍名：" . $title . "／価格：" . $price . "円</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>書籍データが見つかりませんでした。</p>";
    }

} catch (PDOException $e) {
    echo "<p>データベースエラー: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</p>";
} finally {
    // データベース接続をnullで解放[推奨らしいため一応]
    $pdo = null;
    echo "<p>データベース接続を解放しました。</p>"; // 確認用
}
?>
</body>
</html>
