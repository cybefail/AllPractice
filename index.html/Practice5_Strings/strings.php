<?php
echo '<h1>Строки и строковые функции</h1>';
echo '<h2>Задание 1</h2>';
$str = '(1, 2, 3, 4, 5)';
//$result = trim(substr($str, 1, -1)); - удаление скобок-первого и последнего символа
$start = strpos($str, '(');
$end = strpos($str, ')');
$result = substr($str, $start + 1, $end - $start - 1);
echo $result; 
?>

<?php
echo '<h2>Задание 2</h2>';
$str = "Строка с некоторым количеством слов.";
$words = explode(' ', rtrim($str, '.'));
echo "Количество слов в строке: ", count($words);
?>

<?php
echo '<h2>Задание 3</h2>';
$str = "лол прикол кек";
$words = explode(' ', $str);
$result_words = [];
foreach ($words as $word) {
    if ($word !== "") {
        $length = mb_strlen($word);
        $firstChar = mb_substr($word, 0, 1);
        $lastChar = mb_substr($word, $length - 1, 1);
        if ($firstChar === $lastChar) {
            $result_words[] = $word;
        }
    }
}
echo implode(', ', $result_words);
?>


<?php
echo '<h2>Задание 4</h2>';
$str = 'Символы в предложении';
$unique_chars = "";
$count = 0;
for ($i = 0; $i < mb_strlen($str); $i++) {
    $char = mb_substr($str, $i, 1);
    if (mb_strpos($unique_chars, $char) === false) {
        $unique_chars .= $char;
        $count++;
    }
}
echo "Количество различных символов в строке: $count", '<br>';
echo "Символы: $unique_chars ";
?>

<?php
if (isset($_GET['str'])) {
    $str = $_GET['str']; 
    $unique_chars = ""; 
    $count = 0; 
    foreach (str_split($str) as $char) {
        if (mb_strpos($unique_chars, $char) === false) {
            $unique_chars .= $char; 
            $count++; 
        }
    }
    if ($count == 0) {
        echo "Строка пуста!";
    } else {
        echo "Количество различных символов в строке: $count<br>";
        echo "Символы: $unique_chars";
        }
}
?>


<?php
echo '<h2>Задача 5</h2>';
$str = "Разработка и программирование продукта";
$count_r = substr_count($str, 'р'); 
$count_k = substr_count($str, 'к');
$count_t = substr_count($str, 'т');
echo "р: $count_r, к: $count_k, т: $count_t";
?>


<?php
echo '<h2>Задание 6</h2>';
$str = "Дана строка содержащая текст с разными словами";

//строку на слова (разделитель - пробелы)
$words = explode(' ', $str);

//убрать пустые элементы, если несколько пробелов подряд
$words = array_filter($words);

if (empty($words)) {
    echo "В строке нет слов.";
} else {
    $min_length = mb_strlen($words[0]);
    $max_length = mb_strlen($words[0]);
    $shortest_word = $words[0];
    $longest_word = $words[0];

    foreach ($words as $word) {
        $len = mb_strlen($word);
        if ($len < $min_length) {
            $min_length = $len;
            $shortest_word = $word;
        }
        if ($len > $max_length) {
            $max_length = $len;
            $longest_word = $word;
        }
    }

    echo "Самое короткое слово: \"$shortest_word\" (длина: $min_length)<br>";
    echo "Самое длинное слово: \"$longest_word\" (длина: $max_length)";
}
?>
<?php
echo '<h2>Задание 7</h2>';
$str = "ааа бб ааааа ввв аа гггг аааа";

//самая длинная последовательность а подряд
$max_count = 0;
$current_count = 0;

for ($i = 0; $i < mb_strlen($str); $i++) {
    $char = mb_substr($str, $i, 1);
    
    if ($char === 'а') {
        $current_count++;
        if ($current_count > $max_count) {
            $max_count = $current_count;
        }
    } else {
        $current_count = 0; //сбрасывается счётчик, если не 'а'
    }
}

if ($max_count > 0) {
    echo "Самая длинная последовательность букв 'а': $max_count";
} else {
    echo "В строке нет буквы 'а'";
}
?>