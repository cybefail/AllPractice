<h1>Циклы</h1>
<h2>Задание 1</h2>
<p>Геометрическая прогрессия:</p>
<?php
$startNumber = 1;     //начальное значение
$multiplier = 2;      //множитель
$quantity = 10;       //сколько чисел вывести

$current = $startNumber;
$i = 0;
while ($i < $quantity) {
    echo $current . '<br>';
    $current *= $multiplier;
    $i++;
}
?>

<h2>Задание 2</h2>
<p>Сумма чисел от 1 до n:</p>
<?php
$lastNumber = 10;  // до какого числа суммируем
$sum = 0;
$i = 1;

while ($i <= $lastNumber) {
    $sum += $i;
    $i++;
}
echo "Сумма чисел от 1 до $lastNumber = $sum";
?>

<h2>Задание 3</h2>
<p>Произведение всех чётных чисел от 1 до n:</p>
<?php
$lastNumber = 10;               //до какого числа идём
$multiplicationResult = 1;       //начинаем с 1 (не с 0!)
$i = 2;                         //первое чётное число

while ($i <= $lastNumber) {
    $multiplicationResult *= $i;
    $i += 2;                    //переходим к следующему чётному
}
echo "Произведение чётных чисел от 1 до $lastNumber = $multiplicationResult";
?>

<h2>Задание 4</h2>
<p>Суммарный путь спортсмена за n дней:</p>
<?php
$n = 7;                    //количество дней 
$distance = 10;            //км в первый день
$total = 10;               //общий путь 
$day = 2;

while ($day <= $n) {
    $distance *= 1.1;      // +10% от предыдущего дня
    $total += $distance;
    $day++;
}
//округление до 2 знаков после запятой
$total = round($total, 2);
echo "За $n дней спортсмен пробежит $total км";
?>

<h2>Задание 5</h2>
<p>У гусей и кроликов вместе 64 лапы. Возможные сочетания:</p>
<?php
    // Пусть x — количество кроликов (4 лапы)
    // y — количество гусей (2 лапы)
    // 4x + 2y = 64
    // Упрощаем: 2x + y = 32 → y = 32 - 2x

$rabbits = 0;

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Кролики</th><th>Гуси</th><th>Всего лап</th></tr>";

while ($rabbits <= 16) {  // максимум 16 кроликов (64/4=16)
    $geese = 32 - 2 * $rabbits;
    if ($geese >= 0) {  // гуси не могут быть отрицательными
        $total_legs = 4 * $rabbits + 2 * $geese;
        echo "<tr><td>$rabbits</td><td>$geese</td><td>$total_legs</td></tr>";
    }
    $rabbits++;
}
echo "</table>";
?>

