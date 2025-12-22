<?php
//ТЕМА
echo '<h1>Строки/h1>';
// $strRev = strrev(string: $str);

// echo strpos(haystack: $str, needle: 'world');
// echo $strRev;
// echo strpos($str, 'o');


$words = explode(separator: ' ', string: $str);
<?php foreach ($words as $word): ?>
    <p><?= $word ?></p>
<?php endforeach; 
$string = implode(separator: ',', array: $words);
echo "<p>$string</p>"
?>

<?php
$str = 'Hello world from Russia!';
$newStr = str_replace(search: 'Hello',
replace: 'Hi', subject: $str);
echo $str;
?>