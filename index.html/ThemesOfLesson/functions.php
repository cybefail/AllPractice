<h1>Функции</h1>
<?php
function multArray($number): float | int
{
    $result = 1;
    foreach($numbers as $number){
        $result *= $number;
    }
    return $result;
}
$nums = [2, 4, 7, 8, 9];
echo multArray (numbers: $nums), '<br>';

// function rectSquare($length, $width): float | int
// {
//     $square = $length * $width;
//     return $square;
// }
// rectSquare($length: 5, $width: 10);
// echo $square;
// ?>

//<h1>Функции</h1>
//<?php 
//function sayHello($name): void
//{
//    echo "<p>Привет, $name!</p>";
//}
//$userName = "Вася";
//sayHello(name: $userName);
//?> 