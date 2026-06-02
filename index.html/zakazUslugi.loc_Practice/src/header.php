<!DOCTYPE html>
<html lang="ru-RU" class="h-100">

<head>
    <title>Салон "Зимняя вишня"</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/site.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

    <header id="header">
        <nav class="navbar-expand-md navbar-dark bg-dark fixed-top navbar">
            <div class="container">
                <a class="navbar-brand" href="index.php">Салон "Зимняя вишня"</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav-collapse"
                    aria-controls="nav-collapse" aria-expanded="false" aria-label="Переключить навигацию">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="nav-collapse" class="collapse navbar-collapse">
                    <ul class="navbar-nav nav">
                        <li class="nav-item"><a class="nav-link" href="feedback.php">отзывы</a></li>
                        <?php if($user->isGuest):?>
                        <li class="nav-item"><a class="nav-link <?= $page == 'login.php' ? 'active' : '' ?>" href="login.php" >войти</a></li>
                        <?php else: ?>
                        <li class="nav-item"><a class="nav-link <?= $page == 'login.php' ? 'active' : '' ?>" href="logout.php" ><?= $user->getLogin() ?>(выйти)</a></li>
                        <?php endif ?>
                        <li class="nav-item"> <a class="nav-link" href="account.php">личный кабинет</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
    <?php if(isset($flash)) : ?>
        <div class="bg-success"><?= $flash ?></div>
    <?php endif ?>