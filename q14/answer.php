<!-- PHP課題⑭：クラスとメソッドを定義して自己紹介しよう -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>q14</title>
</head>
<body>
<h1>クラスを使った自己紹介</h1>

<?php

class Person
{
    public string $name;
    public int $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    private function sanitize(string $data): string
    {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }

    public function introduce(): void
    {
        $safe_name = $this->sanitize($this->name);
        $safe_age = $this->age;
        echo "<p>こんにちは、私は" . $safe_name . "です。年齢は" . $safe_age . "歳です。</p>";
    }
}

$person1 = new Person("山田", 25);
$person1->introduce();

$person2 = new Person("田中 太郎", 30);
$person2->introduce();

?>
</body>
</html>
