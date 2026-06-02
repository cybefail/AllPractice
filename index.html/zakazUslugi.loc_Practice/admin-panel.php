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

                        <form id="w0" action="/clinic-office/application/index" method="get" data-pjax="1">
                            <div class="form-group field-applicationsearch-status_id">
                                <label class="control-label" for="applicationsearch-status_id">статус</label>
                                <select id="applicationsearch-status_id" class="form-control"
                                    name="ApplicationSearch[status_id]">
                                    <option value="">выберите статус</option>
                                    <option value="1">На
                                        посещение</option>
                                    <option value="2">Время
                                        забронировано</option>
                                    <option value="3">Услуга оказана</option>
                                    <option value="4">Посещение перенесено</option>
                                </select>

                                <div class="help-block"></div>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">найти</button> <a
                                    class="btn btn-outline-secondary" href="./">собросить</a>
                            </div>

                        </form>
                    </div>

                    <div id="w1" class="list-view">
                        <div class="d-flex flex-wrap justify-content-between">
                            <div class="item" data-key="9">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            q </h5>
                                        <p class="card-text">
                                            qqqqqqq </p>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                дата и время посещения:
                                            </div>
                                            12.05.2024 15:00:00
                                        </div>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                дата и время создания:
                                            </div>
                                            02.05.2024 15:42:32
                                        </div>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                отправитель:
                                            </div>

                                            й
                                        </div>

                                        <div class="card-text">
                                            <div class="opacity-50">
                                                статус:
                                            </div>
                                            На
                                            посещение
                                        </div>
                                        <a class="btn btn-primary"
                                            href="/clinic-office/application/view?id=9">просмотр</a> <a
                                            class="btn btn-primary"
                                            href="/clinic-office/application/apply?id=9">принять</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item" data-key="2">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            asd </h5>
                                        <p class="card-text">
                                            asd </p>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                дата и время посещения:
                                            </div>
                                            19.04.2024 15:13:53
                                        </div>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                дата и время создания:
                                            </div>
                                            19.04.2024 12:47:46
                                        </div>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                отправитель:
                                            </div>

                                            й
                                        </div>

                                        <div class="card-text">
                                            <div class="opacity-50">
                                                статус:
                                            </div>
                                            Время
                                            забронировано
                                        </div>
                                        <a class="btn btn-primary"
                                            href="/clinic-office/application/view?id=2">просмотр</a> <a
                                            class="btn btn-primary"
                                            href="/clinic-office/application/end?id=2">заверить</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item" data-key="4">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            asd </h5>
                                        <p class="card-text">
                                            asd </p>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                дата и время посещения:
                                            </div>
                                            23.04.2024 11:19:48
                                        </div>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                дата и время создания:
                                            </div>
                                            19.04.2024 12:47:46
                                        </div>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                отправитель:
                                            </div>

                                            й
                                        </div>

                                        <div class="card-text">
                                            <div class="opacity-50">
                                                статус:
                                            </div>
                                            Время
                                            забронировано
                                        </div>
                                        <a class="btn btn-primary"
                                            href="/clinic-office/application/view?id=4">просмотр</a> <a
                                            class="btn btn-primary"
                                            href="/clinic-office/application/end?id=4">заверить</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item" data-key="6">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            asd </h5>
                                        <p class="card-text">
                                            asd </p>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                дата и время посещения:
                                            </div>
                                            23.04.2024 11:19:56
                                        </div>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                дата и время создания:
                                            </div>
                                            19.04.2024 12:47:46
                                        </div>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                отправитель:
                                            </div>

                                            й
                                        </div>

                                        <div class="card-text">
                                            <div class="opacity-50">
                                                статус:
                                            </div>
                                            Время
                                            забронировано
                                        </div>
                                        <a class="btn btn-primary"
                                            href="/clinic-office/application/view?id=6">просмотр</a> <a
                                            class="btn btn-primary"
                                            href="/clinic-office/application/end?id=6">заверить</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item" data-key="8">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            asd </h5>
                                        <p class="card-text">
                                            asd </p>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                дата и время посещения:
                                            </div>
                                            23.04.2024 11:19:56
                                        </div>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                дата и время создания:
                                            </div>
                                            19.04.2024 12:47:46
                                        </div>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                отправитель:
                                            </div>

                                            й
                                        </div>

                                        <div class="card-text">
                                            <div class="opacity-50">
                                                статус:
                                            </div>
                                            Время
                                            забронировано
                                        </div>
                                        <a class="btn btn-primary"
                                            href="/clinic-office/application/view?id=8">просмотр</a> <a
                                            class="btn btn-primary"
                                            href="/clinic-office/application/end?id=8">заверить</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item" data-key="1">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            asd </h5>
                                        <p class="card-text">
                                            asd </p>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                дата и время посещения:
                                            </div>
                                            19.04.2024 15:13:53
                                        </div>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                дата и время создания:
                                            </div>
                                            19.04.2024 11:23:10
                                        </div>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                отправитель:
                                            </div>

                                            й
                                        </div>

                                        <div class="card-text">
                                            <div class="opacity-50">
                                                статус:
                                            </div>
                                            На
                                            посещение
                                        </div>
                                        <a class="btn btn-primary"
                                            href="/clinic-office/application/view?id=1">просмотр</a> <a
                                            class="btn btn-primary"
                                            href="/clinic-office/application/apply?id=1">принять</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item" data-key="3">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            asd </h5>
                                        <p class="card-text">
                                            asd </p>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                дата и время посещения:
                                            </div>
                                            23.04.2024 11:19:48
                                        </div>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                дата и время создания:
                                            </div>
                                            19.04.2024 11:23:10
                                        </div>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                отправитель:
                                            </div>

                                            й
                                        </div>

                                        <div class="card-text">
                                            <div class="opacity-50">
                                                статус:
                                            </div>
                                            На
                                            посещение
                                        </div>
                                        <a class="btn btn-primary"
                                            href="/clinic-office/application/view?id=3">просмотр</a> <a
                                            class="btn btn-primary"
                                            href="/clinic-office/application/apply?id=3">принять</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item" data-key="5">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            asd </h5>
                                        <p class="card-text">
                                            asd </p>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                дата и время посещения:
                                            </div>
                                            23.04.2024 11:00:00
                                        </div>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                дата и время создания:
                                            </div>
                                            19.04.2024 11:23:10
                                        </div>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                отправитель:
                                            </div>

                                            й
                                        </div>

                                        <div class="card-text">
                                            <div class="opacity-50">
                                                статус:
                                            </div>
                                            Посещение перенесено
                                        </div>
                                        <a class="btn btn-primary"
                                            href="/clinic-office/application/view?id=5">просмотр</a> <a
                                            class="btn btn-primary"
                                            href="/clinic-office/application/end?id=5">заверить</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item" data-key="7">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            asd </h5>
                                        <p class="card-text">
                                            asd </p>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                дата и время посещения:
                                            </div>
                                            23.04.2024 11:19:56
                                        </div>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                дата и время создания:
                                            </div>
                                            19.04.2024 11:23:10
                                        </div>
                                        <div class="card-text">
                                            <div class="opacity-50">
                                                отправитель:
                                            </div>

                                            й
                                        </div>

                                        <div class="card-text">
                                            <div class="opacity-50">
                                                статус:
                                            </div>
                                            На
                                            посещение
                                        </div>
                                        <a class="btn btn-primary"
                                            href="/clinic-office/application/view?id=7">просмотр</a> <a
                                            class="btn btn-primary"
                                            href="/clinic-office/application/apply?id=7">принять</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

<?php include 'src/footer.php'?>