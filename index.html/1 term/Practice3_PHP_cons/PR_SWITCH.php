<h1>Задачи - оператор выбора</h1>
<h2>Задание 1</h2>
<?php
$a = 7;
switch($a){ 
    case 0:
        $b= "zero";
        echo $b;
        break;
    case 1:
        $b= "one";
        echo $b;
        break;
    case 2:
        $b= "two";
        echo $b;
        break;
    case 3:
        $b= "three";
        echo $b;
        break;
    case 4:
        $b= "four";
        echo $b;
        break;
    case 5:
        $b= "five";
        echo $b;
        break;
    case 6:
        $b= "six";
        echo $b;
        break;
    case 7:
        $b= "seven";
        echo $b;
        break;
    case 8:
        $b= "eight";
        echo $b;
        break;
    case 9:
        $b= "nine";
        echo $b;
        break;
    default:
        echo 'Это число не соответсвует промежутку от 0 до 9';
}
?>
<h2>Задание 2</h2>
<?php
$a = isset($_POST['month']) ? (int)$_POST['month'] : null;
if ($a >= 1 && $a <= 12) {
switch($a){ 
    case 0:
        $b= "zero";
        echo $b;
        break;
    case 1: 
        $b= "1 января — Новый год, 7 января — Рождество";
        echo $b; 
        break;
    case 2:
        $b= "23 февраля — День защитников Отечества";
        echo $b; 
        break;
    case 3: 
        $b= "8 марта — Международный женский день";
        echo $b;
        break;
    case 4: 
        $b= "1 апреля — День смеха";
        echo $b;
        break;
    case 5:
        $b= "1 мая — День весны и труда, 9 мая — День Победы";
        echo $b;
        break;
    case 6:
        $b= "12 июня — День России";
        echo $b;
        break;
    case 7:
        $b= "Июль — Нет праздников";
        echo $b;
        break;
    case 8:
        $b= "Август — Нет праздников";
        echo $b;
        break;
    case 9:
        $b=  "1 сентября — День знаний";
        echo $b;
        break;
    case 10:
        $b= "Октябрь — Нет праздников"; 
        echo $b;
        break;
    case 11:
        $b= "Ноябрь — Нет праздников"; 
        echo $b;
        break;
    case 12:
        $b= "31 декабря — Канун Нового года"; 
        echo $b;
        break;
    default:
        echo 'Пожалуйста, введите число от 1 до 12';
    }
}
?>
<form method="post">
    <label>Введите номер месяца (1-12): </label>
    <input type="number" name="month" min="1" max="12" required>
    <input type="submit" value="Праздник выбранного месяца">
</form>


<h2>Задание 4</h2>
<?php
$k = isset($_POST['age']) ? (int)$_POST['age'] : null;
if ($k >= 1 && $k <= 99) {
    $lastDigit = $k % 10; //последняя цифра числа k
    $lastTwoDigits = $k % 100; //2 последние цифры числа k
    if ($lastTwoDigits >= 11 && $lastTwoDigits <= 14) {
        $word = "лет";
    } else {
        switch ($lastDigit) {
            case 1:
                $word = "год";
                break;
            case 2:
            case 3:
            case 4:
                $word = "года";
                break;
            default:
                $word = "лет";
                break;
        }
    }
    echo "Мне $k $word";
} else {
    echo "Укажите ваш возраст";
}
?>
<form method="post">
    <label>Введите число от 1 до 99: </label>
    <input type="number" name="age" min="1" max="99" required>
    <input type="submit" value="Показать возраст">
</form>

<h2>Задание 5</h2>
<?php
if (isset($_POST['unit'])) {
    $unit = (int)$_POST['unit'];
} else {
    $unit = null;
}

if (isset($_POST['mass'])) {
    $mass = (float)$_POST['mass'];
} else {
    $mass = null;
}
if ($unit >= 1 && $unit <= 5 && $mass >= 0) {
    switch ($unit) {
        case 1: //килограмм
            $result = $mass;
            echo "$mass кг = $result кг";
            break;
        case 2: //миллиграмм
            $result = $mass / 1000000;
            echo "$mass мг = $result кг";
            break;
        case 3: //грамм
            $result = $mass / 1000;
            echo "$mass г = $result кг";
            break;
        case 4: //тонна
            $result = $mass * 1000;
            echo "$mass т = $result кг";
            break;
        case 5: //центнер
            $result = $mass * 100;
            echo "$mass ц = $result кг";
            break;
    }
} else {
    echo "Число не должно быть дробным или отрицательным";
}
?>
<form method="post">
    <label>Введите цифру (от 1 до 5): </label><br>
    <label>1 — килограмм, 2 — миллиграмм, 3 — грамм, 4 — тонна, 5 — центнер</label>
    <input type="number" name="mass" min="1" max="100" required>
    <input type="submit" value="Показать указанную массу в кг">
</form>
