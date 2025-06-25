<?php

use app\models\Teachers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TeachersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Преподаватели';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-index">

    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-chalkboard-teacher"></i> <?= Html::encode($this->title) ?>
        </h1>
        <div class="page-actions">
            <?= Html::a('<i class="fas fa-plus"></i> Добавить преподавателя', ['create'], ['class' => 'btn btn-create']) ?>
        </div>
    </div>

    <div class="card">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'custom-grid'],
            'options' => ['class' => 'grid-view'],
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                    'header' => '№',
                    'headerOptions' => ['style' => 'width: 60px;'],
                ],
                [
                    'attribute' => 'id',
                    'label' => 'ID',
                ],
                [
                    'attribute' => 'user_id',
                    'label' => 'ID пользователя',
                ],
                [
                    'attribute' => 'specialty',
                    'label' => 'Специальность',
                ],
                [
                    'attribute' => 'education',
                    'label' => 'Образование',
                ],
                [
                    'class' => ActionColumn::className(),
                    'header' => 'Действия',
                    'headerOptions' => ['style' => 'width: 150px;'],
                    'contentOptions' => ['style' => 'white-space: nowrap;'],
                    'template' => '<div class="action-buttons">{view} {update} {delete}</div>',
                    'urlCreator' => function ($action, Teachers $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    },
                    'buttons' => [
                        'view' => function ($url) {
                            return Html::a('<i class="fas fa-eye"></i>', $url, [
                                'title' => 'Просмотр',
                                'class' => 'action-btn view-btn',
                            ]);
                        },
                        'update' => function ($url) {
                            return Html::a('<i class="fas fa-pencil-alt"></i>', $url, [
                                'title' => 'Редактировать',
                                'class' => 'action-btn edit-btn',
                            ]);
                        },
                        'delete' => function ($url) {
                            return Html::a('<i class="fas fa-trash"></i>', $url, [
                                'title' => 'Удалить',
                                'class' => 'action-btn delete-btn',
                                'data' => [
                                    'confirm' => 'Вы уверены, что хотите удалить этого преподавателя?',
                                    'method' => 'post',
                                ],
                            ]);
                        },
                    ],
                ],
            ],
            'layout' => "{items}\n{pager}",
            'pager' => [
                'options' => ['class' => 'pagination'],
                'linkOptions' => ['class' => 'page-link'],
                'activePageCssClass' => 'active',
                'disabledPageCssClass' => 'disabled',
                'prevPageLabel' => 'Назад',
                'nextPageLabel' => 'Вперед',
            ],
        ]); ?>
    </div>
</div>

<style>
    .teachers-index {
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

    .btn-create {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        padding: 10px 20px;
        font-weight: 600;
        border-radius: 30px;
        transition: var(--transition);
        box-shadow: var(--shadow);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-create:hover {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(126, 87, 194, 0.4);
        color: white;
    }

    .btn-create i {
        font-size: 0.9rem;
    }

    .card {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        padding: 20px;
        overflow-x: auto;
    }

    .custom-grid {
        width: 100%;
        border-collapse: collapse;
    }

    .custom-grid th {
        background-color: var(--primary);
        color: white;
        font-weight: 600;
        padding: 12px 15px;
        text-align: left';
        text-decoration: none;
    }

    .custom-grid th a {
        color: white !important;
        text-decoration: none;
    }

    .custom-grid td {
        padding: 12px 15px;
        border-bottom: 1px solid #f0f0f0;
        vertical-align: middle;
    }

    .custom-grid tr:hover td {
        background-color: rgba(126, 87, 194, 0.05);
    }

    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
    }

    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        transition: var(--transition);
        font-size: 14px;
    }

    .view-btn {
        color: var(--primary);
        background: rgba(126, 87, 194, 0.1);
        border: 1px solid rgba(126, 87, 194, 0.2);
    }

    .view-btn:hover {
        background: rgba(126, 87, 194, 0.2);
        transform: translateY(-2px);
    }

    .edit-btn {
        color: #FFA000;
        background: rgba(255, 160, 0, 0.1);
        border: 1px solid rgba(255, 160, 0, 0.2);
    }

    .edit-btn:hover {
        background: rgba(255, 160, 0, 0.2);
        transform: translateY(-2px);
    }

    .delete-btn {
        color: #F44336;
        background: rgba(244, 67, 54, 0.1);
        border: 1px solid rgba(244, 67, 54, 0.2);
    }

    .delete-btn:hover {
        background: rgba(244, 67, 54, 0.2);
        transform: translateY(-2px);
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .page-link {
        margin: 0 5px;
        padding: 8px 15px;
        border-radius: var(--border-radius);
        color: var(--primary);
        text-decoration: none;
        transition: var(--transition);
        border: 1px solid #e0e0e0;
    }

    .page-link:hover {
        background: rgba(126, 87, 194, 0.1);
    }

    .active .page-link {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
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
            padding: 15px;
        }

        .custom-grid th,
        .custom-grid td {
            padding: 8px 10px;
            font-size: 0.9rem;
        }

        .action-buttons {
            gap: 5px;
        }

        .action-btn {
            width: 28px;
            height: 28px;
            font-size: 12px;
        }
    }
</style>
