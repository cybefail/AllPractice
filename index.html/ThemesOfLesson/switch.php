$digit = match($a){
    1 => 'один',
    2 => 'два',
    3 => 'три',
    default => 'Нет такой цифры'
};



<?php
$a = 5;
switch($a){ 
    case 1:
        $b= "один";
        echo $b;
        break;
    case 2:
        $b= "два";
        echo $b;
        break;
    case 5:
        $b= "пять";
        echo $b;
        break;
     case 10:
        $b= "десять";
        echo $b;
        break;
    default:
        echo 'ничего не совпало';
} 
?>

// if($a == 1){
//     $b = "один";
//     echo $b;
// }elseif($a == 2){
//         $b= "два";
//         echo $b;
// }
// && - И; || - ИЛИ; ! - НЕ;

//$c = 1;
//$d = 0;
//echo $c<5 || $d>=0 || 1;