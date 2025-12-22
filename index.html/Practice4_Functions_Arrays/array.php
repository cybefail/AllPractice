<?php
echo '<h1>Массивы</h1>';

//пример массива
$arr = [15, -7, 33, 8, -12, 44, 3, 27];
?>

<?php
echo '<h2>Задание 1</h2>';
//мин и макс + их индексы
$min_value = min($arr);
$max_value = max($arr);
$min_index = array_search($min_value, $arr);
$max_index = array_search($max_value, $arr);

echo "Массив: ";
print_r($arr);
echo "Минимальный элемент: $min_value (индекс $min_index)<br>";
echo "Максимальный элемент: $max_value (индекс $max_index)<br>";
?>

<?php
echo '<h2>Задание 2</h2>';
$sum = array_sum($arr);
$product = array_product($arr);

echo "Массив: ";
print_r($arr);
echo "Сумма элементов: $sum<br>";
echo "Произведение элементов: $product<br>";
?>

<?php
echo '<h2>Задание 3</h2>';
$count = count($arr);
$average = $count > 0 ? array_sum($arr) / $count : 0;

echo "Массив: ";
print_r($arr);
echo "Среднее арифметическое: $average<br>";
?>

<?php
echo '<h2>Задание 4</h2>';
$floats = [3.5, -2.1, 7.8, -4.0, 0.0, -9.3]; //массив вещественных чисел

$new_arr = [];
foreach ($floats as $num) {
    if ($num > 0) {
        $new_arr[] = $num * $num;        //положительные -> квадрат
    } elseif ($num < 0) {
        $new_arr[] = abs($num);          //отрицательные -> модуль
    } else {
        $new_arr[] = 0;                  //0 = 0
    }
}

echo "Исходный массив: ";
print_r($floats);
echo "Преобразованный массив: ";
print_r($new_arr);
?>

<?php
echo '<h2>Задание 5</h2>';
$arr5 = [10, 20, 30, 40, 50, 60, 70];

echo "Исходный массив: ";
print_r($arr5);
echo "Элементы с чётными индексами (0, 2, 4...):<br>";

foreach ($arr5 as $index => $value) {
    if ($index % 2 === 0) {
        echo "$value (индекс $index)<br>";
    }
}
?>

<?php
echo '<h2>Задание 6</h2>';
$arr6 = [5, 2, 8, 3, 9, 1, 12];

echo "Исходный массив: ";
print_r($arr6);
echo "Элементы, которые больше предыдущего:<br>";

for ($i = 1; $i < count($arr6); $i++) {
    if ($arr6[$i] > $arr6[$i - 1]) {
        echo "$arr6[$i] (на позиции $i)<br>";
    }
}
?>

<?php
echo '<h2>Задание 7</h2>';
$arr7 = [1, 2, 3, 4, 5, 6, 7]; 

echo "Исходный массив: ";
print_r($arr7);

$size = count($arr7);

//переставить соседние элементы
for ($i = 0; $i < $size - 1; $i += 2) {
    $temp = $arr7[$i];
    $arr7[$i] = $arr7[$i + 1];
    $arr7[$i + 1] = $temp;
}
//если нечётное количество — последний остаётся на месте 
echo "Массив после перестановки соседних элементов: ";
print_r($arr7);
?>
