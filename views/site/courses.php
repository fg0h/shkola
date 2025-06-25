<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Курсы - Винни-Пух';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Винни-Пух - Языковая Школа</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            color: var(--dark);
            line-height: 1.6;
            background-color: var(--light);
            overflow-x: hidden;
            font-family: 'Montserrat', sans-serif;
        }

        .courses-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 100px 20px 50px;
            text-align: center;
            position: relative;
            color: var(--light);
        }

        .courses-header .title {
            font-size: 3rem;
            font-weight: 800;
            margin: 0;
            letter-spacing: -1px;
            line-height: 1.1;
            text-transform: uppercase;
            margin-bottom: 15px;
            color: var(--light);
        }

        .courses-header .subtitle {
            font-size: 1.5rem;
            font-weight: 400;
            margin: 0 0 25px;
            letter-spacing: 0.5px;
            color: var(--light);
        }

        .courses-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px 60px;
            position: relative;
        }

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            padding: 20px 0;
        }

        .course-card {
            background: var(--light);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 1px solid rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
        }

        .course-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(126, 87, 194, 0.25);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 25px 25px;
            text-align: center;
            position: relative;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--light);
            margin: 0;
            line-height: 1.3;
            text-transform: uppercase;
            padding: 0 10px;
        }

        .card-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card-details {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .card-detail {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .detail-row {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .detail-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light);
            font-size: 20px;
            flex-shrink: 0;
        }

        .detail-info {
            flex-grow: 1;
        }

        .detail-label {
            font-weight: 600;
            color: var(--gray);
            font-size: 1.1em;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .detail-value {
            color: var(--darker);
            font-size: 1.1rem;
            font-weight: 500;
            margin-top: 2px;
        }

        .complexity-badge {
            padding: 8px 15px;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 600;
            display: inline-block;
            text-align: center;
            width: 100%;
            letter-spacing: 0.3px;
            background: rgba(126, 87, 194, 0.1);
            color: var(--primary-dark);
            border: 1px solid rgba(126, 87, 194, 0.2);
        }

        .card-footer {
            padding: 0 25px 25px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .course-button {
            display: inline-block;
            padding: 14px 30px;
            background: var(--primary);
            color: var(--light);
            text-decoration: none;
            font-weight: 600;
            border-radius: 30px;
            transition: var(--transition);
            border: none;
            text-align: center;
            width: 100%;
            font-size: 1rem;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            box-shadow: 0 4px 12px rgba(126, 87, 194, 0.25);
        }

        .course-button:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(126, 87, 194, 0.35);
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }
        footer {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--light);
            padding: 60px 20px 30px;
            position: relative;
            overflow: hidden;
        }

        .honeycomb {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 30px;
            background:
                    linear-gradient(135deg, transparent 15px, rgba(255,255,255,0.1) 0) top left,
                    linear-gradient(225deg, transparent 15px, rgba(255,255,255,0.1) 0) top right;
            background-size: 50% 100%;
            background-repeat: no-repeat;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }

        .footer-col {
            padding: 15px;
        }

        .footer-col h4 {
            font-size: 1.4rem;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 10px;
            font-weight: 600;
            letter-spacing: 0.5px;
            color: white;
        }

        .footer-col h4::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: var(--light);
            border-radius: 3px;
        }

        .footer-col p {
            color: rgba(255,255,255,0.85);
            line-height: 1.7;
            margin-bottom: 20px;
            font-size: 1.05rem;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .footer-links li i {
            font-size: 18px;
            color: var(--primary-light);
            min-width: 24px;
            margin-top: 4px;
        }

        .footer-links li a,
        .footer-links li {
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            transition: var(--transition);
            font-size: 1.05rem;
        }

        .footer-links li a:hover {
            color: var(--light);
            padding-left: 5px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            color: var(--light);
            transition: var(--transition);
            font-size: 20px;
        }

        .social-links a:hover {
            background: var(--light);
            color: var(--primary);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 40px;
            margin-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.2);
            color: rgba(255,255,255,0.7);
            font-size: 1rem;
        }

        .copyright {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 2;
        }

        .honey-bear {
            position: absolute;
            bottom: 0;
            right: 5%;
            width: 120px;
            opacity: 0.2;
            z-index: 1;
        }

        @media (max-width: 768px) {
            .section {
                padding: 60px 0;
            }

            .hero {
                padding: 150px 0 80px;
            }

            .hero .title {
                font-size: 2.5rem;
            }

            .hero .subtitle {
                font-size: 1.2rem;
            }

            .nav-menu {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .quote blockquote {
                font-size: 1.4rem;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="courses-header">
    <h1 class="title">НАШИ КУРСЫ</h1>
    <div class="subtitle">Языковая школа "Винни-Пух"</div>
</div>

<div class="courses-container">
    <div class="courses-grid">
        <?php foreach ($courses as $course): ?>
            <div class="course-card">
                <div class="card-header">
                    <h2 class="card-title"><?= Html::encode($course->name) ?></h2>
                </div>

                <div class="card-content">
                    <div class="card-details">
                        <div class="card-detail">
                            <div class="detail-label">Язык</div>
                            <div class="detail-row">
                                <div class="detail-value"><?= Html::encode($course->language) ?></div>
                            </div>
                        </div>

                        <div class="card-detail">
                            <div class="detail-label">Сложность</div>
                            <div class="detail-row">
                                <div class="detail-value">
                                        <span class="complexity-badge">
                                            <?= Html::encode($course->complexity) ?>
                                        </span>
                                </div>
                            </div>
                        </div>

                        <div class="card-detail">
                            <b><div class="detail-label">Длительность</div></b>
                            <div class="detail-row">
                                <div class="detail-value"><?= Html::encode($course->duration) ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="zapis" class="course-button">Записаться на курс</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<footer>
    <div class="honeycomb"></div>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <h4>Языковая школа "Винни-Пух"</h4>
                <p>Мы помогаем нашим ученикам преодолеть языковой барьер и достичь своих целей в изучении иностранных языков.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-vk"></i></a>
                    <a href="#"><i class="fab fa-telegram"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Наши курсы</h4>
                <ul class="footer-links">
                    <li><a href="#">Английский для детей</a></li>
                    <li><a href="#">Английский для взрослых</a></li>
                    <li><a href="#">Французский язык</a></li>
                    <li><a href="#">Немецкий язык</a></li>
                    <li><a href="#">Испанский язык</a></li>
                    <li><a href="#">Китайский язык</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Контакты</h4>
                <ul class="footer-links">
                    <li><i class="fas fa-map-marker-alt"></i> 1-й микрорайон, 35 строение 2, Курган</li>
                    <li><i class="fas fa-phone"></i> +7 (961) 571-78-22</li>
                    <li><i class="fas fa-envelope"></i> info@winnie-school.ru</li>
                    <li><i class="fas fa-clock"></i> Пн-Пт: 9:00-21:00, Сб-Вс: 10:00-18:00</li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2025 Языковая школа "Винни-Пух". Все права защищены.</p>
        </div>
    </div>
</footer>
</body>
</html>