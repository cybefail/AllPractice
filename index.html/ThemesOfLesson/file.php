<?php
//ТЕМА
$text= file_get_contents('texts/text txt');
if(!is_dir('text1')){
    mkdir('text1');
}
file_get_contetnts('text txt');
file_put_contetnts('text txt', $text . 'world!');
echo file_get_contetnts('text txt');

?>