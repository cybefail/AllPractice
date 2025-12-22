<?php
//ТЕМА
echo '<h1>Анонимные функции</h1>';
$funcEcho = function($string): void{
    echo $string;
};
$funcEcho = function($string): void{
    echo $string;
};
$funcEcho ($string:'Hello!');
funcEcho ($string:'Hello!');

function useCallback($number, $callback): mixed{
    return $callback($number);
};
function square($num): float|int{
    return $num**2;
}
function square($num): float|int{
    return $num**3;
}
useCallback(number: 5, callback: $cube);
?>