<?php
//$f = fn ($a, $b): mixed => $a + $b;
//echo $f(a: 3, b: 5);

//$f = function(); void use($a){
    //$GLOBALS['a'] += 10;
    //echo $a;
//};
//echo $f();
//$t = $a < 0 ? 'negative' : 'positive';
echo '<h1>Стрелочные функции</h1>';
//Задание 1 и 2: радиус
$r = isset($_GET['radius']) ? (float)$_GET['radius'] : 5;

//Задание 3 и 4: стороны треугольника
$a = isset($_GET['side_a']) ? (float)$_GET['side_a'] : 3;
$b = isset($_GET['side_b']) ? (float)$_GET['side_b'] : 4;
$c = isset($_GET['side_c']) ? (float)$_GET['side_c'] : 12;

//Задание 5: два числа
$num1 = isset($_GET['num1']) ? (float)$_GET['num1'] : 10;
$num2 = isset($_GET['num2']) ? (float)$_GET['num2'] : 7;

//Задание 6: строка
$str = isset($_GET['text']) ? $_GET['text'] : "Строка для проверки длины символов в ней";
?>


<h2>Задание 1 Длина окружности (L = 2πr)</h2>
<form method="GET">
    <label>Радиус r: </label>
    <input type="number" step="0.01" name="radius" value="<?= htmlspecialchars($r) ?>" required>
    <button type="submit">Посчитать</button>
</form>

<?php
$circumference = fn($r): float => 2 * M_PI * $r;
echo "Формула: L = 2 * π * r", '<br>';
echo '<div class="result">Длина окружности: ' . round($circumference($r), 4) . '</div>';
?>

<h2>Задание 2 Площадь круга (S = πr²)</h2>
<form method="GET">
    <label>Радиус r: </label>
    <input type="number" step="0.01" name="radius" value="<?= htmlspecialchars($r) ?>" required>
    <button type="submit">Посчитать</button>
</form>

<?php
$circleArea = fn($r): float => M_PI * $r ** 2;
echo "Формула: S = π * r²", '<br>';
echo '<div class="result">Площадь круга: ' . round($circleArea($r), 4) . '</div>';
?>

<h2>Задания 3 и 4 Площадь треугольника (по сторонам)</h2>
<form method="GET">
    <label>Сторона a: </label>
    <input type="number" step="0.01" name="side_a" value="<?= htmlspecialchars($a) ?>" required><br><br>
    
    <label>Сторона b: </label>
    <input type="number" step="0.01" name="side_b" value="<?= htmlspecialchars($b) ?>" required><br><br>
    
    <label>Сторона c: </label>
    <input type="number" step="0.01" name="side_c" value="<?= htmlspecialchars($c) ?>" required><br><br>
    
    <button type="submit">Посчитать</button>
</form>

<?php
$triangleArea = fn($a, $b, $c): float => (
    ($a <= 0 || $b <= 0 || $c <= 0 || $a + $b <= $c || $a + $c <= $b || $b + $c <= $a)
        ? 0
        : (function() use ($a, $b, $c) {
            $p = ($a + $b + $c) / 2;
            return sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
        })()
);

$result = $triangleArea($a, $b, $c);
//echo "Формула Герона: S = √(p × (p - a) × (p - b) × (p - c))" '<br>';
echo '<div class="result">';
echo $result == 0 ? 'Треугольник не существует (площадь = 0)' : 'Площадь треугольника: ' . round($result, 4);
echo '</div>';
?>


<h2>Задание 5 Сравнение двух чисел</h2>
<form method="GET">
    <label>Число 1: </label>
    <input type="number" step="0.01" name="num1" value="<?= htmlspecialchars($num1) ?>" required><br><br>
    
    <label>Число 2: </label>
    <input type="number" step="0.01" name="num2" value="<?= htmlspecialchars($num2) ?>" required><br><br>
    
    <button type="submit">Сравнить</button>
</form>

<?php
$compare = fn($x, $y): string => 
    $x > $y ? "Первое больше" : 
    ($x < $y ? "Первое меньше" : "Числа равны");

echo '<div class="result">Результат: ' . $compare($num1, $num2) . '</div>';
?>


<h2>Задание 6 Проверка длины строки</h2>
<form method="GET">
    <label>Введите текст: </label><br>
    <textarea name="text" rows="3" cols="50" required><?= htmlspecialchars($str) ?></textarea><br><br>
    <button type="submit">Проверить</button>
</form>

<?php
$checkStringLength = fn($s): string =>
    strlen($s) > 79 ? "String is long" :
    (strlen($s) < 32 ? "String is short" : "Length of String OK");

$length = strlen($str);
echo '<div class="result">';
echo "Длина строки: $length символов → " . $checkStringLength($str);
echo '</div>';
?>
