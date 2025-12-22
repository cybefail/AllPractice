<?php
$str = "Hello";
for($i = 0; $i <mb_strlen(string: $str); $i++){
    echo $str[$i], '<br>';
}
echo mb_strlen(string: $str);
?>
<?php
$str = "Hello";
$str[0] = 'B';
echo $str, '<br>';
echo $str[0];
?>
