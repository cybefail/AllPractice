<?php
session_start();

$usersFile = 'shop_user.json';
$users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

$regError = '';
$regSuccess = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $login = trim($_POST['login']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    // Проверка совпадения паролей
    if ($password !== $confirm) {
        $regError = 'Введенные пароли не совпадают';
    } else {
        // Проверка уникальности логина
        $loginExists = false;
        foreach ($users as $user) {
            if ($user['login'] === $login) {
                $loginExists = true;
                break;
            }
        }
        if ($loginExists) {
            $regError = 'Логин уже занят';
        } else {
            // Добавляем нового пользователя (роль user по умолчанию)
            $newUser = [
                'name' => $name,
                'login' => $login,
                'password' => $password, // В реальности хэшируй пароль!
                'email' => $email,
                'role' => 'user'
            ];
            $users[] = $newUser;
            file_put_contents($usersFile, json_encode($users, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            $regSuccess = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>

<?php if ($regSuccess): ?>
    <p>Регистрация успешна!</p>
    <a href="baggs.php">Перейти к товарам</a>
<?php else: ?>
    <h2>Регистрация</h2>
    <?php if ($regError): ?>
        <p style="color:red;"><?= $regError ?></p>
    <?php endif; ?>
    <form method="post">
        <input type="text" name="name" placeholder="Имя" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="text" name="login" placeholder="Логин" required><br><br>
        <input type="password" name="password" placeholder="Пароль" required><br><br>
        <input type="password" name="confirm" placeholder="Подтверждение пароля" required><br><br>
        <button type="submit">Зарегистрироваться</button>
    </form>
    <p><a href="baggs.php">Вернуться к авторизации</a></p>
<?php endif; ?>

</body>
</html>