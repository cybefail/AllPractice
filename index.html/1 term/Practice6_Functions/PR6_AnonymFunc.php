<?php
echo '<h1>Анонимные функции</h1>';
echo '<h2>Задача 1</h2>';
$numbers  = [1, 2, 3, 4, 5, 6];
$is_even = fn($n) => $n % 2 === 0;
$even_numbers = array_filter($numbers, $is_even);
if (!empty($even_numbers)) {
  echo "Массив четных чисел: \n";
   print_r(array_values($even_numbers));
} else {
   echo "В последовательности нет четных чисел.", '<br>';
}
?>

<?php
echo '<h2>Задача 2</h2>';
$array = [1, -2, 3, 0, 4];
function cube($num) {
    return $num ** 3;
}
$cubedNumbers = array_map('cube', $array);
echo "Массив кубов: " . implode(', ', $cubedNumbers);
?>


<?php
echo '<h2>Задача 3</h2>';
$data = [2, 4, 8, 10];
$count = count($data);
if ($count === 0) {
    echo "Массив пуст, невозможно вычислить средние.", '<br>';
} else {
    $sum = array_reduce($data, fn($carry, $item) => $carry + $item, 0);
    $arithmetic_mean = $sum / $count;
    $product = array_reduce($data, fn($carry, $item) => $carry * $item, 1);
    if (in_array(0, $data, true)) {
        $geometric_mean_str = "0 (т.к. в массиве есть 0)";
    } elseif ($product < 0 && $count % 2 === 0) {
        $geometric_mean_str = "Не определено (произведение отрицательное, количество элементов четное)";
    } elseif ($product < 0 && $count % 2 !== 0) {
        $geometric_mean = -pow(abs($product), 1 / $count);
        $geometric_mean_str = $geometric_mean;
    } else {
        $geometric_mean = pow($product, 1 / $count);
        $geometric_mean_str = $geometric_mean;
    }
    echo "Массив чисел: ", implode(', ', $data), '<br>';
    echo "Среднее арифметическое: $arithmetic_mean", '<br>';
    echo "Среднее геометрическое: $geometric_mean_str", '<br>';
}
?>

<?php
echo '<h2>Задача 4</h2>';
$students = [
    ['name' => 'Вася', 'birth' => 2005, 'height' => 175],
    ['name' => 'Егор', 'birth' => 2006, 'height' => 180],
    ['name' => 'Настя', 'birth' => 2007, 'height' => 175],
    ['name' => 'Вера', 'birth' => 2008, 'height' => 165],
];
function heightFilter($student) {
    return $student['height'] > 170;
}
$tall_students_data = array_filter($students, 'heightFilter');
$count_tall_students = count($tall_students_data);
function nameExtractor($student) {
    return $student['name'];
}
$tall_students_names = array_map('nameExtractor', $tall_students_data);
echo "Число студентов выше 170 см: $count_tall_students", '<br>';
if ($count_tall_students > 0) {
    echo "Список их имен: ", implode(', ', $tall_students_names), "<br>";
} else {
    echo "Студентов выше 170 см не найдено.", '<br>';
}
?>



<?php
echo '<h2>Задача 5</h2>';
$numbers = [-2.5, 0, 3.7, -1.2, 0, 8.9, -4];
$negativeCount = count(array_filter($numbers, fn($n) => $n < 0));
$zeroCount = count(array_filter($numbers, fn($n) => $n == 0));
$positiveCount = count(array_filter($numbers, fn($n) => $n > 0));
echo "Отрицательных: $negativeCount", '<br>';
echo "Нулевых: $zeroCount", '<br>';
echo "Положительных: $positiveCount", '<br>';
?>

<?php
echo '<h2>Задача 6</h2>';
$numbers = [1.5, 3.0, 2.0, 2.0, 4.5, 2.0, 3.5];
$K = 2.0;
$lessCount = count(array_filter($numbers, fn($n) => $n < $K));
$equalCount = count(array_filter($numbers, fn($n) => $n == $K));
$greaterCount = count(array_filter($numbers, fn($n) => $n > $K));
echo "Меньше $K: $lessCount", '<br>';
echo "Равно $K: $equalCount", '<br>';
echo "Больше $K: $greaterCount", '<br>';
?>



<?php
echo '<h2>Задача 7</h2>';
$numbers = [10, 15, 20, 25, 30, 35, 40, 45, 50];
$M = 10;
$L = 20;
$N = 45;
$count = count(array_filter($numbers, fn($num) => 
    $num % $M == 0 && $num >= $L && $num <= $N
));
echo "Количество чисел, кратных $M в промежутке [$L, $N]: $count", '<br>';
?>