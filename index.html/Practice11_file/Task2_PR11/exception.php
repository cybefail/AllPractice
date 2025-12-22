<?php
try {
    $filename = 'animals2.json';
    $jsonData = @file_get_contents($filename);
    if ($jsonData === false) {
        throw new Exception("Файл с данными '$filename' не найден");
    }
    $data = json_decode($jsonData);
    if ($data === null) {
        throw new Exception("Файл с данными '$filename' поврежден");
    }
    echo 'Готово!';
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>