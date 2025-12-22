<h1>Интернет-магазин</h1>
<h2>Сумки и чемоданы</h2>
<style>
        .product-image {
            max-width: 200px;
            max-height: 150px;
        }
        .product-card {
            border: 1px solid #000000ff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
<?php
echo "<h2>Задание 4: Просмотр категории</h2>";
?>
<form method="GET">
    <label for="category">Выберите категорию:</label>
    <select name="category" id="category" required>
        <option value="">-- Выберите категорию --</option>
        <option value="">-- Сумки --</option>
        <option value="">-- Рюкзаки --</option>
        <option value="">-- Чемоданы --</option>
        <option value="">-- Дорожные сумки --</option>
        <?php
        foreach ($categories as $cat) {
            $selected = ($_GET['category'] ?? '') === $cat ? 'selected' : '';
            echo "<option value='$cat' $selected>$cat</option>";
        }
        ?>
    </select>
    <button type="submit">Показать товары</button>
</form>
<?php
if (isset($_GET['category']) && $_GET['category'] !== '') {
    $selectedCategory = $_GET['category'];
    $categoryProducts = array_filter($products, function($p) use ($selectedCategory) {
        return $p['category'] === $selectedCategory;
    });
    echo "<div class='category-title'>Категория: <strong>$selectedCategory</strong></div>";
    if (empty($categoryProducts)) {
        echo "<p style='color: orange;'><strong>В категории пока нет товаров</strong></p>";
    } elseif (!in_array($selectedCategory, $categories)) {
        echo "<p style='color: red;'><strong>Ничего не найдено</strong></p>";
    } else {
        echo "<table>";
        echo "<tr><th>Наименование</th><th>Бренд</th><th>Цена</th><th>Наличие</th><th>Акция</th></tr>";
        $rows = array_map(function($p) {
            $stock = $p['stock'] ? "В наличии" : "<span class='out-of-stock'>Нет в наличии</span>";
            $offer = $p['offer'] ? "<span class='offer'>{$p['offer']}</span>" : "—";
            return "<tr>
                <td><strong>{$p['name']}</strong></td>
                <td>{$p['brand']}</td>
                <td>{$p['price']} руб.</td>
                <td>$stock</td>
                <td>$offer</td>
            </tr>";
        }, $categoryProducts);
        echo implode("", $rows);
        echo "</table>";
    }
}
$products = [
    [
        'name' => 'Betty Mini Handbag',
        'category' => 'Винтажные сумки',
        'price' => 5700,
        'brand' => 'Vivienne  Westwood',
        //'imageUrl' => 'img src="W:\domains\localhost\Project_Tishkova\bags\Vivienne  Westwood.jpg"',
        //"img_src" => '<img src="image/' . htmlspecialchars($item['image']) . '" alt="Vivienne Westwood">',
        //"<img src = " 
        'stock' => true,
        'offer' => 'Скидка 15%'
    ],
    [
        'name' => 'SYMBOLESSA',
        'category' => 'Винтажные сумки',
        'price' => 1200,
        'brand' => 'George Gina Lucy',
        'imageUrl' => 'img src="W:\domains\localhost\Project_Tishkova\bags\1_Symbolessa-990.webp"',
        'stock' => true,
        'offer' => ''
    ],
    [
        'name' => 'Daily women simple unique hobo handbag',
        'category' => 'Винтажные сумки',
        'price' => 6700,
        'brand' => 'Angel kiss',
        'imageUrl' => 'img src="W:\domains\localhost\Project_Tishkova\bags\1_1b8cf55d-a29d-4e91-84c2-c24aa29689cc.webp"',
        'stock' => false,
        'offer' => 'Новинка!'
    ],
    [
        'name' => "Men's Army Backpack Medium in Black",
        'category' => 'Рюкзаки',
        'price' => 144900,
        'brand' => 'Balenciaga',
        'imageUrl' => 'img src="W:\domains\localhost\Project_Tishkova\bags\Large-7991131VGJ71000_F.avif"',
        'stock' => true,
        'offer' => '2 по цене 1'
    ],
    [
        'name' => "Men's Tape Type Backpack in Black/red",
        'category' => 'Рюкзаки',
        'price' => 128800,
        'brand' => 'Balenciaga',
        'imageUrl' => 'img src="W:\domains\localhost\Project_Tishkova\bags\Balenc.png"',
        'stock' => true,
        'offer' => ''
    ],
    [
        'name' => 'Спортивная сумка',
        'category' => 'Рюкзаки',
        'price' => 2200,
        'brand' => 'Puma',
        'imageUrl' => 'img src=',
        'stock' => true,
        'offer' => 'Скидка 20%'
    ],
    [
        'name' => 'Чемодан на колёсиках 55см',
        'category' => 'Чемоданы',
        'price' => 8900,
        'brand' => 'American Tourister',
        'imageUrl' => ' ',
        'stock' => true,
        'offer' => ''
    ],
    [
        'name' => 'Чемодан большой 75см',
        'category' => 'Чемоданы',
        'price' => 12500,
        'brand' => 'Samsonite',
        'imageUrl' => ' ',
        'stock' => false,
        'offer' => 'Бесплатная доставка'
    ],
    [
        'name' => 'Дорожная сумка складная',
        'category' => 'Дорожные сумки',
        'price' => 2100,
        'brand' => 'Travelite',
        'imageUrl' => 'img src=',
        'stock' => true,
        'offer' => ''
    ],
    [
        'name' => 'Дорожная сумка с отделением для обуви',
        'category' => 'Дорожные сумки',
        'price' => 3500,
        'brand' => 'Eastpak',
        'imageUrl' => 'img/',
        'stock' => true,
        'offer' => 'Скидка 10%'
    ]
];

echo "<h2>Все товары:</h2>";
echo "<ul>";
foreach ($products as $product) {
    $offer = $product['offer'] ? " <strong style='color:red'>[{$product['offer']}]</strong>" : "";
    $stock = $product['stock'] ? "В наличии" : "Нет в наличии";
    echo "<li>
        <strong>{$product['name']}</strong> 
        ({$product['brand']}) — {$product['price']} руб. 
        <em>{$stock}</em>{$offer}
        <br><img src='{$product['imageUrl']}' alt='{$product['name']}' width='100'>
    </li><br>";
}
echo "</ul>";
//Товары в наличии
$inStock = array_filter($products, function($p) {
    return $p['stock'] === true;
});
echo "<h3>Товары в наличии (" . count($inStock) . "):</h3>";
$namesInStock = array_column($inStock, 'name');
echo implode(', ', $namesInStock) . "<br><br>";
//Товары с акцией
$onOffer = array_filter($products, function($p) {
    return $p['offer'] !== '';
});
echo "<h3>Товары с акцией (" . count($onOffer) . "):</h3>";
$offerNames = array_column($onOffer, 'name');
echo implode(', ', $offerNames) . "<br><br>";
//Цены 
$prices = array_column($products, 'price');
echo "<h3>Цены:</h3>";
echo "Мин: " , min($prices) . " руб., ";
echo "Макс: " , max($prices) . " руб., ";
echo "Средняя: " , round(array_sum($prices) / count($prices), 2) . " руб.<br><br>";

$byCategory = [];
foreach ($products as $p) {
    $byCategory[$p['category']][] = $p['name'];
}
echo "<h3>Товары по категориям:</h3>";
foreach ($byCategory as $cat => $items) {
    echo "$cat:" , implode(', ', $items) . "<br>";
}
echo "<h2>Задание 2: Список товаров</h2>";
    echo "<ul>";
    foreach ($products as $p) {
        echo "<li>
            {$p['name']} - 
            {$p['category']} - 
            {$p['brand']} - 
            {$p['price']} руб.
        </li>";
    }
    echo "</ul><br>";

echo "<h2>Таблица товаров</h2>"; //"<h2>Задание 6: Сортировка по цене в таблице</h2>";

$sortedProducts = $products;
usort($sortedProducts, function($a, $b) {
    return $a['price'] <=> $b['price']; //сравнение цен
});
echo "<table>";
echo "<tr>
    <th>Наименование</th>
    <th>Категория</th>
    <th>Бренд</th>
    <th>Цена</th>
</tr>";
$rows = array_map(function($p) {
    return "<tr>
        <td>{$p['name']}</td>
        <td>{$p['category']}</td>
        <td>{$p['brand']}</td>
        <td>{$p['price']} руб.</td>
    </tr>";
}, $sortedProducts);
echo implode("", $rows);
?>



<?php
echo "<h2>Карточка товара</h2>"; //картинки только в 5 задании
$products = [
    [
        'name' => 'Betty Mini Handbag',
        'category' => 'Винтажные сумки',
        'price' => 5700,
        'brand' => 'Vivienne Westwood',
        'imageUrl' => 'bags/48030002W-L0099-_BLACK_001_large.jpg',
        'stock' => true,
        'offer' => 'Скидка 15%'
    ],
    [
        'name' => 'SYMBOLESSA',
        'category' => 'Винтажные сумки',
        'price' => 1200,
        'brand' => 'George Gina Lucy',
        'imageUrl' => 'bags/1_Symbolessa-990.webp',
        'stock' => true,
        'offer' => ''
    ],
];


if (isset($_GET['name']) && trim($_GET['name']) !== '') {
    $searchName = trim($_GET['name']);

    $foundProducts = array_filter($products, function($p) use ($searchName) {
        return strcasecmp($p['name'], $searchName) === 0;
    });

    if (empty($foundProducts)) {
        echo "<p style='color: red; font-weight: bold;'>Ничего не найдено</p>";
    } else {
        $product = reset($foundProducts); // Первый найденный

        //КАРТОЧКА ТОВАРА
        echo "<div class='card'>";
        echo "<h3>{$product['name']}</h3>";

        // Фото
        $imgPath = $product['imageUrl'];
        if (!empty($imgPath) && file_exists($imgPath)) {
            echo "<img src='$imgPath' alt='{$product['name']}'>";
        } else {
            echo "<p><em>Изображение отсутствует</em></p>";
        }

        // Акция
        if (!empty($product['offer'])) {
            echo "<p class='offer'>{$product['offer']}</p>";
        }

        // Нет на складе
        if (!$product['stock']) {
            echo "<p class='out-of-stock'>Нет на складе</p>";
        }

        // Цена
        echo "<p class='price'>{$product['price']} руб.</p>";
        echo "</div>";
    }
}

//Задание 5: Карточка товара
?>
<form method="GET">
    <label for="name">Введите наименование товара:</label><br>
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($_GET['name'] ?? '') ?>" placeholder="Например: SYMBOLESSA" required>
    <button type="submit">Найти</button>
</form>

<?php
if (isset($_GET['name']) && trim($_GET['name']) !== '') {
    $searchName = trim($_GET['name']);
    $found = null;

    foreach ($products as $p) {
        if (strcasecmp($p['name'], $searchName) === 0) {
            $found = $p;
            break;
        }
    }

    if (!$found) {
        echo "<div class='message error'><strong>Ничего не найдено</strong></div>";
    } else {
        echo "<div class='card'>";
        echo "<h3>{$found['name']}</h3>";
        if (!empty($found['image']) && file_exists($found['image'])) {
            echo "<img src='{$found['image']}' alt='{$found['name']}'>";
        } else {
            echo "<p><em>Изображение отсутствует</em></p>";
        }

        //акция
        if (!empty($found['offer'])) {
            echo "<p class='offer'>{$found['offer']}</p>";
        }

        //нет на складе
        if (!$found['stock']) {
            echo "<p class='out-of-stock'>Нет на складе</p>";
        }

        // Цена
        echo "<p><strong>Цена:</strong> {$found['price']} руб.</p>";
        echo "</div>";
    }
}
?>

