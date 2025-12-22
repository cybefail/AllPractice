<h1>Ассоциативные массивы задания</h1>
<h2>Задание 1</h2>
<?php
$array = ['Monday'=> 'Понедельник', 'Tuesday'=> 'Вторник', 'Wednesday'=> 'Среда', 'Thursday'=> 'Четверг', 'Friday'=> 'Пятница', 'Saturday'=> 'Суббота', 'Sunday'=> 'Воскресенье', 'Week'=> 'Неделя', 'Weekend'=> 'Выходные', 'Day'=> 'День'];
//unset($array['two']);
foreach($array as $key => $item){
    echo "<p> $key - $item, </p>";
}
?>

<h2>Задание 2 и 3</h2>
        <form action="">
            <label>Ввод слова: <input type="text" name = "task2"></label><br>
            <input type="submit" name="subtask2" value="Найти"><br><br>
        </form>
        <?php
        $dictionary = [
            'Один' => 'One',
            'Два' => 'Two',
            'Три' => 'Three',
            'Monday' => 'Понедельник',
            'Tuesday' => 'Вторник',
            'Wednesday' => 'Среда',
            'Thursday' => 'Четверг',
            'Friday' => 'Пятница',
            'Saturday' => 'Суббота',
            'Sunday' => 'Воскресенье',
            'Week' => 'Неделя',
            'Weekend' => 'Выходные',
            'Day' => 'День'
];

        if (isset($_GET['task2'])) {
            $input = trim(mb_strtolower($_GET['task2']));
            $translation = null;
            foreach ($dictionary as $english => $russian) {
                if (mb_strtolower($english) === $input) {
                    $translation = $russian;
                    echo "<b>$input</b> - $translation";
                    break;
                }
            }
            if ($translation === null) {
                foreach ($dictionary as $english => $russian) {
                    if (mb_strtolower($russian) === $input) {
                        $translation = $english;
                        echo "<b>$input</b> - $translation";
                        break;
                    }
                }
            }
            if ($translation === null) {
                echo "<b>$input</b> - В словаре нет такого слова";
            }
        }
        ?>

<h1>Задание 5</h1>
        <?php
        $word = "banana";
        $counts = [];
        $i = 0;
        while (isset($word[$i])) {
            $char = $word[$i];
            if (isset($counts[$char])) {
                $counts[$char]++;
            } else {
                $counts[$char] = 1;
            }
            $i++;
        }
        echo $word, '<br>', '<br>';
        foreach ($counts as $char => $count) {
            echo "'$char'=> $count", '<br>';
        }
        ?>

<h1>Задание 6</h1>
<?php
$array = [
    "One"=> "Один",
    "Two"=> "Два",
    "Three"=> "Три",
    "Four"=> "Четыре",
    "Five"=> "Пять",
    "Six"=> "Шесть",
    "Seven"=> "Семь",
    "Eight"=> "Восемь",
    "Nine"=> "Девять",
    "Ten"=> "Десять"
];
$array = array_flip($array);
foreach($array as $key => $item){
    echo "<p> $key - $item, </p>";
}
?>