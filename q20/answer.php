<!-- 書籍検索アプリ -->
<?php
require_once './db_config.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>書籍検索アプリ</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <h1>書籍検索</h1>

    <form method="GET" action="answer.php">
        <div>
            <label for="title">書籍名:</label>
            <input type="text" id="title" name="title" value="<?php echo isset(
              $_GET['title']
            )
              ? htmlspecialchars($_GET['title'], ENT_QUOTES, 'UTF-8')
              : ''; ?>">
        </div>

        <div>
            <label for="author">著者:</label>
            <select id="author" name="author">
                <option value="">すべて</option>
                <?php
                $sql = 'SELECT id, name FROM authors';
                $stmt = $pdo->query($sql);
                $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($authors as $author) {
                  $selected =
                    isset($_GET['author']) && $_GET['author'] == $author['id']
                      ? 'selected'
                      : '';
                  echo "<option value=\"" .
                    htmlspecialchars($author['id'], ENT_QUOTES, 'UTF-8') .
                    "\" $selected>" .
                    htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8') .
                    '</option>';
                }
                ?>
            </select>
        </div>

        <div>
            <label for="genre">ジャンル:</label>
            <select id="genre" name="genre">
                <option value="">すべて</option>
                <?php
                $sql = 'SELECT id, name FROM genres';
                $stmt = $pdo->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $selected =
                    isset($_GET['genre']) && $_GET['genre'] == $row['id']
                      ? 'selected'
                      : '';
                  echo "<option value=\"" .
                    htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') .
                    "\" $selected>" .
                    htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') .
                    '</option>';
                }
                ?>
            </select>
        </div>

        <button type="submit">検索</button>
    </form>

    <h2>検索結果</h2>
    <?php
    // 検索処理
    $where = [];
    $params = [];

    if (!empty($_GET['title'])) {
      $where[] = 'title LIKE ?';
      $params[] = '%' . $_GET['title'] . '%';
    }

    if (!empty($_GET['author'])) {
      $where[] = 'author_id = ?';
      $params[] = $_GET['author'];
    }

    if (!empty($_GET['genre'])) {
      $where[] = 'genre_id = ?';
      $params[] = $_GET['genre'];
    }

    $sql = "SELECT books.title, books.price, authors.name AS author_name, genres.name AS genre_name
            FROM books
            INNER JOIN authors ON books.author_id = authors.id
            INNER JOIN genres ON books.genre_id = genres.id";

    if (!empty($where)) {
      $sql .= ' WHERE ' . implode(' AND ', $where);
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    // 結果の表示
    echo '<table>';
    echo '<tr><th>書籍名</th><th>著者</th><th>ジャンル</th><th>価格</th></tr>';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo '<tr>';
      echo '<td>' .
        htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') .
        '</td>';
      echo '<td>' .
        htmlspecialchars($row['author_name'], ENT_QUOTES, 'UTF-8') .
        '</td>';
      echo '<td>' .
        htmlspecialchars($row['genre_name'], ENT_QUOTES, 'UTF-8') .
        '</td>';
      echo '<td>' .
        htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8') .
        '</td>';
      echo '</tr>';
    }
    echo '</table>';
    ?>
</body>
</html>
