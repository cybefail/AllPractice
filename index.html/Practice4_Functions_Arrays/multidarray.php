<h1>Многомерные массивы</h1>
<?php
$students = [
    ['name' =>'Иванов Иван', 'group' => 'ИВ2', 'course' => '1'],
    ['name' =>'Мистер пятерка', 'group' => 'Ив1к-24', 'course' => '2'],
    ['name' =>'Влад А4', 'group' =>  'МТ-22', 'course' => '3'],
    ['name' =>'Босин', 'group' =>  'С-21', 'course' => '4']
];
foreach ($students as $student){
echo "Имя студента: {$student['name']}, Группа : {$student['group']}, Курс: {$student['course']}";
echo '<br>';
}
?>

<h1>Задание 1</h1>
<?php
$rows = 9;
$cols = 10;
$squares = [];
$number = 10;
for ($i = 0; $i < $rows; $i++) {
    $squares[$i] = [];
    for ($j = 0; $j < $cols; $j++) {
        $squares[$i][$j] = $number * $number;
        $number++;
    }
}
echo "<table border='1'>";
for ($i = 0; $i < $rows; $i++) {
    echo "<tr>";
    for ($j = 0; $j < $cols; $j++) {
        echo "<td>" . $squares[$i][$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>

<h1>Задание 2</h1>
<?php
$rows = 4;
$cols = 5;
$squares = [];
$number = 10;
for ($i = 0; $i < $rows; $i++) {
    $squares[$i] = [];
    for ($j = 0; $j < $cols; $j++) {
        $squares[$i][$j] = $number * $number;
        $number++;
    }
}
echo "<table border='1'>";
for ($i = 0; $i < $rows; $i++) {
    echo "<tr>";
    for ($j = 0; $j < $cols; $j++) {
        echo "<td>" . $squares[$i][$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>

<h1>Задание 3</h1>
<?php
$array = [];
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 4; $j++) {
        $array[$i][$j] = rand(1, 100);
        }
}
$max = $array[0][0];
$min = $array[0][0];
$maxIndex = [0, 0];
$minIndex = [0, 0];
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 4; $j++) {
        if ($array[$i][$j] > $max) {
                $max = $array[$i][$j];
                $maxIndex = [$i, $j];
            }
        if ($array[$i][$j] < $min) {
                $min = $array[$i][$j];
                $minIndex = [$i, $j];
            }
        }
}
echo "<b>Массив</b>:", '<br>';
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 4; $j++) {
        echo $array[$i][$j]," ";
    }
    echo '<br>';
}
echo "<b>Максимальный элемент</b>: $max (Индекс [строка: {$maxIndex[0]}, столбец: {$maxIndex[1]}])", '<br>';
echo "<b>Минимальный элемент</b>: $min (Индекс [строка: {$minIndex[0]}, столбец: {$minIndex[1]}])";
?>

<h1>Задание 4</h1>
<?php
$n = 5;
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n; $j++) {
        if ($i >= $j) {
            echo $i - $j;
        } else {
            echo $j - $i;
        }
        if ($j != $n - 1) {
            echo " ";
        }
    }
    echo '<br>';
}
?>

<h1>Задание 5 и 6</h1>
<?php
$shop = [
    'Обувь' => [  
        'Nike' => 'Кроссовки Air Max',
        'Adidas' => 'Беговые кроссы Ultraboost'
        ],
    'Одежда' => [  
        'Puma' => 'Спортивные штаны',
        'Reebok' => 'Футболка с длинным рукавом',
        'Under Armour' => 'Куртка для бега'
        ],
        'Инвентарь' => [
        'Wilson' => 'Мяч для футбола'
    ],
    'Аксессуары' => []  
];
$newCategory = 'Экипировка';
$shop[$newCategory] = [];
foreach ($shop as $category => $items) {
    echo "<h3>Категория: $category</h3>";  
    if (empty($items)) {  
        echo "<p>Здесь пока нет товаров</p>";
    } else {
        foreach ($items as $brand => $product) {
            echo "<p>Бренд: $brand — Товар: $product</p>";
        }
    }
    echo "<hr>"; 
}
?>

<h1>Задание 7</h1>
<?php
$shop = [
    'Обувь' => [  
        'Nike' => 'Кроссовки Air Max',
        'Adidas' => 'Беговые кроссы Ultraboost'
    ],
    'Одежда' => [  
        'Puma' => 'Спортивные штаны',
        'Reebok' => 'Футболка с длинным рукавом',
        'Under Armour' => 'Куртка для бега'
    ],
        'Инвентарь' => [
        'Wilson' => 'Мяч для футбола'
    ],
    'Аксессуары' => []  
];
$newCategory = 'Экипировка';
$shop[$newCategory] = [];
foreach ($shop as $category => $items) {
    echo "<h3>Категория: $category</h3>";  
    if (empty($items)) {  
        echo "<p>Здесь пока нет товаров</p>";
    } else {
    foreach ($items as $brand => $product) {
        echo "<p>Бренд: $brand — Товар: $product</p>";
        }
    }
        echo "<hr>"; 
}
?>

<h1>Задание 8</h1>
<?php
$shop = [
    'Обувь' => [  
        'Nike' => 'Кроссовки Air Max',
        'Adidas' => 'Беговые кроссы Ultraboost'
    ],
    'Одежда' => [  
        'Puma' => 'Спортивные штаны',
        'Reebok' => 'Футболка с длинным рукавом',
        'Under Armour' => 'Куртка для бега'
    ],
        'Инвентарь' => [
        'Wilson' => 'Мяч для футбола'
    ],
    'Аксессуары' => []  
];
$newCategory = 'Экипировка';
$shop[$newCategory] = [];
foreach ($shop as $category => $items) {
    echo "<h3>Категория: $category</h3>";  
    if (empty($items)) {  
        echo "<p>Здесь пока нет товаров</p>";
    } else {
    foreach ($items as $brand => $product) {
        echo "<p>Бренд: $brand — Товар: $product</p>";
        }
    }
        echo "<hr>"; 
}
?>