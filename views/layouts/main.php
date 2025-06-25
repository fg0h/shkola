<?php
/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Breadcrumbs;
use app\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

$isAdmin = !Yii::$app->user->isGuest && Yii::$app->user->identity->role == 2;
$isAdminPage = Yii::$app->controller->id === 'site' && Yii::$app->controller->action->id === 'admin';
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= Html::encode($this->title) ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
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
                padding-top: 80px;
                background-color: var(--light);
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
                font-size: 1.8rem;
                margin-right: 30px;
                transition: var(--transition);
            }

            .navbar-brand:hover {
                transform: translateY(-2px);
            }

            .navbar-brand i {
                font-size: 1.8rem;
                margin-right: 10px;
                color: var(--primary);
            }

            .navbar-nav {
                display: flex;
                align-items: center;
                gap: 15px;
            }

            .nav-link {
                color: var(--dark) !important;
                font-weight: 600;
                font-size: 1.05rem;
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
                font-size: 1.05rem;
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

            .navbar-toggler {
                border: none;
                padding: 0.5rem;
                color: var(--primary);
            }

            .navbar-toggler:focus {
                box-shadow: none;
            }

            main {
                flex: 1;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 25px 20px;
            }

            @media (max-width: 991.98px) {
                body {
                    padding-top: 70px;
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
                    width: 100%;
                    text-align: left;
                    padding: 12px 15px !important;
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
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar navbar-expand-lg fixed-top']
        ]);

        $menuItems = [];

        if ($isAdminPage && $isAdmin) {
            $menuItems[] = ['label' => '<i class="fas fa-tachometer-alt"></i> Админ', 'url' => ['/site/admin']];
            $menuItems[] = '<li class="nav-item">'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'logout-form'])
                . Html::submitButton(
                    '<i class="fas fa-sign-out-alt"></i> Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'logout-btn']
                )
                . Html::endForm()
                . '</li>';
        } else {
            $menuItems = [
                ['label' => '<i class="fas fa-book-open"></i> Курсы', 'url' => ['/site/courses']],
                ['label' => '<i class="fas fa-chalkboard-teacher"></i> Преподаватели', 'url' => ['/site/teachers']],
                ['label' => '<i class="fas fa-calendar-check"></i> Запись', 'url' => ['/site/zapis']],
                ['label' => '<i class="fas fa-calendar-alt"></i> Расписание', 'url' => ['/site/raspisanie']],
            ];

            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => '<i class="fas fa-user-plus"></i> Регистрация', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => '<i class="fas fa-sign-in-alt"></i> Вход', 'url' => ['/site/login']];
            } else {
                if ($isAdmin) {
                    $menuItems[] = ['label' => '<i class="fas fa-tachometer-alt"></i> Админ', 'url' => ['/site/admin']];
                }

                $menuItems[] = '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'logout-form'])
                    . Html::submitButton(
                        '<i class="fas fa-sign-out-alt"></i> Выйти (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'logout-btn']
                    )
                    . Html::endForm()
                    . '</li>';
            }
        }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ms-auto'],
            'encodeLabels' => false,
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>