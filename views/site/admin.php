<?php
use yii\helpers\Html;

$this->title = 'Админ-панель';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-admin container">
    <h1 class="text-center mb-5"><?= Html::encode($this->title) ?></h1>

    <div class="row justify-content-center">

        <div class="col-md-4 mb-4 d-flex">
            <div class="admin-card card-courses w-100">
                <div class="card-icon">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="card-content">
                    <h3>Курсы</h3>
                    <p>Управление языковыми курсами</p>
                    <?= Html::a('Перейти <i class="fas fa-arrow-right"></i>', ['courses/index'], ['class' => 'admin-btn']) ?>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 d-flex">
            <div class="admin-card card-schedule w-100">
                <div class="card-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="card-content">
                    <h3>Расписание</h3>
                    <p>Управление расписанием занятий</p>
                    <?= Html::a('Перейти <i class="fas fa-arrow-right"></i>', ['raspisanie/index'], ['class' => 'admin-btn']) ?>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 d-flex">
            <div class="admin-card card-teachers w-100">
                <div class="card-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="card-content">
                    <h3>Преподаватели</h3>
                    <p>Управление преподавателями</p>
                    <?= Html::a('Перейти <i class="fas fa-arrow-right"></i>', ['teachers/index'], ['class' => 'admin-btn']) ?>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 d-flex">
            <div class="admin-card card-students w-100">
                <div class="card-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="card-content">
                    <h3>Студенты</h3>
                    <p>Управление студентами</p>
                    <?= Html::a('Перейти <i class="fas fa-arrow-right"></i>', ['students/index'], ['class' => 'admin-btn']) ?>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 d-flex">
            <div class="admin-card card-groups w-100">
                <div class="card-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-content">
                    <h3>Группы</h3>
                    <p>Управление учебными группами</p>
                    <?= Html::a('Перейти <i class="fas fa-arrow-right"></i>', ['groups/index'], ['class' => 'admin-btn']) ?>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 d-flex">
            <div class="admin-card card-applications w-100">
                <div class="card-icon">
                    <i class="fas fa-file-signature"></i>
                </div>
                <div class="card-content">
                    <h3>Заявки</h3>
                    <p>Просмотр и обработка заявок</p>
                    <?= Html::a('Перейти <i class="fas fa-arrow-right"></i>', ['zapis/index'], ['class' => 'admin-btn']) ?>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .site-admin {
        padding: 30px 0;
    }

    .site-admin h1 {
        color: var(--primary-dark, #2c3e50);
        font-size: 2.5rem;
        font-weight: 700;
        position: relative;
        padding-bottom: 15px;
    }

    .site-admin h1::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(to right, var(--primary, #6a11cb), var(--secondary, #2575fc));
        border-radius: 2px;
    }

    .admin-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        padding: 25px;
        height: 100%;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border: none;
    }

    .admin-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(126, 87, 194, 0.3);
    }

    .admin-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(to right, var(--primary, #6a11cb), var(--primary-dark, #3c096c));
    }

    .card-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        font-size: 30px;
        color: white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .card-courses .card-icon {
        background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
    }

    .card-schedule .card-icon {
        background: linear-gradient(135deg, #4ecdc4, #88f3eb);
    }

    .card-teachers .card-icon {
        background: linear-gradient(135deg, #ffa502, #ffbe76);
    }

    .card-students .card-icon {
        background: linear-gradient(135deg, #2ed573, #7bed9f);
    }

    .card-groups .card-icon {
        background: linear-gradient(135deg, #3742fa, #5352ed);
    }

    .card-applications .card-icon {
        background: linear-gradient(135deg, #9c88ff, #8c7ae6);
    }

    .admin-card h3 {
        color: var(--primary-dark, #2c3e50);
        font-size: 1.5rem;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .admin-card p {
        color: var(--gray, #555);
        margin-bottom: 20px;
        font-size: 1rem;
    }

    .admin-btn {
        display: inline-flex;
        align-items: center;
        padding: 10px 20px;
        background: linear-gradient(135deg, var(--primary, #6a11cb), var(--primary-dark, #3c096c));
        color: white !important;
        border-radius: 30px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 15px rgba(126, 87, 194, 0.3);
    }

    .admin-btn i {
        margin-left: 8px;
        transition: transform 0.3s ease;
    }

    .admin-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(126, 87, 194, 0.4);
        color: white;
    }

    .admin-btn:hover i {
        transform: translateX(5px);
    }

    @media (max-width: 767.98px) {
        .admin-card {
            margin-bottom: 20px;
        }

        .site-admin h1 {
            font-size: 2rem;
        }
    }
</style>