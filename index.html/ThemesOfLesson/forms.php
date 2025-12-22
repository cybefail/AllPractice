<?php
$s = 0;
if(isset($_GET['number'])){
    $number = $_GET['number'];
    $s = $number**2;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
</head>
<body>
    <h1>Решение задач на условие</h1>
    <h2>Площадь квадрата</h2>
    <form action="">
        <p>Введите сторону<input type="text" name="number"</p>
        <p><input type="submit" value="Отправить"</p>
</form>
<p><?php echo "Площадь квадрата: $s"; ?></

</body>
</html>
