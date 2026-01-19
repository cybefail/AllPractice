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

<?php if ($loggedInUser && $loggedInUser['role'] === 'admin'): ?>
    <h2>Добавить товар</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Название" required><br><br>
        <input type="number" name="price" placeholder="Цена" required><br><br>
        <textarea name="description" placeholder="Описание" required></textarea><br><br>
        <button type="submit" name="add_product">Добавить</button>
    </form>
<?php endif; ?>

</body>
</html>