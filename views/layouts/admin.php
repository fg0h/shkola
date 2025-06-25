<?php
/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->beginPage();
?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= Html::encode($this->title) ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
        <style>
            :root {
                --primary: #7E57C2;
                --primary-dark: #5E35B1;
                --primary-light: #B39DDB;
                --secondary: #FFD54F;
                --accent: #FF7043;
                --light: #FFFFFF;
                --dark: #212121;
                --gray: #757575;
                --light-bg: #F5F5F5;
                --success: #66BB6A;
                --border-radius: 12px;
                --shadow: 0 4px 15px rgba(126, 87, 194, 0.2);
                --transition: all 0.3s ease;
            }

            body {
                font-family: 'Montserrat', sans-serif;
                padding-top: 70px;
                background-color: var(--light-bg);
                color: var(--dark);
                line-height: 1.6;
            }

            .navbar {
                background-color: rgba(255, 255, 255, 0.95) !important;
                backdrop-filter: blur(5px);
                padding: 15px 20px;
                box-shadow: var(--shadow);
                border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            }

            .navbar-brand {
                display: flex;
                align-items: center;
                font-weight: 700;
                color: var(--primary-dark) !important;
                font-size: 1.5rem;
                margin-right: 30px;
                transition: var(--transition);
            }

            .navbar-brand:hover {
                transform: translateY(-2px);
            }

            .navbar-brand i {
                font-size: 1.5rem;
                margin-right: 10px;
                color: var(--primary);
            }

            .navbar-nav {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .nav-link {
                color: var(--dark) !important;
                font-weight: 600;
                font-size: 1rem;
                padding: 10px 15px !important;
                border-radius: var(--border-radius);
                transition: var(--transition);
                position: relative;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .nav-link:hover {
                color: var(--primary) !important;
                background: rgba(126, 87, 194, 0.1);
            }

            .nav-link.active {
                color: var(--primary) !important;
                font-weight: 700;
            }

            .nav-link.active::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 15px;
                width: calc(100% - 30px);
                height: 3px;
                background-color: var(--secondary);
                border-radius: 3px;
            }

            .logout-form {
                display: inline;
            }

            .logout-btn {
                color: var(--primary) !important;
                padding: 10px 15px !important;
                border-radius: var(--border-radius);
                background: none;
                border: none;
                font-weight: 600;
                font-size: 1rem;
                cursor: pointer;
                transition: var(--transition);
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }

            .logout-btn:hover {
                background: rgba(126, 87, 194, 0.1);
                transform: translateY(-2px);
            }

            main {
                flex: 1;
                padding: 30px 0;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 20px;
            }

            @media (max-width: 991.98px) {
                body {
                    padding-top: 65px;
                }

                .navbar {
                    padding: 10px 15px;
                }

                .navbar-nav {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 5px;
                    padding-top: 15px;
                }

                .nav-link, .logout-btn {
                    padding: 12px 15px !important;
                    width: 100%;
                    text-align: left;
                }

                .nav-link.active::after {
                    left: 15px;
                    width: calc(100% - 30px);
                }
            }
        </style>
        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header id="header">
        <?php
        NavBar::begin([
            'brandLabel' => '<i class="fas fa-language"></i> ЯзыкШкола',
            'brandUrl' => Url::to(['/site/index']),
            'options' => [
                'class' => 'navbar navbar-expand-lg fixed-top'
            ]
        ]);

        echo \yii\bootstrap5\Nav::widget([
            'options' => ['class' => 'navbar-nav ms-auto'],
            'encodeLabels' => false,
            'items' => [
                ['label' => '<i class="fas fa-tachometer-alt"></i> Панель', 'url' => ['/site/admin'], 'active' => Yii::$app->controller->id == 'site'],
                ['label' => '<i class="fas fa-book-open"></i> Курсы', 'url' => ['/courses/index'], 'active' => Yii::$app->controller->id == 'courses'],
                ['label' => '<i class="fas fa-calendar-alt"></i> Расписание', 'url' => ['/raspisanie/index'], 'active' => Yii::$app->controller->id == 'raspisanie'],
                ['label' => '<i class="fas fa-users"></i> Группы', 'url' => ['/groups/index'], 'active' => Yii::$app->controller->id == 'groups'],
                ['label' => '<i class="fas fa-chalkboard-teacher"></i> Преподаватели', 'url' => ['/teachers/index'], 'active' => Yii::$app->controller->id == 'teachers'],
                ['label' => '<i class="fas fa-user-graduate"></i> Студенты', 'url' => ['/students/index'], 'active' => Yii::$app->controller->id == 'students'],
                ['label' => '<i class="fas fa-file-alt"></i> Заявки', 'url' => ['/zapis/index'], 'active' => Yii::$app->controller->id == 'applications'],
                '<li class="nav-item">' .
                Html::beginForm(['/site/logout'], 'post', ['class' => 'logout-form']) .
                Html::submitButton(
                    '<i class="fas fa-sign-out-alt"></i> Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'logout-btn']
                ) .
                Html::endForm() .
                '</li>',
            ],
        ]);

        NavBar::end();
        ?>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <?= $content ?>
        </div>
    </main>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>