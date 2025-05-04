<!-- PHP課題⑥：連想配列でプロフィールを管理しよう -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>q6</title>
</head>
<body>
  <h1>foreachで連想配列を一項目ずつ出力</h1>

<?php

$profile = [
  'name' => '山田太郎',
  'age' => 25,
  'hobby' => 'バスケ'
];

echo "<h2>プロフィール</h2>";
echo "<dl>\n";

foreach($profile as $key => $value) {
  echo "<div>\n";
  echo "<dt>" . $key . "</dt>\n";
  echo "<dd>" . $value . "</dd>\n";
  echo"</div>\n";
}

echo "</dl>\n";
?>
</body>
</html>
