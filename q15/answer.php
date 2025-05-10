<!-- PHP課題⑮：クラスにバリデーション処理を追加しよう -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>q15</title>
</head>
<body>
<h1>クラスのバリデーション処理</h1>

<?php
class Person
{
    public $name;
    public $age;
    private array $errors = [];

    public function __construct(string $nameInput, $ageInput)
    {
        $this->name = $nameInput;
        $this->age = $ageInput;
    }

    public function validate(): bool
    {
        $this->errors = [];

        if (trim($this->name) === '') {
            $this->errors['name'] = "名前が入力されていません。";
        }
        if (!is_numeric($this->age)) {
            $this->errors['age'] = "年齢は数値で入力してください。";
        } elseif ((int)$this->age < 0) {
            $this->errors['age'] = "年齢は0以上の値を入力してください。";
        } else {
            $this->age = (int)$this->age;
        }

        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function displayErrors(): void
    {
        if (!empty($this->errors)) {
            echo "<p>入力内容に以下のエラーがあります:</p>";
            echo "<ul>";
            foreach ($this->errors as $field => $message) {
                echo "<li>" . htmlspecialchars(ucfirst($field), ENT_QUOTES, 'UTF-8') . ": " . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . "</li>";
            }
            echo "</ul>";
        }
    }

    public function introduce(): void
    {
        $safe_name = htmlspecialchars($this->name, ENT_QUOTES, 'UTF-8');
        $safe_age = htmlspecialchars((string)$this->age, ENT_QUOTES, 'UTF-8');
        echo "<p>こんにちは、私は" . $safe_name . "です。年齢は" . $safe_age . "歳です。</p>";
    }
}

echo "<h2>実行例1 (正常なデータ):</h2>";
$person1 = new Person("山田", 25);
if ($person1->validate()) {
    $person1->introduce();
} else {
    $person1->displayErrors();
}

echo "<hr>";

echo "<h2>実行例2 (名前が空):</h2>";
$person2 = new Person("", 30);
if ($person2->validate()) {
    $person2->introduce();
} else {
    $person2->displayErrors();
}

echo "<hr>";

echo "<h2>実行例3 (年齢が数値でない):</h2>";
$person3 = new Person("田中", "三十歳");
if ($person3->validate()) {
    $person3->introduce();
} else {
    $person3->displayErrors();
}

echo "<hr>";

echo "<h2>実行例4 (年齢が負の数):</h2>";
$person4 = new Person("鈴木", -5);
if ($person4->validate()) {
    $person4->introduce();
} else {
    $person4->displayErrors();
}

echo "<hr>";

echo "<h2>実行例5 (両方不正):</h2>";
$person5 = new Person("  ", "abc");
if ($person5->validate()) {
    $person5->introduce();
} else {
    $person5->displayErrors();
}

?>
</body>
</html>
