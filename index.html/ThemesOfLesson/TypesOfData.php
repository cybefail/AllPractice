<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
</head>
<body>
    <?php
    echo '<h1>Типы данных</h1>';
    echo '<h2>Целые числа</h2>';
    $n = 52478;
    $n2 = 0110011;
    $n8 = 01232461;
    $n16 = 0x1af;
    $m = -73728919263535;
    $e = 83892e-5;
    echo $n, '<br>', $m;
    $type = gettype(value: $n);
    echo $type;
    echo '<h2>Строки</h2>';
    $string1 = "Строка 'ккк' два ";
    $str = '';
    $str = '0';
    echo $string.$string1,'<br>';
    echo '<h2>Логический тип</h2>';
    $a = true;
    $b = false;
    echo $a, '<br>', $b, '<br>';
    echo gettype(value: $a)
    echo'<h2>null</h2>';
    $a = null;
    echo $a, '<br>';
    echo gettype(value: $a);

    ?>
</body>
</html>