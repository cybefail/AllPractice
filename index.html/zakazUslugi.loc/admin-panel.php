<?php require 'src/init-AdminPanel.php' ?>
<?php
include 'src/header.php';
?>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol id="w4" class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">заявки</li>
                </ol>
            </nav>
            <div class="application-index">

                <h1>заявки</h1>

                <div id="p0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
                    <div class="application-search">
                    <div class="mb-3">
                        <a href="admin-panel.php" class="btn <?= !isset($_GET['today']) ? 'btn-primary' : 'btn-outline-primary' ?> btn-sm">Все заявки</a>
                        <a href="admin-panel.php?today" class="btn <?= isset($_GET['today']) ? 'btn-primary' : 'btn-outline-primary' ?> btn-sm">Только сегодняшние</a>
                    </div>
                        <form id="w0" action="admin-panel.php" method="get" data-pjax="1">
                            <div class="form-group field-applicationsearch-status_id">
                                <label class="control-label" for="applicationsearch-status_id">статус</label>
                                <select id="applicationsearch-status_id" class="form-control"
                                    name="status_id">
                                    <option value="">выберите статус</option>
                                    <option value="new">На
                                        посещение</option>
                                    <option value="timereserv">Время
                                        забронировано</option>
                                    <option value="provided">Услуга оказана</option>
                                    <option value="time change">Посещение перенесено</option>
                                </select>

                                <div class="help-block"></div>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">найти</button> <a
                                    class="btn btn-outline-secondary" href="admin-panel.php">собросить</a>
                            </div>

                        </form>
                    </div>

                    <div id="w1" class="list-view">
    <div class="d-flex flex-wrap justify-content-between">
        <?php foreach($applications as $app): ?>
        <div class="item">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $app['reason'] ?></h5>
                    <p class="card-text"><?= $app['text'] ?></p>
                    <div class="card-text">
                        <div class="opacity-50">дата и время посещения:</div>
                        <?= $app['date'] ?> <?= $app['time'] ?>
                    </div>
                    <div class="card-text">
                        <div class="opacity-50">дата и время создания:</div>
                        <?= $app['created_at'] ?>
                    </div>
                    <div class="card-text">
                        <div class="opacity-50">отправитель:</div>
                        <?= $app['user_id'] ?>
                    </div>
                    <div class="card-text">
                        <div class="opacity-50">статус:</div>
                        <?= $app['status'] ?>
                    </div>
                    <a class="btn btn-primary" href="admin-app.php?id=<?= $app['id'] ?>">просмотр</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>
                </div>
            </div>
        </div>
    </main>

<?php include 'src/footer.php'?>