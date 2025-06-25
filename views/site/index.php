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

        h1, h2, h3, h4, h5 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: var(--dark);
        }

        a {
            text-decoration: none;
            color: var(--primary);
            transition: var(--transition);
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section {
            padding: 80px 0;
        }

        .content {
            width: 100%;
        }

        .narrow {
            max-width: 800px;
            margin: 0 auto;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .text-center {
            text-align: center;
        }

        .btn {
            display: block;
            padding: var(--bs-nav-link-padding-y) var(--bs-nav-link-padding-x);
            font-weight: var(--bs-nav-link-font-weight);
            color: var(--bs-nav-link-color);
            text-decoration: none;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-primary::before {
            display: inline-block;
            padding: 14px 30px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
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
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(126, 87, 194, 0.35);
        }

        .btn-primary:hover::before {
            opacity: 1;
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background-color: var(--primary);
            color: white;
        }

        .icon-box {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: white;
            font-size: 28px;
            box-shadow: var(--shadow);
        }

        .honeycomb {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-image:
                    radial-gradient(circle at 10% 20%, rgba(255, 213, 79, 0.1) 0px, transparent 2%),
                    radial-gradient(circle at 90% 40%, rgba(255, 213, 79, 0.1) 0px, transparent 2%),
                    radial-gradient(circle at 50% 70%, rgba(255, 213, 79, 0.1) 0px, transparent 2%);
            background-size: 150px 150px;
            z-index: 1;
            opacity: 0.3;
        }
        .logo {
            display: flex;
            align-items: center;
            font-size: 28px;
            font-weight: 700;
            color: var(--primary);
        }

        .logo img {
            height: 50px;
            margin-right: 10px;
        }

        .underline-hover {
            position: relative;
            display: inline-block;
            cursor: pointer;
            color: var(--dark);
        }

        .underline-hover::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -3px;
            width: 0;
            height: 2px;
            background-color: var(--secondary);
            transition: var(--transition);
        }

        .underline-hover:hover::after {
            width: 100%;
        }

        .nav-menu {
            display: flex;
            list-style: none;
        }

        .nav-menu li {
            margin-left: 30px;
        }

        .nav-menu a {
            color: var(--dark);
            font-weight: 600;
            position: relative;
            padding: 5px 0;
        }

        .nav-menu a:hover {
            color: var(--primary);
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background-color: var(--secondary);
            transition: var(--transition);
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        .hero {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 180px 0 100px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,224L48,213.3C96,203,192,181,288,154.7C384,128,480,96,576,117.3C672,139,768,213,864,229.3C960,245,1056,203,1152,181.3C1248,160,1344,160,1392,160L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: bottom;
        }

        .hero .honeycomb {
            background-image:
                    radial-gradient(circle at 10% 20%, rgba(255, 213, 79, 0.15) 0px, transparent 5%),
                    radial-gradient(circle at 90% 40%, rgba(255, 213, 79, 0.15) 0px, transparent 5%),
                    radial-gradient(circle at 50% 70%, rgba(255, 213, 79, 0.15) 0px, transparent 5%);
            background-size: 120px 120px;
        }

        .hero .content {
            position: relative;
            z-index: 2;
            max-width: 700px;
            text-align: center;
        }

        .hero .title {
            font-size: 3.8rem;
            margin-bottom: 20px;
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .hero .subtitle {
            font-size: 1.5rem;
            margin-bottom: 40px;
            color: rgba(255, 255, 255, 0.9);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero .btn {
            margin-top: 20px;
            font-size: 1.1rem;
            padding: 16px 40px;
        }

        .quote {
            background-color: var(--light-bg);
            position: relative;
        }

        .quote .honeycomb {
            background-image:
                    radial-gradient(circle at 20% 30%, rgba(126, 87, 194, 0.1) 0px, transparent 5%),
                    radial-gradient(circle at 80% 60%, rgba(126, 87, 194, 0.1) 0px, transparent 5%);
            background-size: 100px 100px;
        }

        .quote blockquote {
            font-style: italic;
            font-size: 1.8rem;
            border-left: 5px solid var(--secondary);
            padding-left: 30px;
            color: var(--dark);
            position: relative;
            z-index: 2;
        }

        .quote cite {
            display: block;
            margin-top: 20px;
            font-style: normal;
            font-weight: 700;
            color: var(--primary);
            font-size: 1.2rem;
        }
        .philosophy {
            position: relative;
        }

        .philosophy .honeycomb {
            background-image:
                    radial-gradient(circle at 30% 50%, rgba(255, 213, 79, 0.1) 0px, transparent 5%),
                    radial-gradient(circle at 70% 20%, rgba(255, 213, 79, 0.1) 0px, transparent 5%);
            background-size: 120px 120px;
        }

        .philosophy h2 {
            margin-bottom: 30px;
            font-size: 2.5rem;
            position: relative;
            display: inline-block;
            color: var(--primary-dark);
        }

        .philosophy h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 70px;
            height: 4px;
            background-color: var(--secondary);
            border-radius: 2px;
        }

        .philosophy p {
            margin-bottom: 20px;
            font-size: 1.1rem;
            position: relative;
            z-index: 2;
        }

        .values {
            background-color: var(--light-bg);
            position: relative;
        }

        .values .honeycomb {
            background-image:
                    radial-gradient(circle at 20% 30%, rgba(126, 87, 194, 0.1) 0px, transparent 5%),
                    radial-gradient(circle at 80% 70%, rgba(126, 87, 194, 0.1) 0px, transparent 5%);
            background-size: 100px 100px;
        }

        .value-box {
            background: white;
            border-radius: var(--border-radius);
            padding: 40px 30px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
            position: relative;
            z-index: 2;
            border-top: 4px solid var(--primary);
        }

        .value-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(126, 87, 194, 0.2);
        }

        .value-box h3 {
            margin: 20px 0 15px;
            font-size: 1.5rem;
            color: var(--primary-dark);
        }

        .value-box p {
            color: var(--gray);
        }

        .why-us {
            position: relative;
        }

        .why-us .honeycomb {
            background-image:
                    radial-gradient(circle at 10% 80%, rgba(255, 213, 79, 0.1) 0px, transparent 5%),
                    radial-gradient(circle at 90% 30%, rgba(255, 213, 79, 0.1) 0px, transparent 5%);
            background-size: 120px 120px;
        }

        .why-us h2 {
            text-align: center;
            margin-bottom: 50px;
            font-size: 2.5rem;
            color: var(--primary-dark);
        }

        .why-list {
            list-style: none;
            position: relative;
            z-index: 2;
        }

        .why-list li {
            padding: 15px 0 15px 60px;
            position: relative;
            font-size: 1.1rem;
            border-bottom: 1px solid #e0e0e0;
        }

        .why-list li:last-child {
            border-bottom: none;
        }

        .why-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            top: 15px;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
            box-shadow: var(--shadow);
        }
        .testimonials {
            background-color: var(--light-bg);
            position: relative;
        }

        .testimonials .honeycomb {
            background-image:
                    radial-gradient(circle at 30% 40%, rgba(126, 87, 194, 0.1) 0px, transparent 5%),
                    radial-gradient(circle at 70% 60%, rgba(126, 87, 194, 0.1) 0px, transparent 5%);
            background-size: 100px 100px;
        }

        .testimonials h2 {
            text-align: center;
            margin-bottom: 50px;
            font-size: 2.5rem;
            color: var(--primary-dark);
        }

        .testimonial-item {
            background: white;
            border-radius: var(--border-radius);
            padding: 40px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            position: relative;
            z-index: 2;
        }

        .testimonial-item::before {
            content: """;
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 5rem;
            color: var(--primary-light);
            opacity: 0.3;
            font-family: Georgia, serif;
            line-height: 1;
        }

        .testimonial-item p {
            font-style: italic;
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
            font-size: 1.1rem;
        }

        .testimonial-item cite {
            font-weight: 600;
            color: var(--primary);
            font-style: normal;
            display: block;
            text-align: right;
        }

        .contacts-cta {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            position: relative;
        }

        .contacts-cta .honeycomb {
            background-image:
                    radial-gradient(circle at 20% 30%, rgba(255, 213, 79, 0.2) 0px, transparent 5%),
                    radial-gradient(circle at 80% 70%, rgba(255, 213, 79, 0.2) 0px, transparent 5%);
            background-size: 120px 120px;
        }

        .contacts-cta .content {
            position: relative;
            z-index: 2;
        }

        .contacts-cta h2 {
            color: white;
            margin-bottom: 20px;
            font-size: 2.5rem;
        }

        .contacts-cta p {
            margin-bottom: 30px;
            font-size: 1.1rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .phone-link {
            color: var(--secondary);
            font-weight: 700;
            display: inline-block;
            margin: 10px 0;
            font-size: 1.3rem;
            text-decoration: none;
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
<br>
<br>
<section class="section hero">
    <div class="honeycomb"></div>
    <div class="container content">
        <h1 class="title">Винни-Пух Языковая Школа</h1>
        <p class="subtitle">Учим языки с удовольствием и мёдом! Открой для себя мир без языковых барьеров.</p>
        <a href="site/zapis" class="btn btn-primary">Записаться на пробный урок</a>
    </div>
</section>

<section class="section quote">
    <div class="honeycomb"></div>
    <div class="container narrow">
        <blockquote>
            <p>«Кто говорит на одном языке — понимает друг друга. Кто говорит на двух языках — понимает вдвое больше.»</p>
            <cite>— Винни-Пух</cite>
        </blockquote>
    </div>
</section>

<section class="section philosophy">
    <div class="honeycomb"></div>
    <div class="container narrow">
        <h2>О нашей школе</h2>
        <p>
            В "Винни-Пухе" мы создаём не просто уроки — мы создаём приключения в мире языков. Наш подход сочетает эффективные методики, творчество и индивидуальный подход.
        </p>
        <p>
            Как Винни-Пух любит мёд, так мы любим языки! У нас нет скучных шаблонов — только ваши цели, наши преподаватели и увлекательные занятия.
        </p>
    </div>
</section>

<section class="section values">
    <div class="honeycomb"></div>
    <div class="container">
        <div class="grid">
            <div class="value-box">
                <div class="icon-box">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3>Качественное обучение</h3>
                <p>Наши преподаватели - эксперты с международными сертификатами и опытом работы за рубежом.</p>
            </div>
            <div class="value-box">
                <div class="icon-box">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Любовь к языкам</h3>
                <p>Мы учим с удовольствием и вдохновением, превращая каждый урок в увлекательное приключение.</p>
            </div>
            <div class="value-box">
                <div class="icon-box">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Индивидуальный подход</h3>
                <p>Программы адаптированы под ваши цели, уровень и предпочтения в обучении.</p>
            </div>
        </div>
    </div>
</section>

<section class="section why-us">
    <div class="honeycomb"></div>
    <div class="container narrow">
        <h2>Почему выбирают "Винни-Пух"</h2>
        <ul class="why-list">
            <li>Индивидуальные и групповые занятия с носителями языка</li>
            <li>Современные интерактивные методики обучения</li>
            <li>Гибкое расписание и удобное расположение</li>
            <li>Уютная атмосфера и дружелюбные преподаватели</li>
            <li>Гарантированный результат при регулярном посещении</li>
        </ul>
    </div>
</section>

<section class="section testimonials">
    <div class="honeycomb"></div>
    <div class="container narrow">
        <h2>Отзывы наших учеников</h2>
        <div class="testimonial-item">
            <p>"Я начала с нуля, а через полгода уже свободно общалась в путешествии! Преподаватели в "Винни-Пухе" превратили изучение языка в удовольствие."</p>
            <cite>— Ольга К.</cite>
        </div>
        <div class="testimonial-item">
            <p>"Отличная школа с особой атмосферой! Гибкий график, интересные занятия и видимый прогресс. Рекомендую всем, кто хочет заговорить на английском."</p>
            <cite>— Дмитрий С.</cite>
        </div>
        <div class="testimonial-item">
            <p>"Благодаря подготовке в "Винни-Пухе" я сдала экзамен по английскому и поступила в университет во Англии. Спасибо за вашу поддержку и профессионализм!"</p>
            <cite>— Ирина П.</cite>
        </div>
    </div>
</section>

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