<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Сумки и чемоданы</title>
</head>
<body>
<h1 align="center">Сумки и чемоданы</h1>
<?php
session_start();

$usersFile = 'users.json';
$productsFile = 'products.json';

// Загрузка пользователей и товаров
$users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];
$products = file_exists($productsFile) ? json_decode(file_get_contents($productsFile), true) : [];

// Обработка авторизации
$authError = '';
$loggedInUser = null;

if (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_form'])) {
    $login = trim($_POST['login']);
    $password = $_POST['password'];

    foreach ($users as $user) {
        if ($user['login'] === $login && $user['password'] === $password) {
            $_SESSION['user'] = $user;
            $loggedInUser = $user;
            break;
        }
    }
    if (!$loggedInUser) {
        $authError = 'Неправильный логин или пароль';
    }
}

// Обработка удаления товара (только admin)
if ($loggedInUser && $loggedInUser['role'] === 'admin' && isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $products = array_filter($products, fn($p) => $p['id'] !== $id);
    $products = array_values($products); // переиндексация
    file_put_contents($productsFile, json_encode($products, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    header('Location: index.php');
    exit;
}

// Обработка добавления товара (только admin)
if ($loggedInUser && $loggedInUser['role'] === 'admin' && isset($_POST['add_product'])) {
    $newProduct = [
        'id' => count($products) ? max(array_column($products, 'id')) + 1 : 1,
        'name' => trim($_POST['name']),
        'price' => (int)$_POST['price'],
        'description' => trim($_POST['description'])
    ];
    $products[] = $newProduct;
    file_put_contents($productsFile, json_encode($products, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    header('Location: index.php');
    exit;
}

// Выход
if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Интернет-магазин</title>
</head>
<body>

<?php if ($loggedInUser): ?>
    <p>Привет, <?= htmlspecialchars($loggedInUser['name']) ?>!
        (Роль: <?= $loggedInUser['role'] ?>)
        <a href="?logout=1">Выйти</a>
    </p>
<?php else: ?>
    <!-- Форма авторизации -->
    <h2>Авторизация</h2>
    <?php if ($authError): ?>
        <p style="color:red;"><?= $authError ?></p>
    <?php endif; ?>
    <form method="post">
        <input type="text" name="login" placeholder="Логин" required><br><br>
        <input type="password" name="password" placeholder="Пароль" required><br><br>
        <button type="submit" name="login_form">Войти</button>
    </form>
    <p><a href="register.php">Регистрация</a></p>
<?php endif; ?>

 

<h1>Товары</h1>

<?php foreach ($products as $product): ?>
    <div style="border:1px solid #ccc; padding:10px; margin:10px;">
        <h3><?= htmlspecialchars($product['name']) ?></h3>
        <p>Цена: <?= $product['price'] ?> руб.</p>
        <p><?= htmlspecialchars($product['description']) ?></p>

        <?php if ($loggedInUser): ?>
            <?php if ($loggedInUser['role'] === 'admin'): ?>
                <a href="?delete=<?= $product['id'] ?>" onclick="return confirm('Удалить товар?')">Удалить</a>
            <?php else: ?>
                <button>Добавить в избранное</button> <!-- Можно расширить позже -->
            <?php endif; ?>
        <?php endif; ?>
    </div>
<?php endforeach; ?>



<?php
$filename = 'goods.json';
try {
    $jsonData = @file_get_contents($filename);
    if ($jsonData === false) {
        throw new Exception("<b>Отладка:</b> Файл с данными '$filename' не найден");
    }
    $products = json_decode($jsonData, true);
    if ($products === null) {
        throw new Exception("<b>Отладка:</b> Файл с данными '$filename' повреждён");
    }
    echo '<b>Отладка:</b> Всё в порядке!<br>';
} catch (Exception $ex) {
    echo "<p>" . $ex->getMessage() . "</p>";
    $products = [];
}
//Обработка добавления товара (POST add_product) 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    $name        = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $price       = trim($_POST['price'] ?? '');
    $stock       = trim($_POST['stock'] ?? '');
    $imageUrl    = trim($_POST['imageUrl'] ?? '');
    $offer       = trim($_POST['offer'] ?? '');
    // Категория: если текстовое поле не пустое – берём его, иначе select
    $categoryText   = trim($_POST['category_text'] ?? '');
    $categorySelect = trim($_POST['category_select'] ?? '');
    $category       = $categoryText !== '' ? $categoryText : $categorySelect;
    $errors = [];
    if ($name === '')        $errors[] = "Не заполнено поле 'Наименование'";
    if ($description === '') $errors[] = "Не заполнено поле 'Описание'";
    if ($category === '')    $errors[] = "Не выбрана категория";
    // Проверка числа для price и stock
    if ($price === '' or !is_numeric($price)) {
        $errors[] = "Поле 'Цена' должно быть числом";
    }
    if ($stock === '' or !ctype_digit($stock)) {
        $errors[] = "Поле 'Остаток' должно быть целым числом";
    }
    if (empty($errors)) {
        $newProduct = [
            'name'        => $name,
            'description' => $description,
            'category'    => $category,
            'price'       => (float)$price,
            'imageUrl'    => $imageUrl,
            'stock'       => (int)$stock,
            'offer'       => $offer
        ];
        $products[] = $newProduct;
        file_put_contents($filename, json_encode($products, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        echo "<p>Товар успешно добавлен.</p>";
    } else {
        echo "<p>Ошибки при добавлении товара:</p><ul>";
        foreach ($errors as $e) {
            echo "<li>$e</li>";
        }
        echo "</ul>";
    }
}
//Обработка удаления товара (GET или POST delete)
if (isset($_REQUEST['delete_index'])) {
    $deleteIndex = (int)$_REQUEST['delete_index'];
    if (isset($products[$deleteIndex])) {
        unset($products[$deleteIndex]);
        $products = array_values($products);
        file_put_contents($filename, json_encode($products, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        echo "<p>Товар удалён.</p>";
    } else {
        echo "<p>Товар с таким индексом не найден.</p>";
    }
}

$categories = array_column($products, 'category');
$uniqueCategories = array_unique($categories);
//Форма поиска по категории (вывод по категориям)
echo "<h3>Поиск товаров по категории</h3>";
echo "<form method='POST'>";
echo "<label for='category'>Выберите категорию:</label> ";
echo "<select name='category' id='category'>";
echo "<option value=''>-- Выберите категорию --</option>";
foreach ($uniqueCategories as $category) {
    $selected = (isset($_POST['category']) && $_POST['category'] == $category) ? 'selected' : '';
    echo "<option value='$category' $selected>$category</option>";
}
echo "</select> ";
echo "<input type='submit' value='Показать товары'>";
echo "</form>";

//Форма добавления товара (textarea, required, числовые поля)
echo "<h3>Добавление товара</h3>";
echo "<form method='POST'>";
echo "<input type='hidden' name='add_product' value='1'>";
echo "Наименование*: <input type='text' name='name' required><br>";
echo "Описание*: <br><textarea name='description' rows='4' cols='40' required></textarea><br>";
echo "Категория (новая)*: <input type='text' name='category_text'><br>";
echo "Или выберите категорию: <select name='category_select'>";
echo "<option value=''>-- Выберите категорию --</option>";
foreach ($uniqueCategories as $category) {
    echo "<option value='$category'>$category</option>";
}
echo "</select><br>";
echo "Цена* (число): <input type='number' name='price' required><br>";
echo "Остаток* (целое): <input type='number' name='stock' required><br>";
echo "Адрес изображения: <input type='text' name='imageUrl'><br>";
echo "Акция: <input type='text' name='offer'><br>";
echo "<input type='submit' value='Добавить товар'>";
echo "</form>";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category']) && !empty($_POST['category'])) {
    $selectedCategory = $_POST['category'];
    if (!in_array($selectedCategory, $uniqueCategories)) {
        echo "<p>Ничего не найдено</p>";
    } else {
        $filteredProducts = array_filter($products, function($p) use ($selectedCategory) {
            return $p['category'] == $selectedCategory;
        });
        if (empty($filteredProducts)) {
            echo "<p>В категории '$selectedCategory' пока нет товаров</p>";
        } else {
            echo "<h2>Товары в категории: $selectedCategory</h2>";
            foreach ($filteredProducts as $index => $product) {
                $availability = $product['stock'] ? 'В наличии' : 'Нет в наличии';
                $offer = !empty($product['offer']) ? " ({$product['offer']})" : '';
                echo "<div>";
                if (!empty($product['imageUrl'])) {
                    echo "<img src='{$product['imageUrl']}' alt='{$product['name']}' style='max-width: 200px; max-height: 150px;'><br>";
                }
                echo "<b>{$product['name']}</b><br>";
                echo "Цена: {$product['price']} руб.<br>";
                echo "Категория: {$product['category']}<br>";
                echo "Статус: $availability$offer<br>";
                // Ссылка удаления через GET
                echo "<a href='?delete_index=$index'>Удалить товар</a><br>";
                echo "</div><br>";
            }
        }
    }
}
//Карточка товара по имени 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_name']) && !empty($_POST['product_name'])) {
    $productName = trim($_POST['product_name']);
    $productCards = array_filter($products, function($p) use ($productName) {
        return $p['name'] === $productName;
    });
    if (!$productCards) {
        echo "<p>Ничего не найдено</p>";
    } else {
        $product = array_values($productCards)[0];
        echo "<h2>{$product['name']}</h2>";
        if (!empty($product['imageUrl'])) {
            echo "<img src='{$product['imageUrl']}' style='max-width:100px;' alt='{$product['name']}'><br>";
        }
        if (!empty($product['offer'])) {
            echo "<div>Акция: {$product['offer']}</div>";
        }
        if (!$product['stock']) {
            echo "<div>Нет на складе</div>";
        }
        echo "Цена: {$product['price']} руб.<br>";
        echo "Категория: {$product['category']}<br>";
    }
}

if (!empty($products)) {
    $grouped = [];
    foreach ($products as $product) {
        $grouped[$product['category']][] = $product;
    }
    echo "<h2>Товары по категориям</h2>";
    foreach ($grouped as $cat => $items) {
echo "<b>$cat</b><br>";
        foreach ($items as $index => $item) {
            echo "{$item['name']} {$item['price']} р. ";
            echo "<a href='?delete_index=$index'>Удалить</a><br>";
        }
        echo "<br>";
    }
}
?>




</body>
</html>