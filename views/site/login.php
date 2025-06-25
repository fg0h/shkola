<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Вход';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Html::encode($this->title) ?> - Винни-Пух</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #7e57c2;
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
            padding: 20px;
            background: linear-gradient(135deg, rgba(126, 87, 194, 0.05), rgba(94, 53, 177, 0.05));
        }

        .login-form-container {
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

        .login-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .login-header h2 {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--primary-dark);
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: -1px;
        }

        .login-header p {
            font-size: 1.5rem;
            color: var(--gray);
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.7;
        }

        .form-group {
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--dark);
            font-size: 1.1rem;
        }

        input.form-control {
            width: 100%;
            padding: 18px 20px;
            border: 1px solid var(--border);
            border-radius: 12px;
            font-size: 1.1rem;
            transition: var(--transition);
            background-color: var(--light);
            color: var(--darker);
            height: 60px;
        }

        input.form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(126, 87, 194, 0.2);
        }

        .button2 {
            display: inline-block;
            padding: 20px 50px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--light);
            border: none;
            border-radius: 50px;
            font-size: 1.3rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            display: block;
        }

        .button2:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(126, 87, 194, 0.4);
        }

        /* Исправленные стили для чекбокса */
        .remember-me-container {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .remember-me-checkbox {
            width: 24px;
            height: 24px;
            margin-right: 12px;
            accent-color: var(--primary);
        }

        .remember-me-label {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
            margin: 0;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .login-form-container {
                padding: 40px 30px;
            }

            .login-header h2 {
                font-size: 2.5rem;
            }

            .login-header p {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
<div class="login-form-container">
    <div class="login-header">
        <h2>ВХОД</h2>
        <p>Пожалуйста, заполните следующие поля для входа на сайт</p>
    </div>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'inputOptions' => ['class' => 'form-control'],
            'errorOptions' => ['class' => 'invalid-feedback'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Имя пользователя') ?>

    <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

    <div class="remember-me-container">
        <?= Html::activeCheckbox($model, 'rememberMe', [
            'class' => 'remember-me-checkbox',
            'label' => 'Запомнить меня',
            'labelOptions' => ['class' => 'remember-me-label']
        ]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Войти', ['class' => 'button2', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</body>
</html>