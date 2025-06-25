<?php
use yii\helpers\Html;
?>

<div class="admin-dashboard">

    <h2>Панель управления</h2>

    <div class="quick-links mb-4">
        <h4>Быстрый доступ</h4>
        <?= Html::a('Клиенты', 'admin/user') ?>
        <?= Html::a('Заявки', 'admin/zapis')?>
        <?= Html::a('Заявки', 'admin/students')?>
        <?= Html::a('Заявки', 'admin/raspisanie')?>
    </div>

    <div class="stats d-flex">
        <div class="stat-box mr-4">
            <h5>ученики</h5>
            <p><?= $userCount ?></p>
        </div>
        <div class="stat-box">
            <h5>расписание</h5>
            <p><?= $postCount ?></p>
        </div>
        <div class="stat-box mr-4">
            <h5>записи</h5>
            <p><?= $userCount ?></p>
        </div>
    </div>

</div>