<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Groups $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="groups-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'custom-form'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"input-wrapper\">{input}</div>\n{error}",
            'labelOptions' => ['class' => 'control-label'],
            'inputOptions' => ['class' => 'form-input'],
            'errorOptions' => ['class' => 'error-message'],
        ],
    ]); ?>

    <div class="form-grid">
        <div class="form-card">
            <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="form-card">
            <?= $form->field($model, 'teacher_id')->textInput() ?>
        </div>

        <div class="form-card">
            <?= $form->field($model, 'course_id')->textInput() ?>
        </div>

        <div class="form-card">
            <?= $form->field($model, 'created_at')->textInput() ?>
        </div>

        <div class="form-card">
            <?= $form->field($model, 'updated_at')->textInput() ?>
        </div>
    </div>

    <div class="form-actions">
        <?= Html::submitButton('<i class="fas fa-save"></i> Сохранить', [
            'class' => 'form-submit-btn',
            'data' => [
                'confirm' => 'Вы уверены, что хотите сохранить изменения?',
                'method' => 'post',
            ],
        ]) ?>

        <?= Html::a('<i class="fas fa-times"></i> Отмена', ['index'], [
            'class' => 'form-cancel-btn',
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style>
    .groups-form {
        padding: 20px 0;
    }

    .custom-form {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-card {
        background: white;
        border-radius: var(--border-radius);
        padding: 20px;
        box-shadow: var(--shadow);
        border-top: 3px solid var(--primary-light);
        transition: var(--transition);
    }

    .form-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(126, 87, 194, 0.15);
    }

    .control-label {
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 8px;
        display: block;
    }

    .input-wrapper {
        position: relative;
    }

    .form-input {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #e0e0e0;
        border-radius: var(--border-radius);
        font-size: 1rem;
        transition: var(--transition);
        background-color: #f9f9f9;
    }

    .form-input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(126, 87, 194, 0.2);
        outline: none;
        background-color: white;
    }

    .error-message {
        color: #e74c3c;
        font-size: 0.85rem;
        margin-top: 5px;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .form-submit-btn {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        padding: 12px 25px;
        font-weight: 600;
        border-radius: 30px;
        cursor: pointer;
        transition: var(--transition);
        box-shadow: var(--shadow);
        font-size: 1rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .form-submit-btn:hover {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(126, 87, 194, 0.4);
    }

    .form-submit-btn i {
        font-size: 0.9rem;
    }

    .form-cancel-btn {
        background: white;
        color: var(--primary);
        border: 2px solid var(--primary);
        padding: 10px 20px;
        font-weight: 600;
        border-radius: 30px;
        cursor: pointer;
        transition: var(--transition);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .form-cancel-btn:hover {
        background: var(--primary-light);
        transform: translateY(-3px);
        box-shadow: var(--shadow);
        color: var(--primary-dark);
    }

    @media (max-width: 767px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-actions {
            justify-content: center;
        }

        .form-submit-btn,
        .form-cancel-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>
