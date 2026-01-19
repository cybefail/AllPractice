<h1>Функции</h1>
<h2>Задание 1</h2>
<form method="GET">
    Введите радиус: <input type="number" name="r" required><br>
    <input type="submit" value="Посчитать длину окружности">
</form>

<?php
function circleLength($radius) {
    $pi = 3.14; 
    $length = 2 * $pi * $radius; 
    return $length;
}
$result = circleLength(10);
echo "Длина окружности с радиусом 10: $result";
?>


<h2>Задание 2</h2>
<form method="GET">
    Введите сторону a: <input type="number" name="a" required><br>
    Введите сторону b: <input type="number" name="b" required><br>
    Введите сторону c: <input type="number" name="c" required><br>
    <input type="submit" value="Посчитать площадь">
</form>

<?php
function triangleSquare($a, $b, $c) {
    if ($a <= 0 || $b <= 0 || $c <= 0) {
        return 0;
    }
    if ($a + $b <= $c || $a + $c <= $b || $b + $c <= $a) {
        return 0;
    }
    $p = ($a + $b + $c) / 2;
    $square = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
    return $square;
}
if (isset($_GET['a']) && isset($_GET['b']) && isset($_GET['c'])) {
    $a = (float)$_GET['a'];
    $b = (float)$_GET['b'];
    $c = (float)$_GET['c'];
    if (is_numeric($a) && is_numeric($b) && is_numeric($c)) {
        $result = triangleSquare($a, $b, $c);
        if ($result == 0) {
            echo "Треугольник с сторонами a=$a, b=$b, c=$c невозможен!";
        } else {
            echo "Площадь треугольника с сторонами a=$a, b=$b, c=$c: $result";
        }
    } else {
        echo "Введите корректные числа!";
    }
}
?>

<h2>Задание 3</h2>
<form method="GET">
    Введите число: <input type="number" name="a" required><br>
    <input type="submit" value="Наибольший делитель заданного числа">
</form>

<?php
function divisorOfNumber($a) {
    $a = (int)$a; 
    if ($a <= 1) { 
        return 0;
    }
    for ($i = $a - 1; $i >= 1; $i--) { 
        if ($a % $i == 0) { 
            return $i; 
    }
}
return 0; 
}
if (isset($_GET['a'])) {
    $input = $_GET['a'];
    $a = (int)$input; 
    if ((string)$a === $input && $a > 0) {
        $result = divisorOfNumber($a);
        if ($result == 0) {
            echo "Для числа $a наибольшего делителя нет";
        } else {
            echo "Наибольший делитель числа $a: $result";
        }
    } else {
        echo "Введите положительное целое число!";
    }
}
?>


<h2>Задание 4</h2>
    <form action="">
        <label>Введите число: <input type="text" name="task4"></label><br>
        <input type="submit" value="Вычислить"><br><br>
    </form>
<?php
function findAllDividers($num) {
     $dividers = [];
    if ($num <= 0) {
        return [];
    }
    for ($i = 1; $i <= $num; $i++) {
        if ($num % $i == 0) {
            $dividers[] = $i;
        }
    }
    return $dividers;
}
if(isset($_GET["task4"]) && $_GET["task4"] != ""){
    $x = $_GET["task4"];
    $result = findAllDividers($x);
    echo "Все делители для ", $x, ": ";
    foreach ($result as $divider) {
    echo $divider, ' ';
    }
} else {}
?>

<h2>Задание 5</h2>
    <form method="GET">
        Введите числа (через пробел): <input type="text" name="numbers" required><br>
        <input type="submit" value="Посчитать сумму квадратов">
    </form>

<?php
function sumOfSquares($numbers) {
    $sum = 0; 
    foreach ($numbers as $num) {
        $sum = $sum + ($num * $num);
    }
    return $sum;
}
if (isset($_GET['numbers'])) {
    $input = $_GET['numbers'];
    $numbers = explode(" ", $input); 
    $valid = true;
    foreach ($numbers as &$num) {
        if ((string)(float)$num === $num) { 
            $num = (float)$num; 
        } else {
            $valid = false; 
            break;
        }
    }

    if ($valid && !empty($numbers)) {
        $result = sumOfSquares($numbers);
        echo "Сумма квадратов чисел [" . implode(", ", $numbers) . "]: $result";
    } else {
        echo "Введите корректные числа через пробел!";
    }
}
?>


<br>☆*: .｡. o(≧▽≦)o .｡.:*☆
(❁´◡`❁)