<?php require 'src/init-admin-reviews.php'; ?>
<?php include 'src/header.php'; ?>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <h1>Модерация отзывов</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
            <?php foreach($feedbacks as $item): ?>
            <div class="col">
                <div class="card h-100">
                    <?php if(!empty($item['img'])): ?>
                    <img src="<?= htmlspecialchars($item['img']) ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($item['name']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($item['feedback']) ?></p>
                        <small class="text-muted"><?= htmlspecialchars($item['phone']) ?></small>
                        <div class="mt-2">
                            <?php if($item['status'] !== 'approved'): ?>
                            <a href="admin-reviews.php?approve=<?= $item['id'] ?>" class="btn btn-success btn-sm">Опубликовать</a>
                            <?php endif; ?>
                            <?php if($item['status'] !== 'rejected'): ?>
                            <a href="admin-reviews.php?reject=<?= $item['id'] ?>" class="btn btn-danger btn-sm">Отклонить</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small>Статус: <?= $item['status'] ?></small>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</main>

<?php include 'src/footer.php'; ?>