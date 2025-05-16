<!-- PHP課題⑬：テキストファイルに書き出して保存しよう -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>q13</title>
</head>
<body>
<h1>ファイルへの書き出し処理</h1>

<?php

$filename = "output.txt";

$textToWrite = "Hello, this is a test message!\n";
$textToWrite .= "これはPHPから書き込まれたテストメッセージです。\n";

// ファイルが存在するかチェック
if (file_exists($filename)) {
    // ファイルへの書き込み権限があるかチェック
    if (is_writable($filename)) {
        $fileHandle = fopen($filename, 'w');

        if ($fileHandle !== false) {
            if (fwrite($fileHandle, $textToWrite) !== false) {
                echo "<p>" . htmlspecialchars($filename, ENT_QUOTES, 'UTF-8') . " に文字列を書き込みました。</p>";
                echo "<p>書き込んだ内容:</p>";
                echo "<pre>" . htmlspecialchars($textToWrite, ENT_QUOTES, 'UTF-8') . "</pre>";
            } else {
                echo "<p style='color:red;'>エラー: " . htmlspecialchars($filename, ENT_QUOTES, 'UTF-8') . " への書き込みに失敗しました。</p>";
            }
            fclose($fileHandle);
        } else {
            echo "<p style='color:red;'>エラー: " . htmlspecialchars($filename, ENT_QUOTES, 'UTF-8') . " を開けませんでした。</p>";
        }
    } else {
        echo "<p style='color:red;'>エラー: " . htmlspecialchars($filename, ENT_QUOTES, 'UTF-8') . " に書き込み権限がありません。</p>";
    }
} else {
    // ファイルが存在しない場合は新規作成を試みる
    $fileHandle = fopen($filename, 'w');
    if ($fileHandle !== false) {
        if (fwrite($fileHandle, $textToWrite) !== false) {
            echo "<p>" . htmlspecialchars($filename, ENT_QUOTES, 'UTF-8') . " に文字列を書き込みました。</p>";
            echo "<p>書き込んだ内容:</p>";
            echo "<pre>" . htmlspecialchars($textToWrite, ENT_QUOTES, 'UTF-8') . "</pre>";
        } else {
            echo "<p style='color:red;'>エラー: " . htmlspecialchars($filename, ENT_QUOTES, 'UTF-8') . " への書き込みに失敗しました。</p>";
        }
        fclose($fileHandle);
    } else {
        echo "<p style='color:red;'>エラー: " . htmlspecialchars($filename, ENT_QUOTES, 'UTF-8') . " を作成できませんでした。ディレクトリの書き込み権限を確認してください。</p>";
    }
}
?>
</body>
</html>
