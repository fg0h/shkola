<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Courses $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Курсы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="courses-view">

    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-book-open"></i> <?= Html::encode($this->title) ?>
        </h1>
        <div class="page-actions">
            <?= Html::a('<i class="fas fa-arrow-left"></i> Назад', ['index'], ['class' => 'btn btn-back']) ?>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="course-actions">
                <?= Html::a('<i class="fas fa-pencil-alt"></i> Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-edit']) ?>
                <?= Html::a('<i class="fas fa-trash"></i> Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-delete',
                    'data' => [
                        'confirm' => 'Вы уверены, что хотите удалить этот курс?',
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
                        'attribute' => 'name',
                        'label' => 'Название',
                    ],
                    [
                        'attribute' => 'complexity',
                        'label' => 'Сложность',
                    ],
                    [
                        'attribute' => 'language',
                        'label' => 'Язык',
                    ],
                    [
                        'attribute' => 'duration',
                        'label' => 'Длительность',
                    ],
                    [
                        'attribute' => 'created_at',
                        'label' => 'Дата создания',
                        'format' => ['datetime', 'php:d.m.Y H:i'],
                    ],
                    [
                        'attribute' => 'updated_at',
                        'label' => 'Дата обновления',
                        'format' => ['datetime', 'php:d.m.Y H:i'],
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>

<style>
    .courses-view {
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

    .course-actions {
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
        transition: var(--transition);
        box-shadow: var(--shadow);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-edit:hover {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(126, 87, 194, 0.4);
    }

    .btn-delete {
        background: linear-gradient(135deg, #f53b57, #ef5777);
        color: white;
        border: none;
        padding: 10px 20px;
        font-weight: 600;
        border-radius: 30px;
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

        .course-actions {
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
</style>