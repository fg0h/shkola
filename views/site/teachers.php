<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Преподаватели - Языковой Центр</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
        }

        body {
            background-color: var(--light);
            color: var(--darker);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            min-height: 100vh;
            font-family: 'Montserrat', sans-serif;
        }


        .teachers-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 100px 20px 50px;
            text-align: center;
            position: relative;
            color: var(--light);
        }

        .teachers-header .title {
            font-size: 3.2rem;
            font-weight: 800;
            margin: 0;
            letter-spacing: -1px;
            line-height: 1.1;
            margin-bottom: 15px;
            color: var(--light);
            text-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }

        .teachers-header .subtitle {
            font-size: 1.5rem;
            font-weight: 400;
            margin: 0 0 25px;
            letter-spacing: 0.5px;
            color: rgba(255, 255, 255, 0.9);
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .teachers-header .description {
            font-size: 1.15rem;
            max-width: 700px;
            margin: 0 auto 30px;
            line-height: 1.7;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.85);
        }

        .description-line {
            display: block;
            margin-bottom: 8px;
        }

        .teachers-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 20px 80px;
            position: relative;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--darker);
            margin-bottom: 15px;
            font-weight: 700;
        }

        .section-title p {
            color: var(--gray);
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .divider {
            width: 80px;
            height: 4px;
            background: var(--primary);
            border-radius: 2px;
            margin: 20px auto;
        }

        .teachers-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            padding: 20px 0;
        }

        .teacher-card {
            background: var(--light);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
        }

        .teacher-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(126, 87, 194, 0.25);
        }

        .teacher-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 30px 20px;
            text-align: center;
            position: relative;
            min-height: 140px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .teacher-avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 3px solid rgba(255,255,255,0.3);
            margin-bottom: 15px;
            object-fit: cover;
        }

        .teacher-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--light);
            margin: 0;
            line-height: 1.3;
        }

        .teacher-username {
            font-size: 1rem;
            color: var(--primary-light);
            margin-top: 8px;
            font-weight: 500;
        }

        .teacher-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .teacher-details {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .teacher-detail {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .detail-row {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .detail-icon {
            width: 42px;
            height: 42px;
            background: rgba(126, 87, 194, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 20px;
            flex-shrink: 0;
        }

        .detail-info {
            flex-grow: 1;
            min-width: 0;
        }

        .detail-label {
            font-weight: 600;
            color: var(--gray);
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .detail-value {
            color: var(--darker);
            font-size: 1.1rem;
            font-weight: 500;
            line-height: 1.5;
        }

        .teacher-footer {
            padding: 0 25px 25px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .teacher-button {
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
            box-shadow: 0 4px 12px rgba(126, 87, 194, 0.25);
            cursor: pointer;
        }

        .teacher-button:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(126, 87, 194, 0.35);
        }

        .teacher-languages {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 5px;
        }

        .language-tag {
            background: rgba(126, 87, 194, 0.1);
            color: var(--primary);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .footer {
            background: var(--darker);
            color: var(--light);
            padding: 60px 0 30px;
            margin-top: 60px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
        }

        .footer-col h3 {
            font-size: 1.3rem;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-col h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: var(--primary);
            border-radius: 3px;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 15px;
        }

        .footer-col ul li a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
        }

        .footer-col ul li a:hover {
            color: var(--primary-light);
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
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            color: var(--light);
            transition: all 0.3s ease;
            font-size: 18px;
        }

        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 30px;
            margin-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.5);
            font-size: 0.9rem;
        }

        @media (max-width: 1200px) {
            .teachers-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 25px;
            }

            .footer-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 992px) {

            .teachers-header {
                padding: 80px 20px 40px;
            }

            .teachers-header .title {
                font-size: 2.5rem;
            }

            .teachers-header .subtitle {
                font-size: 1.3rem;
                margin-bottom: 15px;
            }

            .teachers-header .description {
                font-size: 1rem;
                margin-bottom: 20px;
            }

            .section-title h2 {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            .teachers-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }


            .teacher-name {
                font-size: 1.3rem;
            }

            .detail-value {
                font-size: 1rem;
            }

            .footer-container {
                grid-template-columns: 1fr;
            }
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

        @media (max-width: 992px) {
            .courses-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 25px;
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 30px;
            }
        }

        @media (max-width: 768px) {
            .courses-header {
                padding: 80px 20px 40px;
            }

            .courses-header .title {
                font-size: 2.3rem;
            }

            .courses-header .subtitle {
                font-size: 1.3rem;
                margin-bottom: 15px;
            }

            .card-title {
                font-size: 1.3rem;
            }

            .detail-value {
                font-size: 1rem;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .footer-col {
                padding: 10px 0;
            }

            footer {
                padding: 50px 20px 25px;
            }
        }

        @media (max-width: 576px) {
            .courses-header {
                padding: 70px 20px 30px;
            }

            .courses-header .title {
                font-size: 2rem;
            }

            .courses-header .subtitle {
                font-size: 1.1rem;
            }

            .courses-grid {
                grid-template-columns: 1fr;
                padding: 0;
            }

            .card-content {
                padding: 20px;
            }

            .course-button {
                padding: 12px 20px;
                font-size: 0.95rem;
            }

            .footer-links li {
                font-size: 0.95rem;
            }

            .social-links a {
                width: 40px;
                height: 40px;
                font-size: 18px;
            }

        @media (max-width: 576px) {
            .teachers-header {
                padding: 70px 20px 30px;
            }

            .teachers-header .title {
                font-size: 2rem;
            }

            .teachers-header .subtitle {
                font-size: 1.1rem;
            }

            .teachers-grid {
                grid-template-columns: 1fr;
                padding: 0;
            }

            .teacher-content {
                padding: 20px;
            }

            .teacher-button {
                padding: 12px 20px;
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>
<br>
<br>
<header class="teachers-header">
    <h1 class="title">Наши Преподаватели</h1>
    <p class="subtitle">Профессионалы с международным опытом</p>
    <p class="description">
        <span class="description-line">Наши преподаватели - это команда профессионалов с международными дипломами и многолетним</span>
        <span class="description-line">опытом преподавания. Они помогут вам достичь ваших языковых целей!</span>
    </p>
</header>
<main class="teachers-container">
    <div class="section-title">
        <h2>Команда профессионалов</h2>
        <div class="divider"></div>
        <p>Познакомьтесь с нашими преподавателями - носителями языка и экспертами в лингвистике</p>
    </div>

    <div class="teachers-grid">
        <div class="teacher-card">
            <div class="teacher-header">
                <h2 class="teacher-name">Сорсонна</h2>
                <div class="teacher-username">магистр лингвистики</div>
            </div>

            <div class="teacher-content">
                <div class="teacher-details">
                    <div class="teacher-detail">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="detail-info">
                                <div class="detail-label">Специализация</div>
                                <div class="detail-value">Итальянский язык, лингвистика, перевод</div>
                            </div>
                        </div>
                    </div>

                    <div class="teacher-detail">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="detail-info">
                                <div class="detail-label">Образование</div>
                                <div class="detail-value">Университет Болоньи, магистр лингвистики</div>
                            </div>
                        </div>
                    </div>

                    <div class="teacher-detail">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="detail-info">
                                <div class="detail-label">Языки</div>
                                <div class="teacher-languages">
                                    <span class="language-tag">Итальянский</span>
                                    <span class="language-tag">Английский</span>
                                    <span class="language-tag">Французский</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="teacher-footer">
                <button class="teacher-button">Записаться на урок</button>
            </div>
        </div>

        <div class="teacher-card">
            <div class="teacher-header">
                <h2 class="teacher-name">Кузнецов Алексей</h2>
                <div class="teacher-username">@akuznetsov</div>
            </div>

            <div class="teacher-content">
                <div class="teacher-details">
                    <div class="teacher-detail">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="detail-info">
                                <div class="detail-label">Специализация</div>
                                <div class="detail-value">Испанская филология, латиноамериканская культура</div>
                            </div>
                        </div>
                    </div>

                    <div class="teacher-detail">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="detail-info">
                                <div class="detail-label">Образование</div>
                                <div class="detail-value">Университет Барселоны, PhD по филологии</div>
                            </div>
                        </div>
                    </div>

                    <div class="teacher-detail">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="detail-info">
                                <div class="detail-label">Языки</div>
                                <div class="teacher-languages">
                                    <span class="language-tag">Испанский</span>
                                    <span class="language-tag">Русский</span>
                                    <span class="language-tag">Каталанский</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="teacher-footer">
                <button class="teacher-button">Записаться на урок</button>
            </div>
        </div>

        <div class="teacher-card">
            <div class="teacher-header">
                <h2 class="teacher-name">Мария Петрова</h2>
                <div class="teacher-username">@maria_teacher</div>
            </div>

            <div class="teacher-content">
                <div class="teacher-details">
                    <div class="teacher-detail">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="detail-info">
                                <div class="detail-label">Специализация</div>
                                <div class="detail-value">Французский язык, подготовка к DELF/DALF</div>
                            </div>
                        </div>
                    </div>

                    <div class="teacher-detail">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="detail-info">
                                <div class="detail-label">Образование</div>
                                <div class="detail-value">Сорбонна, магистр преподавания французского</div>
                            </div>
                        </div>
                    </div>

                    <div class="teacher-detail">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="detail-info">
                                <div class="detail-label">Языки</div>
                                <div class="teacher-languages">
                                    <span class="language-tag">Французский</span>
                                    <span class="language-tag">Английский</span>
                                    <span class="language-tag">Русский</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="teacher-footer">
                <button class="teacher-button">Записаться на урок</button>
            </div>
        </div>

        <!-- Карточка 4 -->
        <div class="teacher-card">
            <div class="teacher-header">
                <h2 class="teacher-name">Джон Смит</h2>
                <div class="teacher-username">@john_smith_en</div>
            </div>

            <div class="teacher-content">
                <div class="teacher-details">
                    <div class="teacher-detail">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="detail-info">
                                <div class="detail-label">Специализация</div>
                                <div class="detail-value">Деловой английский, подготовка к IELTS/TOEFL</div>
                            </div>
                        </div>
                    </div>

                    <div class="teacher-detail">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="detail-info">
                                <div class="detail-label">Образование</div>
                                <div class="detail-value">Оксфордский университет, магистр лингвистики</div>
                            </div>
                        </div>
                    </div>

                    <div class="teacher-detail">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="detail-info">
                                <div class="detail-label">Языки</div>
                                <div class="teacher-languages">
                                    <span class="language-tag">Английский</span>
                                    <span class="language-tag">Немецкий</span>
                                    <span class="language-tag">Испанский</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="teacher-footer">
                <button class="teacher-button">Записаться на урок</button>
            </div>
        </div>


        <div class="teacher-card">
            <div class="teacher-header">
                <h2 class="teacher-name">Анна Мюллер</h2>
                <div class="teacher-username">@german_anna</div>
            </div>

            <div class="teacher-content">
                <div class="teacher-details">
                    <div class="teacher-detail">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="detail-info">
                                <div class="detail-label">Специализация</div>
                                <div class="detail-value">Немецкий язык, подготовка к TestDaF</div>
                            </div>
                        </div>
                    </div>

                    <div class="teacher-detail">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="detail-info">
                                <div class="detail-label">Образование</div>
                                <div class="detail-value">Мюнхенский университет, PhD по германистике</div>
                            </div>
                        </div>
                    </div>

                    <div class="teacher-detail">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="detail-info">
                                <div class="detail-label">Языки</div>
                                <div class="teacher-languages">
                                    <span class="language-tag">Немецкий</span>
                                    <span class="language-tag">Английский</span>
                                    <span class="language-tag">Русский</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="teacher-footer">
                <button class="teacher-button">Записаться на урок</button>
            </div>
        </div>

        <div class="teacher-card">
            <div class="teacher-header">
                <h2 class="teacher-name">Чжан Вэй</h2>
                <div class="teacher-username">@chinese_teacher</div>
            </div>

            <div class="teacher-content">
                <div class="teacher-details">
                    <div class="teacher-detail">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="detail-info">
                                <div class="detail-label">Специализация</div>
                                <div class="detail-value">Китайский язык, подготовка к HSK</div>
                            </div>
                        </div>
                    </div>

                    <div class="teacher-detail">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="detail-info">
                                <div class="detail-label">Образование</div>
                                <div class="detail-value">Пекинский университет, магистр китаистики</div>
                            </div>
                        </div>
                    </div>

                    <div class="teacher-detail">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="detail-info">
                                <div class="detail-label">Языки</div>
                                <div class="teacher-languages">
                                    <span class="language-tag">Китайский</span>
                                    <span class="language-tag">Английский</span>
                                    <span class="language-tag">Русский</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="teacher-footer">
                <button class="teacher-button">Записаться на урок</button>
            </div>
        </div>
    </div>
</main>
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