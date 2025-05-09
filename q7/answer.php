<!-- PHP課題⑦：ランダムでじゃんけん勝負を作ろう -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>q7</title>
</head>
<body>
<h1>ランダムじゃんけん勝負！</h1>

    <?php

    $hands = ["グー", "チョキ", "パー"];
    $randomIndex = mt_rand(0, count($hands) - 1);
    $myHand = $hands[$randomIndex];

    echo "あなたの手は「<span>" . $myHand . "</span>」です。";
    ?>

<form action="" method="GET">
    <button type="submit">もう一回！</button>
</form>
</body>
</html>
