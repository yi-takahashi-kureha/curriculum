<!-- Database configuration -->
<?php
  $host = 'localhost';
  $dbname = 'bookshop';
  $user = 'root';
  $pass = '';
  $charset = 'utf8mb4';

  try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo "データーベース接続エラー:" . $e->getMessage();
    exit();
  }
?>
