<?php
//10ПР задание
echo '<h2>Задание 1 - ФИО</h2>';
if (isset($_GET['fio'])) {
    echo "<b>Вы ввели:</b> " . htmlspecialchars($_GET['fio']) . "<hr>";
}
?>
<form method="get">
    Фамилия Имя Отчество: <input type="text" name="fio" required>
    <button type="submit">Отправить</button>
</form>
<hr>

<?php
echo '<h2>Задание 2 - Делители числа</h2>';
if (isset($_GET['num2'])) {
    $n = (int)$_GET['num2'];
    echo "<b>Число:</b> $n<br><b>Делители:</b> ";
    if ($n <= 0) {
        echo "Введите положительное число";
    } else {
        $divisors = [];
        for ($i = 1; $i <= $n; $i++) {
            if ($n % $i == 0) $divisors[] = $i;
        }
        echo implode(", ", $divisors);
    }
    echo "<hr>";
}
?>
<form method="get">
    Введите число: <input type="number" name="num2" min="1" required>
    <button type="submit">Найти делители</button>
</form>
<hr>

<?php
echo '<h2>Задание 3 - Площадь треугольника</h2>';
if (isset($_GET['a']) && isset($_GET['b']) && isset($_GET['c'])) {
    $a = (float)$_GET['a'];
    $b = (float)$_GET['b'];
    $c = (float)$_GET['c'];
    
    if ($a > 0 && $b > 0 && $c > 0 && ($a + $b > $c) && ($a + $c > $b) && ($b + $c > $a)) {
        $p = ($a + $b + $c) / 2;
        $s = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
        echo "Площадь треугольника: " . round($s, 2);
    } else {
        echo "Треугольник не существует";
    }
    echo "<hr>";
}
?>
<form method="get">
    Сторона a: <input type="number" step="0.01" name="a" required>
    Сторона b: <input type="number" step="0.01" name="b" required>
    Сторона c: <input type="number" step="0.01" name="c" required>
    <button type="submit">Вычислить площадь</button>
</form>
<hr>

<?php
echo '<h2>Задание 4 - Квадратное уравнение</h2>'; 
if (isset($_GET['a4'])) {
    $a = (float)$_GET['a4'];
    $b = (float)$_GET['b4'];
    $c = (float)$_GET['c4'];
    
    if ($a == 0) {
        echo "Это не квадратное уравнение (a = 0)";
    } else {
        $d = $b*$b - 4*$a*$c;
        if ($d > 0) {
            $x1 = (-$b + sqrt($d)) / (2*$a);
            $x2 = (-$b - sqrt($d)) / (2*$a);
            echo "Два корня: x1 = " . round($x1, 3) . ", x2 = " . round($x2, 3);
        } elseif ($d == 0) {
            $x = -$b / (2*$a);
            echo "Один корень: x = " . round($x, 3);
        } else {
            echo "Действительных корней нет";
        }
    }
    echo "<hr>";
}
?>
<form method="get">
    a: <input type="number" step="any" name="a4" required>
    b: <input type="number" step="any" name="b4" required>
    c: <input type="number" step="any" name="c4" required>
    <button type="submit">Найти корни</button>
</form>
<hr>

<?php
echo '<h2>Задание 5 - Тройка Пифагора</h2>'; 
if (isset($_GET['p1'])) {
    $nums = [(float)$_GET['p1'], (float)$_GET['p2'], (float)$_GET['p3']];
    sort($nums);
    $a = $nums[0]; $b = $nums[1]; $c = $nums[2];
    
    if (abs($a*$a + $b*$b - $c*$c) < 0.001) {  
        echo "Да, это тройка Пифагора: {$a}² + {$b}² = {$c}²";
    } else {
        echo "Нет, это НЕ тройка Пифагора";
    }
    echo "<hr>";
}
?>
<form method="get">
    Число 1: <input type="number" name="p1" required>
    Число 2: <input type="number" name="p2" required>
    Число 3: <input type="number" name="p3" required>
    <button type="submit">Проверить Пифагора</button>
</form>
<hr>

<?php
echo '<h2>Задание 6 - Дней до дня рождения</h2>'; 
if (isset($_GET['birth'])) {
    $birth = $_GET['birth'];
    if (preg_match('/^(\d{2})\.(\d{2})\.(\d{4})$/', $birth, $m)) {
        $day = $m[1]; $month = $m[2]; $year = $m[3];
        
        $thisYear = date('Y');
        $birthdayThisYear = strtotime("$thisYear-$month-$day");
        $now = time();
        
        if ($birthdayThisYear < $now) {
            $birthdayThisYear = strtotime(($thisYear + 1) . "-$month-$day");
        }
        
        $days = floor(($birthdayThisYear - $now) / 86400);
echo "До вашего дня рождения осталось: <b>$days</b> дней";
    } else {
        echo "Неверный формат. Используйте: дд.мм.гггг";
    }
    echo "<hr>";
}
?>
<form method="get">
    Дата рождения (дд.мм.гггг): <input type="text" name="birth" placeholder="01.12.1990" required>
    <button type="submit">Сколько дней до Дня рождения?</button>
</form>
