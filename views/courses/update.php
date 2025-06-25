<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Courses $model */

$this->title = 'Редактирование курса: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Курсы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>

<div class="courses-update">
    <div class="admin-form-container">
        <div class="form-header">
            <h1 class="form-title">
                <i class="fas fa-edit"></i> <?= Html::encode($this->title) ?>
            </h1>
            <div class="form-actions">
                <?= Html::a('<i class="fas fa-arrow-left"></i> Назад', ['index'], ['class' => 'btn btn-back']) ?>
            </div>
        </div>

        <div class="form-card">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>

<style>
    .courses-update {
        padding: 30px 0;
    }

    .admin-form-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .form-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .form-title {
        color: var(--primary-dark);
        font-size: 1.8rem;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .form-title i {
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

    .form-card {
        background: var(--light);
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        padding: 30px;
        border-top: 4px solid var(--primary);
    }

    /* Стили для формы */
    .form-group {
        margin-bottom: 20px;
    }

    .control-label {
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 8px;
        display: block;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: var(--border-radius);
        transition: var(--transition);
        font-size: 1rem;
    }

    .form-control:focus {
        border-color: var(--primary-light);
        box-shadow: 0 0 0 0.25rem rgba(126, 87, 194, 0.25);
        outline: none;
    }

    .help-block {
        color: var(--gray);
        font-size: 0.85rem;
        margin-top: 5px;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        padding: 12px 30px;
        font-weight: 600;
        border-radius: 30px;
        cursor: pointer;
        transition: var(--transition);
        box-shadow: var(--shadow);
        font-size: 1rem;
        margin-top: 10px;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(126, 87, 194, 0.4);
        background: linear-gradient(135deg, var(--primary-dark), var(--primary));
    }

    /* Адаптивность */
    @media (max-width: 767.98px) {
        .form-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .form-title {
            font-size: 1.5rem;
        }

        .form-card {
            padding: 20px;
        }
    }
</style>