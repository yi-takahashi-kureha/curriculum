<!-- PHP課題⑪：順位付きランキングを表示しよう -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>q11</title>
</head>
<body>
<h1>テスト結果ランキング</h1>

<ul>
    <?php
    $scoreData = [
        ['name' => '太郎', 'score' => 98],
        ['name' => '花子', 'score' => 92],
        ['name' => '次郎', 'score' => 85],
        ['name' => '三郎', 'score' => 77],
        ['name' => '良子', 'score' => 9],
        ['name' => '文太', 'score' => 65],
        ['name' => '静香', 'score' => 100],
    ];

    usort($scoreData, function($a, $b) {
        return $b['score'] <=> $a['score'];
    });

    $rank = 1;
    foreach ($scoreData as $player) {
        $safe_name = htmlspecialchars($player['name'], ENT_QUOTES, 'UTF-8');
        $safe_score = htmlspecialchars($player['score'], ENT_QUOTES, 'UTF-8');

        echo "<li>";
        echo "<span>" . $rank . "位:</span>";
        echo "<span>" . $safe_name . "</span> ";
        echo "<span>" . $safe_score . "点</span>";
        echo "</li>\n";

        $rank++;
    }
    ?>
</ul>
</body>
</html>
