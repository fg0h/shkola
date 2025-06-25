<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Courses $model */

$this->title = 'Создание нового курса';
$this->params['breadcrumbs'][] = ['label' => 'Курсы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courses-create">

    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-plus-circle"></i> <?= Html::encode($this->title) ?>
        </h1>
        <div class="page-actions">
            <?= Html::a('<i class="fas fa-arrow-left"></i> Назад', ['index'], ['class' => 'btn btn-back']) ?>
        </div>
    </div>

    <div class="card">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>

<style>
    .courses-create {
        padding: 30px 0;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .page-title {
        color: var(--primary-dark);
        font-size: 1.8rem;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .page-title i {
        color: var(--primary);
    }

    .btn-back {
        background: var(--light);
        color: var(--primary);
        border: 2px solid var(--primary);
        border-radius: var(--border-radius);
        padding: 8px 20px;
        font-weight: 600;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-back:hover {
        background: var(--primary);
        color: var(--light);
        transform: translateY(-2px);
        box-shadow: var(--shadow);
    }

    .btn-back i {
        font-size: 0.9rem;
    }

    .card {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        padding: 25px;
        border-top: 4px solid var(--primary);
    }

    @media (max-width: 767px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .page-title {
            font-size: 1.5rem;
        }

        .card {
            padding: 20px;
        }
    }
</style>