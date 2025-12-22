<?php
echo '<h1>Ноунейм сайт</h1>';
session_start();
//загрузка юзеров из JSON
$users = json_decode(file_get_contents('customer.json'), true);
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
$error = '';
$loggedInUser = null;

//вход
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = $_POST['password'] ?? '';

    foreach ($users as $user) {
        if ($user['login'] === $login && $user['password'] === $password) {
            $loggedInUser = $user;
            $_SESSION['user'] = $user;
            break;
        }
    }

    if (!$loggedInUser) {
        $error = 'Неверный логин или пароль.';
    }
}

elseif (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];
}
?>

<?php if ($loggedInUser): ?>
    <h2><?= htmlspecialchars($loggedInUser['name']) ?></h2>
    <p>e-mail: <a href="mailto:<?= htmlspecialchars($loggedInUser['email']) ?>">
        <?= htmlspecialchars($loggedInUser['email']) ?>
    </a></p>
    <p>Денег на счету: <?= htmlspecialchars($loggedInUser['amount']) ?> руб</p>
    
    <p>
        <a href="?logout=1">
            <button>Выйти из аккаунта</button>
        </a>
    </p>

<?php else: ?>
    <?php if ($error): ?>
        <p style="color: red; font-weight: bold;">
            <?= htmlspecialchars($error) ?>
        </p>
    <?php endif; ?>

    <form method="post">
        <label>
            Логин: <input type="text" name="login" required>
        </label><br><br>
        
        <label>
            Пароль: <input type="password" name="password" required>
        </label><br><br>
        
        <button type="submit">Войти</button>
    </form>
<?php endif; ?>
