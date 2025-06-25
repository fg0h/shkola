<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Zapis $model */

$this->title = 'Создание новой записи';
$this->params['breadcrumbs'][] = ['label' => 'Записи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zapis-create">

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
    .zapis-create {
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
        background: rgba(126, 87, 194, 0.1);
        color: var(--primary);
        border: 1px solid rgba(126, 87, 194, 0.2);
        padding: 8px 20px;
        font-weight: 600;
        border-radius: 30px;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-back:hover {
        background: rgba(126, 87, 194, 0.2);
        box-shadow: var(--shadow);
        transform: translateY(-2px);
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

    /* Переменные для стилей */
    :root {
        --primary: #7e57c2;
        --primary-dark: #603f9f;
        --primary-light: #b39ddb;
        --light: #f9f9f9;
        --dark: #333;
        --gray: #666;
        --border-radius: 8px;
        --shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        --transition: all 0.3s ease;
    }
</style>
