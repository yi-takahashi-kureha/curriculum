<!-- PHP課題⑫：現在の日付と時刻を出力しよう -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>q12</title>
</head>
<body>
<h1>現在の日時 (日本時間)</h1>

<p>
    <?php
    date_default_timezone_set('Asia/Tokyo');

    $dayOfWeek = ["日", "月", "火", "水", "木", "金", "土"];
    $currentDateTime = date("Y年m月d日") . " (" . $dayOfWeek[date("w")] . "曜日) " . date("H:i");

    echo "現在の日時: " . $currentDateTime;
    ?>
</p>
</body>
</html>
