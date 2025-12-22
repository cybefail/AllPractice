<?php
echo '<h2>Задание 1</h2>';
$str = '1,2,3,0,4,5';
$arr = array_map('trim', explode(',', $str));
$zeroPos = array_search('0', $arr);
echo $zeroPos !== false ? "Элементы до нуля: " . implode(', ', array_slice($arr, 0, $zeroPos + 1)) : "Нуля нет";
?>

<?php
function isPrime($n) {
    if ($n < 2) return false;
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i === 0) return false;
    }
    return true;
}

echo '<h2>Задание 2</h2>';
$numbers2 = [5, 2, 8, 1, 9, 3];
$minIndex = array_search(min($numbers2), $numbers2);
$maxIndex = array_search(max($numbers2), $numbers2);
[$numbers2[$minIndex], $numbers2[$maxIndex]] = [$numbers2[$maxIndex], $numbers2[$minIndex]];
print_r($numbers2);


echo '<h2>Задание 3</h2>';
$arr = [10, 0, 45, 0, 67, 8, 0, 23];

$zero_indices = [];

foreach ($arr as $index => $value) {
    if ($value === 0) {
        $zero_indices[] = $index;
    }
}

echo "Исходный массив: ";
print_r($arr);
echo "<br>Номера (индексы) нулевых элементов: ";
print_r($zero_indices);
?>
<br><br>


<?php
echo '<h2>Задание 4</h2>';
$arr = [7, 0, 12, 0, 3, 9, 0, 15];

//удаление всех нулевых элементов
$arr_without_zeros = array_filter($arr, function($value) {
    return $value !== 0;
});

echo "Исходный массив: ";
print_r($arr);
echo "<br>Массив без нулевых элементов: ";
print_r($arr_without_zeros);
?>
<br><br>


<?php
echo '<h2>Задание 5</h2>';

//массив из задания 4 после удаления нулей
$arr_from_task4 = [7, 12, 3, 9, 15];  //например после array_filter

echo "Массив до переиндексации (может иметь неупорядоченные индексы):<br>";
$bad_arr = [1 => 10, 4 => 20, 7 => 30, 2 => 40]; 
print_r($bad_arr);

echo "<br>Массив после переиндексации (индексы с 0 по порядку):<br>";
$reindexed_arr = array_values($bad_arr);

print_r($reindexed_arr);

echo "<br><br>Проверка массива из задания 4 после переиндексации:<br>";
$reindexed_task4 = array_values($arr_from_task4);
print_r($reindexed_task4);
?>
