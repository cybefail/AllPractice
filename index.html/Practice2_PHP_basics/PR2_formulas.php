<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
</head>
<body>
    <?php
    echo '<h1>Формулы</h1>';
    echo '<h2>Формула 1</h2>';
    $a = 4;
    $b = 5;
    $c = 2;
    $d = 6;
    $s = ($a / $c * $b / $d) - $a * $b - $c / $c * $d;
    echo "Формула 1: (a / c * b / d) - a * b - c / c * d", '<br>';
    echo "a: $a", '<br>';
    echo "b: $b", '<br>';
    echo "c: $c", '<br>';
    echo "d: $d", '<br>';
    echo "Результат: $s";
    ?>
    <?php
    echo '<h2>Формула 2</h2>';
    $x = 10;
    $y = 5;
    $c = 1;
    $d = 12;
    $e = 34;
    $s = ($x + $y / $x + $c) - $x * $y - $d / $e + $x;
    echo "Формула 2: (x + y / x + c) - x * y - d / e + x", '<br>';
    echo "x: $x", '<br>';
    echo "y: $y", '<br>';
    echo "c: $c", '<br>';
    echo "d: $d", '<br>';
    echo "e: $e", '<br>';
    echo "Результат: $s";
    ?>
    <?php
    echo '<h2>Формула 3</h2>';
    $x = 10;
    $y = 1;
    $c = 18;
    $d = 2;
    $s = (($x + $y) / ($x - $y)) **$d + ($c * $x * $y)**$d;
    echo "Формула 3:  ((x + y) / (x - y)) **d + (c * x * y)**d", '<br>';
    echo "x: $x", '<br>';
    echo "y: $y", '<br>';
    echo "c: $c", '<br>';
    echo "d: $d", '<br>';
    echo "Результат: $s";
    ?>
    <?php
    echo '<h2>Формула 4</h2>';
    $x = 10;
    $y = 5;
    $c = 1;
    $d = 2;
    $e = 12;
    $s = ($c + ($c / $x**$d))**$x - $e * $x **2 * $y;
    echo "Формула 4: (c + (c / x**d))**x - e * x **2 * y", '<br>';
    echo "x: $x", '<br>';
    echo "y: $y", '<br>';
    echo "c: $c", '<br>';
    echo "d: $d", '<br>';
    echo "e: $e", '<br>';
    echo "Результат: $s";
    ?>
</body>
</html>