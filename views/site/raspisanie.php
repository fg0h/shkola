<?php
use yii\helpers\Html;
$this->title = 'Моё расписание';
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
            font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        body {
            color: var(--dark);
            line-height: 1.6;
            background-color: var(--light);
            overflow-x: hidden;
            font-weight: 400;
        }

        .courses-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 100px 20px 50px;
            text-align: center;
            position: relative;
            color: var(--light);
            margin-bottom: 40px;
            min-height: 200px;
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
            padding: 0 20px 60px;
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

        .detail-label {
            font-weight: 600;
            color: var(--gray);
            font-size: 1.1em;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .detail-value {
            color: var(--dark);
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

        .courses-grid > p {
            grid-column: 1 / -1;
            text-align: center;
            font-size: 1.2rem;
            color: var(--gray);
            padding: 40px 0;
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

        .copyright {
            text-align: center;
            padding-top: 40px;
            margin-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.2);
            color: rgba(255,255,255,0.7);
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            .courses-header {
                padding: 80px 20px 40px;
            }

            .courses-header .title {
                font-size: 2.5rem;
            }

            .courses-header .subtitle {
                font-size: 1.2rem;
            }

            .courses-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="courses-header">
    <h1 class="title">Моё расписание</h1>
    <p class="subtitle">Только для вас 😊</p>
</div>

<div class="courses-container">
    <div class="courses-grid">
        <?php if (empty($raspisanie)): ?>
            <p>У вас пока нет записей в расписании.</p>
        <?php else: ?>
            <?php foreach ($raspisanie as $item): ?>
                <div class="course-card">
                    <div class="card-header">
                        <h2 class="card-title"><?= htmlspecialchars($item->den_nedeli) ?></h2>
                    </div>
                    <div class="card-content">
                        <div class="card-details">
                            <div class="card-detail">
                                <div class="detail-label">Время</div>
                                <div class="detail-value"><?= htmlspecialchars(substr($item->time, 0, 5)) ?></div>
                            </div>
                            <div class="card-detail">
                                <div class="detail-label">Группа</div>
                                <div class="detail-value"><?= htmlspecialchars($item->group->name ?? 'Без названия') ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="complexity-badge">ID: <?= $item->id ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
</body>
</html>