<h1>Условия</h1>
<h2>Задание 1</h2>
<form method="GET">
    Введите число a: <input type="number" name="a"><br><br>
    Введите число b: <input type="number" name="b"><br><br>
    <input type="submit" value="Отправить">
</form>

<?php
if (isset($_GET['a']) && isset($_GET['b'])) {
    $a = (int)$_GET['a'];
    $b = (int)$_GET['b'];

    if ($a > $b) {
        echo "<p>Результат: сумма = " . ($a + $b) . "</p>";
    } else {
        echo "<p>Результат: произведение = " . ($a * $b) . "</p>";
    }
}
?>


<h2>Задание 2</h2>
<form method="GET">
    Введите угол 1 (в градусах): <input type="number" name="angle1"><br><br>
    Введите угол 2 (в градусах): <input type="number" name="angle2"><br><br>
    <input type="submit" value="Отправить">
</form>

<?php
if (isset($_GET['angle1']) && isset($_GET['angle2'])) {
    $angle1 = (int)$_GET['angle1'];
    $angle2 = (int)$_GET['angle2'];
    $angle3 = 180 - $angle1 - $angle2;

    if ($angle1 > 0 && $angle2 > 0 && $angle3 > 0) {
        echo "<p>Треугольник существует. Третий угол = $angle3°</p>";
    } else {
        echo "<p>Треугольник с такими углами не существует.</p>";
    }
}
?>

<h2>Задание 3-4</h2>
<form method="GET">
    Введите сторону a: <input type="number" name="side1"><br><br>
    Введите сторону b: <input type="number" name="side2"><br><br>
    Введите сторону c: <input type="number" name="side3"><br><br>
    <input type="submit" value="Отправить">
</form>

<?php
if (isset($_GET['side1']) && isset($_GET['side2']) && isset($_GET['side3'])) {
    $side1 = (float)$_GET['side1'];
    $side2 = (float)$_GET['side2'];
    $side3 = (float)$_GET['side3'];

//Проверка существования треугольника
    if ($side1 + $side2 > $side3 && 
        $side1 + $side3 > $side2 && 
        $side2 + $side3 > $side1 &&
        $side1 > 0 && $side2 > 0 && $side3 > 0) {
        echo "<p>Треугольник существует.</p>";
//Проверка на прямоугольность (по теореме Пифагора)
        $sides = [$side1, $side2, $side3];
        sort($sides);
        $a = $sides[0];
        $b = $sides[1];
        $c = $sides[2];
        if (abs($a*$a + $b*$b - $c*$c) < 0.0001) {  // с погрешностью для float
            echo "<p>Это прямоугольный треугольник.</p>";
        } else {
            echo "<p>Это не прямоугольный треугольник.</p>";
        }
    } else {
        echo "<p>Треугольник с такими сторонами не существует.</p>";
    }
}
?>


<h2>Задание 5</h2>
<form method="GET">
    Введите год: <input type="number" name="year" min="1"><br><br>
    <input type="submit" value="Отправить">
</form>

    <?php
if (isset($_GET['year'])) {
    $year = (int)$_GET['year'];
    if ($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0)) {
        echo "<p>$year год — високосный.</p>";
    } else {
        echo "<p>$year год — НЕ високосный.</p>";
    }
}
?>
