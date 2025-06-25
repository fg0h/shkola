<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Zapis $model */

$this->title = 'Запись: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Записи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="zapis-view">

    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-eye"></i> <?= Html::encode($this->title) ?>
        </h1>
        <div class="page-actions">
            <?= Html::a('<i class="fas fa-arrow-left"></i> Назад', ['index'], ['class' => 'btn btn-back']) ?>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="zapis-actions">
                <?= Html::a('<i class="fas fa-pencil-alt"></i> Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-edit']) ?>
                <?= Html::a('<i class="fas fa-trash"></i> Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-delete',
                    'data' => [
                        'confirm' => 'Вы уверены, что хотите удалить эту запись?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>

            <?= DetailView::widget([
                'model' => $model,
                'options' => ['class' => 'table detail-view'],
                'attributes' => [
                    [
                        'attribute' => 'id',
                        'label' => 'ID',
                    ],
                    [
                        'attribute' => 'user_id',
                        'label' => 'ID пользователя',
                    ],
                    [
                        'attribute' => 'strana',
                        'label' => 'Страна',
                    ],
                    [
                        'attribute' => 'gorod',
                        'label' => 'Город',
                    ],
                    [
                        'attribute' => 'course_id',
                        'label' => 'ID курса',
                    ],
                    [
                        'attribute' => 'group_id',
                        'label' => 'ID группы',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>

<style>
    .zapis-view {
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

    .zapis-actions {
        display: flex;
        gap: 15px;
        margin-bottom: 25px;
        flex-wrap: wrap;
    }

    .btn-edit {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        padding: 10px 20px;
        font-weight: 600;
        border-radius: 30px;
        cursor: pointer;
        transition: var(--transition);
        box-shadow: var(--shadow);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-edit:hover {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        transform: translateY(-3px);
    }

    .btn-edit i {
        font-size: 0.9rem;
    }

    .btn-delete {
        background: linear-gradient(135deg, #f53b57, #ef5777);
        color: white;
        border: none;
        padding: 10px 20px;
        font-weight: 600;
        border-radius: 30px;
        cursor: pointer;
        transition: var(--transition);
        box-shadow: 0 4px 15px rgba(245, 59, 87, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-delete:hover {
        background: linear-gradient(135deg, #ef5777, #f53b57);
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(245, 59, 87, 0.4);
    }

    .table.detail-view {
        width: 100%;
        border-collapse: collapse;
    }

    .table.detail-view th,
    .table.detail-view td {
        padding: 12px 15px;
        border-bottom: 1px solid #f0f0f0;
    }

    .table.detail-view th {
        width: 200px;
        text-align: left;
        color: var(--gray);
        font-weight: 500;
    }

    .table.detail-view td {
        color: var(--dark);
        font-weight: 500;
    }

    .table.detail-view tr:last-child th,
    .table.detail-view tr:last-child td {
        border-bottom: none;
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

        .zapis-actions {
            gap: 10px;
        }

        .btn-edit,
        .btn-delete {
            padding: 8px 15px;
            font-size: 0.9rem;
        }

        .table.detail-view th,
        .table.detail-view td {
            padding: 8px 10px;
            font-size: 0.9rem;
        }

        .table.detail-view th {
            width: 120px;
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
