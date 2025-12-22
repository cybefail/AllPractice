<?php
//пр8 задание 2 +
echo '<h1>Ссылки</h1>';
echo '<h2>Задание 1</h2>';

echo '<h3>Функции, принимающие ссылки: </h3>', '<br>';
echo "array_walk — Применяет пользовательскую функцию к каждому элементу массива", '<br>';
echo "array_walk_recursive — Рекурсивно применяет пользовательскую функцию к каждому элементу массива", '<br>';
echo "arsort — Сортирует массив в порядке убывания, сохраняя ассоциацию индексов", '<br>';
echo "asort — Сортирует массив в порядке возрастания, сохраняя ассоциацию индексов", '<br>';
echo "krsort — Принимает массив по ссылке и сортирует по ключам по убыванию.", '<br>';
echo "ksort — Принимает массив по ссылке и сортирует по ключам по возрастанию.", '<br>';
echo "array_pop — Принимает массив по ссылке и удаляет последний элемент.", '<br>';
echo "array_pad — Не изменяет исходный массив, возвращает новый.", '<br>';
echo "array_push — Принимает массив по ссылке и добавляет элементы в конец.", '<br>';
echo "array_change_key_case — Изменяет регистр ключей в массиве напрямую.", '<br>';
echo "array_fill — Не принимает ссылку, но модифицирует массив при создании.", '<br>';
echo "array_fill_keys — Создаёт массив, не изменяет существующий, но работает с переданными данными.", '<br>';
echo "array_filter — Фильтрует элементы массива через callback-функцию", '<br>';
echo "array_map — Применяет callback-функцию к элементам массивов", '<br>';
echo "array_merge — Сливает один или несколько массивов", '<br>';
echo "array_merge_recursive — Рекурсивно сливает один или несколько массивов", '<br>';
echo "array_multisort — Сортирует набор массивов или многомерные массивы", '<br>';
echo "array_replace — Заменяет элементы массива элементами других массивов", '<br>';
echo "array_replace_recursive — Рекурсивно заменяет элементы первого массива элементами других массивов", '<br>';
echo "array_reverse — Возвращает массив с элементами в обратном порядке", '<br>';
echo "array_shift — Извлекает первый элемент массива", '<br>';
echo "array_splice — Удаляет часть массива и заменяет её новыми элементами", '<br>';
echo "array_unshift — Добавляет один или несколько элементов в начало массива", '<br>';
echo "natcasesort — Сортирует массив алгоритмом естественной сортировки (natural order) без учёта регистра символов", '<br>';
echo "natsort — Сортирует массив алгоритмом «естественного упорядочивания»", '<br>';
echo "rsort — Сортирует массив в порядке убывания", '<br>';
echo "shuffle — Перемешивает массив", '<br>';
echo "sort — Сортирует массив по возрастанию", '<br>';
echo "uasort — Сортирует массив пользовательской функцией сравнения, сохраняя ассоциацию индексов", '<br>';
echo "uksort — Сортирует массив по ключам пользовательской функцией сравнения", '<br>';
echo "usort — Сортирует массив по значениям через пользовательскую функцию сравнения элементов";
?>

<?php
echo '<h2>Задание 2</h2>';
function cubeNumber(&$number) {
    $number = $number ** 3; // возведение в куб
}
$num = 4;
echo "До (число): $num", '<br>';
cubeNumber($num);
echo "После (квадрат числа): $num"; // 4 в кубе => 64


echo '<h2>Задание 3</h2>';
function removeCommas(&$string) {
    $string = str_replace(',', '', $string); // удаление запятых
}
$str = "Hello , world , how , are , you ";
echo "До: $str", '<br>';
removeCommas($str);
echo "После: $str", '<br>'; 

echo '<h2>Задание 4</h2>';
function reverseWords(&$string) {
    //строку на слова
    $words = explode(' ', $string);
    //задом наперед каждое слово
    $words = array_map('strrev', $words);
    //обратное действие
    $string = implode(' ', $words);
}
$str = "Hello world PHP";
echo "До: $str", '<br>';
reverseWords($str);
echo "После: $str";


echo '<h2>Задание 5</h2>';
function makeAbsolute(&$array) {
    array_walk($array, function(&$value) {
        $value = abs($value);
    });
}
$arr = [21, -3, 0, -5, -32];
echo "До (числа): " . implode(', ', $arr), '<br>';
makeAbsolute($arr);
echo "После (модули чисел выше): " . implode(', ', $arr), '<br>';


echo '<h2>Задание 6</h2>';
function rekey_by_value(&$arr) {
$new = [];
    foreach ($arr as $v) {
        $new[(string)$v] = $v;
    }
    $arr = $new;
}
$a = [21, 3, 0, 5, -32];
echo "До: [", implode(', ', $a), "]<br>";
rekey_by_value($a); //изменение ключей по значению
echo "После: ";
$output = [];
foreach ($a as $key => $value) {
    $output[] = "'$key' => $value";
    }
    echo "[", implode(', ', $output), "]<br>";
?>