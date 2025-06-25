<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Запись на курс';
?>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title><?= Html::encode($this->title) ?> - Винни-Пух</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    :root {
        --primary: #7E57C2;
        --primary-dark: #5E35B1;
        --primary-light: #B39DDB;
        --light: #FFFFFF;
        --dark: #212121;
        --darker: #121212;
        --gray: #424242;
        --light-bg: #F5F5F7;
        --border: rgba(0, 0, 0, 0.08);
        --border-radius: 16px;
        --shadow: 0 4px 20px rgba(126, 87, 194, 0.15);
        --transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Montserrat', sans-serif;
    }

    body {
        background-color: var(--light);
        color: var(--darker);
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        padding: 20px;
        font-family: 'Montserrat', sans-serif;
        background: linear-gradient(135deg, rgba(126, 87, 194, 0.05), rgba(94, 53, 177, 0.05));
    }

    .registration-form-container {
        background: var(--light);
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        width: 100%;
        max-width: 900px;
        margin: 40px auto;
        padding: 60px;
        border: 1px solid var(--border);
        min-height: 80vh;
    }

    .registration-header {
        text-align: center;
        margin-bottom: 50px;
        font-family: 'Montserrat', sans-serif;
    }

    .registration-header h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: -0.5px;
        font-family: 'Montserrat', sans-serif;
    }

    .registration-header p {
        font-size: 1.2rem;
        color: var(--gray);
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
        font-weight: 400;
    }

    .registration-form .form-group {
        margin-bottom: 30px;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        color: var(--dark);
        font-size: 1.1rem;
        font-family: 'Montserrat', sans-serif;
    }

    select.form-control {
        width: 100%;
        padding: 18px 20px;
        border: 1px solid var(--border);
        border-radius: 12px;
        font-size: 1.1rem;
        transition: var(--transition);
        background-color: var(--light);
        color: var(--darker);
        height: 60px;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image:
                linear-gradient(45deg, transparent 50%, var(--primary) 50%),
                linear-gradient(135deg, var(--primary) 50%, transparent 50%);
        background-position:
                calc(100% - 20px) calc(1em + 2px),
                calc(100% - 15px) calc(1em + 2px);
        background-size: 5px 5px, 5px 5px;
        background-repeat: no-repeat;
        font-family: 'Montserrat', sans-serif;
    }

    select.form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(126, 87, 194, 0.2);
    }

    .button2 {
        display: inline-block;
        padding: 18px 40px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: var(--light);
        border: none;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: var(--shadow);
        width: 100%;
        max-width: 350px;
        margin: 0 auto;
        display: block;
        font-family: 'Montserrat', sans-serif;
    }

    .button2:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(126, 87, 194, 0.35);
    }

    @media (max-width: 768px) {
        .registration-form-container {
            padding: 40px 30px;
        }

        .registration-header h2 {
            font-size: 2rem;
        }

        .registration-header p {
            font-size: 1rem;
        }

        .button2 {
            padding: 16px 30px;
            font-size: 1rem;
        }
    }
</style>

<div class="registration-form-container">
    <div class="registration-header">
        <h2>Запись на курс</h2>
        <p>Выберите страну, город и курс для записи</p>
    </div>

    <?php $form = ActiveForm::begin(['options' => ['class' => 'registration-form']]); ?>

    <?= $form->field($model, 'strana')->dropDownList(
        $model::getCountries(),
        ['prompt' => 'Выберите страну', 'id' => 'strana-select', 'class' => 'form-control']
    )->label('Страна') ?>

    <?= $form->field($model, 'gorod')->dropDownList(
        [],
        ['prompt' => 'Выберите город', 'id' => 'gorod-select', 'class' => 'form-control']
    )->label('Город') ?>

    <?= $form->field($model, 'course_id')->dropDownList(
        $courses,
        ['prompt' => 'Выберите курс', 'class' => 'form-control']
    )->label('Курс') ?>

    <div class="form-group">
        <?= Html::submitButton('Записаться', ['class' => 'button2']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<script>
    document.getElementById('strana-select').addEventListener('change', function() {
        const country = this.value;
        const citySelect = document.getElementById('gorod-select');

        citySelect.innerHTML = '<option value="">Выберите город</option>';

        if (!country) return;

        fetch('<?= Url::to(['site/cities']) ?>?country=' + encodeURIComponent(country))
            .then(response => response.json())
            .then(data => {
                data.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city;
                    option.textContent = city;
                    citySelect.appendChild(option);
                });
            });
    });
</script>