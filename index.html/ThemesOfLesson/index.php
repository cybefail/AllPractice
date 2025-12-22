<?php
echo "Привет, PHP!";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
</head>
<body>
    <?php
    echo '<h1>Формулы</h1>';
    echo '<h2>Формула 1 -путь</h2>';
    $a = 10;
    $t = 5;
    $v = 20;
    $s = $v + $a * $t**2/2;
    echo "Ускорение: $a", '<br>';
    echo "Время: $t", '<br>';
    echo "Нач скорость: $v", '<br>';
    echo "Путь: $s";
    ?>
</body>
</html>
