<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Вложенные циклы</h1>
        <h2>Задание 1</h2>
<?php
echo '<table border="1">';
for ($i=1 ; $i<=10 ; $i++){
    echo '<tr>';
    for ($j=1; $j<=10; $j++){
        $n = $i * $j;
    echo "<td style='width: 20px; height: px;'>",$n,"</td>";
    }
         echo '</tr>';
}
echo '</table>';
?>
<h2>Задание 2</h2>
<?php
$len = 3;
$width = 4;
for ($i=0; $i<$width; $i++){
    for ($j=1; $j<$width; $j++){
        echo 'X';
    }
    echo '<br>';
}
?>
<h2>Задание 3</h2>
<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Задание 4</h2>
    <table border="1px" width="100px" height="100px" cellpadding="10px">
        <caption>Таблица квадратов</caption>
        <tr height="50px" valign="top">
            <th>Числа</th>
            <th>Квадрат чисел</th> 
        </tr>

        <?php
        for ($i = 1; $i <= 10; $i++) { 
            echo "<tr>"; 
            echo "<td>$i</td>"; 
            echo "<td>" . ($i * $i) . "</td>"; 
            echo "</tr>"; 
        }
        ?>
    </table>
<?php
echo '</table>'; 
?>
<h2>Задание 5</h2>
<?php
$a = 5; 
$b = 3; 
for ($i = 0; $i < $b; $i++) { 
    for ($j = 0; $j < $a; $j++) { 
        if ($i == 0 or $i == $b - 1 or $j == 0 or $j == $a - 1) {
            echo ">"; //контур
        } else {
            echo "*"; //заливка
        }
    }
    echo '<br>';
}
?>
    <h2>Задание 6</h2>
    <?php
    $n = 3.14; 
    echo "Делители числа $n: ";
    for ($i = 1; $i <= $n; $i++) {
        if ($n % $i == 0) {
            echo "$i ";
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Задание 7</h2>
    <form method="GET">
        Введи число: <input type="number" name="n" required><br>
        <input type="submit" value="Посчитать">
    </form>

    <?php
    if (isset($_GET['n'])) {
        $n = $_GET['n']; 
        $result = 1; 
        $temp = $n; 
        while ($temp > 0) {
            $digit = $temp % 10; 
            $result = $result * $result; 
            $temp = (int)($temp / 10); 
        }

        echo "Произведение цифр числа $n: $product";
    }
    ?>
</body>
</html>

