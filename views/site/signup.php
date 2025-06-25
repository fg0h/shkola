<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

$form = ActiveForm::begin([
    'options' => ['class' => 'registration-form-container']
])
?>

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
            background: linear-gradient(135deg, rgba(126, 87, 194, 0.05), rgba(94, 53, 177, 0.05));
        }

        .registration-form-container {
            background: var(--light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 1200px;
            margin: 40px auto;
            padding: 60px;
            border: 1px solid var(--border);
            display: flex;
            flex-wrap: wrap;
            min-height: 80vh;
        }

        .registration-header {
            flex: 0 0 100%;
            text-align: center;
            margin-bottom: 50px;
        }

        .registration-header h2 {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--primary-dark);
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: -1px;
        }

        .registration-header p {
            font-size: 1.5rem;
            color: var(--gray);
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.7;
        }

        .registration-form {
            flex: 1;
            min-width: 500px;
            padding-right: 40px;
        }

        .registration-image {
            flex: 1;
            min-width: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .registration-image-content {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            color: white;
            text-align: center;
            font-size: 1.8rem;
            font-weight: 600;
            line-height: 1.5;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
        }

        .form-col {
            flex: 1;
            min-width: 250px;
            padding: 0 15px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--dark);
            font-size: 1.1rem;
        }

        .form-control {
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

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(126, 87, 194, 0.2);
        }

        .form-check {
            display: flex;
            align-items: center;
            margin: 30px 0 40px;
        }

        .form-check-input {
            width: 24px;
            height: 24px;
            margin-right: 15px;
            border: 2px solid var(--primary);
            border-radius: 6px;
            cursor: pointer;
            flex-shrink: 0;
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .form-check-label {
            font-size: 1.1rem;
            color: var(--gray);
            line-height: 1.6;
            cursor: pointer;
        }

        .form-check-label a {
            color: var(--primary);
            text-decoration: none;
            transition: var(--transition);
            font-weight: 600;
        }

        .form-check-label a:hover {
            text-decoration: underline;
        }

        .but {
            text-align: center;
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
        }

        .button2:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(126, 87, 194, 0.4);
        }

        @media (max-width: 1200px) {
            .registration-form-container {
                padding: 40px;
            }

            .registration-header h2 {
                font-size: 3rem;
            }

            .registration-header p {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 992px) {
            .registration-form {
                flex: 0 0 100%;
                padding-right: 0;
                min-width: auto;
            }

            .registration-image {
                flex: 0 0 100%;
                min-width: auto;
                margin-top: 40px;
            }

            .registration-image-content {
                padding: 30px;
                font-size: 1.5rem;
            }

            .form-col {
                flex: 0 0 100%;
            }
        }

        @media (max-width: 768px) {
            .registration-form-container {
                padding: 30px;
            }

            .registration-header h2 {
                font-size: 2.5rem;
            }

            .registration-header p {
                font-size: 1.1rem;
            }

            .form-control {
                padding: 16px 18px;
                font-size: 1rem;
                height: 55px;
            }

            .button2 {
                padding: 18px 40px;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 10px;
            }

            .registration-form-container {
                padding: 25px 20px;
                margin: 20px auto;
            }

            .registration-header h2 {
                font-size: 2rem;
            }

            .form-group label {
                font-size: 1rem;
            }

            .form-check-label {
                font-size: 0.95rem;
            }

            .button2 {
                padding: 16px 30px;
                font-size: 1rem;
            }
        }
    </style>

    <div class="registration-form-container">
        <div class="registration-header">
            <h2>Создайте свой аккаунт</h2>
            <p>Присоединяйтесь к языковой школе "Винни-Пух" и откройте для себя мир без языковых барьеров</p>
        </div>

        <div class="registration-form">
            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <?= $form->field($model, 'username')->textInput([
                            'class' => 'form-control',
                            'placeholder' => 'Придумайте логин'
                        ])->label('Логин') ?>
                    </div>
                </div>

                <div class="form-col">
                    <div class="form-group">
                        <?= $form->field($model, 'email')->textInput([
                            'class' => 'form-control',
                            'placeholder' => 'example@mail.ru'
                        ])->label('Email') ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <?= $form->field($model, 'first_name')->textInput([
                            'class' => 'form-control',
                            'placeholder' => 'Ваше имя'
                        ])->label('Имя') ?>
                    </div>
                </div>

                <div class="form-col">
                    <div class="form-group">
                        <?= $form->field($model, 'last_name')->textInput([
                            'class' => 'form-control',
                            'placeholder' => 'Ваша фамилия'
                        ])->label('Фамилия') ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <?= $form->field($model, 'date_birthd')->widget(MaskedInput::className(), [
                            'options' => [
                                'class' => 'form-control',
                                'placeholder' => 'ГГГГ-ММ-ДД'
                            ],
                            'mask' => '9999-99-99',
                        ])->label('Дата рождения') ?>
                    </div>
                </div>

                <div class="form-col">
                    <div class="form-group">
                        <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
                            'options' => [
                                'class' => 'form-control',
                                'placeholder' => '+7 (___) ___ __ __'
                            ],
                            'mask' => '+7 (999) 999 99 99',
                        ])->label('Телефон') ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <?= $form->field($model, 'password')->passwordInput([
                            'class' => 'form-control',
                            'placeholder' => 'Не менее 8 символов'
                        ])->label('Пароль') ?>
                    </div>
                </div>

                <div class="form-col">
                    <div class="form-group">
                        <?= $form->field($model, 'password_repair')->passwordInput([
                            'class' => 'form-control',
                            'placeholder' => 'Повторите пароль'
                        ])->label('Подтверждение пароля') ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <?= $form->field($model, 'role')->dropDownList([
                            0 => 'Студент',
                            1 => 'Учитель',
                        ], [
                            'class' => 'form-control',
                            'prompt' => 'Выберите роль'
                        ])->label('Роль') ?>
                    </div>
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                <label class="form-check-label" for="flexCheckDefault">
                    Я согласен с <a href="#">условиями использования</a> и <a href="#">политикой конфиденциальности</a>
                </label>
            </div>

            <div class="form-group">
                <div class="but">
                    <?= Html::submitButton('Создать аккаунт', ['class' => 'button2']) ?>
                </div>
            </div>
        </div>

        <div class="registration-image">
            <div class="registration-image-content">
                Учите языки с удовольствием!<br>
                Откройте для себя мир без границ
            </div>
        </div>
    </div>
<?php ActiveForm::end() ?>