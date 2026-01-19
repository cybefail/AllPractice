<?php
class Ad {
    protected $head;
    protected $text;
    protected $data;
    protected $views;
    protected $img;

    public function __construct($head, $text, $data, $img = null, $views = 0) {
        $this->head = $head;
        $this->text = $text;
        $this->data = $data;
        $this->img = $img;
        $this->views = $views;
    }

    public function printAd() {
        echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px 0;'>";
        
        if ($this->img) {
            echo "<img src='{$this->img}' alt='Изображение' style='max-width: 100%; height: auto; display: block; margin: 10px 0;'>";
        }
        
        echo "<h3 style='margin: 0 0 10px 0; font-weight: normal;'>{$this->head}</h3>";
        echo "<p style='margin: 8px 0;'>{$this->text}</p>";
        echo "<small style='color: #666;'>Опубликовано: {$this->data} | Просмотров: {$this->views}</small>";
        
        echo "</div>";
    }
}

//Чтение JSON
$jsonContent = file_get_contents('kr2.json');
$adsData = json_decode($jsonContent, true);

$objAds = [];

foreach ($adsData as $ad) {
    $head = $ad['head'] ?? '';
    $text = $ad['text'] ?? '';
    $data = $ad['data'] ?? date('d.m.Y');
    $views = $ad['views'] ?? 0;
    $img = $ad['img'] ?? null;

    $objAds[] = new Ad($head, $text, $data, $img, $views);
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Доска объявлений</title>
</head>
<body style="margin: 20px; background: #f9f9f9;">
    <h1 style="text-align: center; margin-bottom: 30px;">Доска объявлений</h1>

    <?php foreach ($objAds as $ad) {
        $ad->printAd();
    } ?>

</body>
</html>