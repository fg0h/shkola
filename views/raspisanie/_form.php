<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Groups;
use app\models\User;

/** @var yii\web\View $this */
/** @var app\models\Raspisanie $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="raspisanie-form">

    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-calendar-alt"></i>
            <?= Html::encode($model->isNewRecord ? 'Добавить занятие' : 'Редактировать занятие') ?>
        </h1>
        <div class="page-actions">
            <?= Html::a('<i class="fas fa-arrow-left"></i> Назад', ['index'], ['class' => 'btn btn-back']) ?>
        </div>
    </div>

    <div class="card">
        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'custom-form'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"input-wrapper\">{input}</div>\n{error}",
                'labelOptions' => ['class' => 'control-label'],
                'inputOptions' => ['class' => 'form-input'],
                'errorOptions' => ['class' => 'error-message']
            ]
        ]); ?>

        <div class="form-grid">
            <div class="form-card">
                <?= $form->field($model, 'time')->textInput([
                    'type' => 'time',
                    'class' => 'form-input time-picker'
                ]) ?>
            </div>

            <div class="form-card">
                <?= $form->field($model, 'den_nedeli')->dropDownList([
                    'Понедельник' => 'Понедельник',
                    'Вторник' => 'Вторник',
                    'Среда' => 'Среда',
                    'Четверг' => 'Четверг',
                    'Пятница' => 'Пятница',
                    'Суббота' => 'Суббота',
                    'Воскресенье' => 'Воскресенье'
                ], [
                    'prompt' => 'Выберите день недели',
                    'class' => 'form-input'
                ]) ?>
            </div>

            <div class="form-card">
                <?= $form->field($model, 'group_id')->dropDownList(
                    ArrayHelper::map(Groups::find()->all(), 'id', 'name'),
                    [
                        'prompt' => 'Выберите группу',
                        'class' => 'form-input'
                    ]
                ) ?>
            </div>

            <div class="form-card">
                <?= $form->field($model, 'user_id')->dropDownList(
                    ArrayHelper::map(User::find()->where(['role' => 'teacher'])->all(), 'id', 'name'),
                    [
                        'prompt' => 'Выберите преподавателя',
                        'class' => 'form-input'
                    ]
                ) ?>
            </div>
        </div>

        <div class="form-actions">
            <?= Html::submitButton('<i class="fas fa-save"></i> Сохранить', [
                'class' => 'form-submit-btn',
                'name' => 'submit-button'
            ]) ?>

            <?= Html::a('<i class="fas fa-times"></i> Отмена', ['index'], [
                'class' => 'form-cancel-btn'
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<style>
    .raspisanie-form {
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
        padding: 30px;
        border-top: 4px solid var(--primary);
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

    .time-picker {
        appearance: none;
        -webkit-appearance: none;
        padding: 11px 15px;
    }

    .form-input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(126, 87, 194, 0.2);
        outline: none;
        background-color: white;
    }

    select.form-input {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%237e57c2' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 15px;
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

<script>
    // Инициализация timepicker, если нужно
    document.addEventListener('DOMContentLoaded', function() {
        // Можно добавить кастомную логику для timepicker здесь
    });
</script>