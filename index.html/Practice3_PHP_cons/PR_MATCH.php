<h1>Оператор match</h1>
<h2>Задание 1: Название цифры на английском</h2>
<form method="GET">
    <label>Введите цифру (0-9): </label>
    <input type="number" name="digit" min="0" max="9" required>
    <input type="submit" value="Показать название">
</form>

<?php
if (isset($_GET['digit'])) {
    $a = (int)$_GET['digit'];
    $name = match ($a) {
        0 => 'zero',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
        default => 'Это не цифра от 0 до 9!',
    };
    echo "<p>Цифра $a — <b>$name</b></p>";
}
?>

<h2>Задание 2: Праздники по номеру месяца</h2>
<form method="GET">
    <label>Введите номер месяца (1-12): </label>
    <input type="number" name="month" min="1" max="12" required>
    <input type="submit" value="Показать праздники">
</form>

<?php
if (isset($_GET['month'])) {
    $month = (int)$_GET['month'];

    $holidays = match ($month) {
        1 => '1 января — Новый год<br>7 января — Рождество',
        2 => '23 февраля — День защитника Отечества',
        3 => '8 марта — Международный женский день',
        4 => '1 мая — Праздник весны и труда<br>9 мая — День Победы',
        5 => '1 мая — Праздник весны и труда<br>9 мая — День Победы',
        6 => '12 июня — День России',
        7 => 'Нет крупных государственных праздников',
        8 => 'Нет крупных государственных праздников',
        9 => '1 сентября — День знаний',
        10 => 'Нет крупных государственных праздников',
        11 => '4 ноября — День народного единства',
        12 => '31 декабря — Новогодняя ночь',
        default => 'Неверный номер месяца! Введите от 1 до 12.',
    };
    echo "<p><b>Месяц $month:</b><br>$holidays</p>";
}
?>

<h2>Задание 3: Последняя цифра квадрата числа</h2>
<form method="GET">
    <label>Введите число: </label>
    <input type="number" name="num3" required>
    <input type="submit" value="Вычислить">
</form>
<?php
if (isset($_GET['num3'])) {
    $num = (int)$_GET['num3'];
    $lastDigit = $num % 10;
    $lastSquareDigit = match ($lastDigit) {
        0 => 0,
        1 => 1,
        2 => 4,
        3 => 9,
        4 => 6,
        5 => 5,
        6 => 6,
        7 => 9,
        8 => 4,
        9 => 1,
    };

    $square = $num * $num;
    echo "<p>Квадрат числа $num = $square<br>";
    echo "Последняя цифра квадрата: <b>$lastSquareDigit</b></p>";
}
?>

<h2>Задание 4: Склонение слова "лет"</h2>
<form method="GET">
    <label>Введите возраст (1-99): </label>
    <input type="number" name="age" min="1" max="99" required>
    <input type="submit" value="Показать">
</form>
<?php
if (isset($_GET['age'])) {
    $k = (int)$_GET['age'];
    $lastDigit = $k % 10;
    $lastTwo = $k % 100;
    $word = match (true) {
        $lastTwo >= 11 && $lastTwo <= 14 => 'лет',
        $lastDigit == 1 => 'год',
        $lastDigit == 2 || $lastDigit == 3 || $lastDigit == 4 => 'года',
        default => 'лет',
    };

    echo "<p>Мне $k $word</p>";
    }
?>

<h2>Задание 5: Перевод массы в килограммы</h2>
<form method="GET">
    <label>Введите массу: </label>
    <input type="number" name="mass" step="any" required><br><br>

    <label>Выберите единицу измерения:</label><br>
    <input type="radio" name="unit" value="1" required> 1 — килограмм<br>
    <input type="radio" name="unit" value="2"> 2 — миллиграмм<br>
    <input type="radio" name="unit" value="3"> 3 — грамм<br>
    <input type="radio" name="unit" value="4"> 4 — тонна<br>
    <input type="radio" name="unit" value="5"> 5 — центнер<br><br>

    <input type="submit" value="Перевести в кг">
</form>

<?php
if (isset($_GET['mass']) && isset($_GET['unit'])) {
    $m = (float)$_GET['mass'];
    $unit = (int)$_GET['unit'];

    $kg = match ($unit) {
        1 => $m, // из кг в кг
        2 => $m / 1_000_000, // из мг в кг
        3 => $m / 1000, // из г в кг
        4 => $m * 1000, // из т в кг
        5 => $m * 100,  // из центнер в кг
        default => null,
    };

    if ($kg !== null) {
        echo "<p>$m ";
        $unitName = match ($unit) {
            1 => 'кг',
            2 => 'мг',
            3 => 'г',
            4 => 'т',
            5 => 'ц',
        };
        echo "$unitName = <b>" . round($kg, 6) . " кг</b></p>";
    } else {
        echo "<p>Неверная единица измерения!</p>";
    }
}
?>
