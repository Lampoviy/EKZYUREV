<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        header {
            background-color: #3f51b5;
            padding: 20px 0;
            color: white;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        nav {
            margin-top: 20px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .content {
            margin-top: 20px;
        }

        .carousel {
            width: 60%; /* Уменьшаем ширину карусели */
            overflow: hidden;
            position: relative;
            border-radius: 10px;
            margin: 0 auto; /* Центрируем карусель по горизонтали */
        }

        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease;
        }

        .carousel-item {
            flex: 0 0 100%;
            max-width: 100%;
            height: 500px; /* Уменьшаем высоту изображений */
        }

        img {
            width: 100%;
            height: auto;
        }

    </style>
</head>
<body>
<header>
    <div class="container">
        <h1>МегаАптека</h1>
        <nav>
            <?php if (!isset($_SESSION['userId'])): ?>
                <a href="index.php">Главная</a>
                <a href="about.php">О нас</a>
                <a href="contacts.php">Контакты</a>
                <a href="login.php">Вход</a>
                <a href="register.php">Регистрация</a>
            <?php elseif ($_SESSION['userRole'] === 'admin'): ?>
                <a href="index.php">Главная</a>
                <a href="leklist.php">Лекарства</a>
                <a href="admin_panel.php">Админ панель</a>
                <a href="logout.php">Выход</a>
            <?php else: ?>
                <a href="index.php">Главная</a>
                <a href="leklist.php">Лекарства</a>
                <a href="about.php">О нас</a>
                <a href="contacts.php">Контакты</a>
                <a href="profile.php">Профиль</a>
                <a href="logout.php">Выход</a>
            <?php endif; ?>
        </nav>
    </div>
</header>

    <div class="content">
    <div class="container">
        <h2>Добро пожаловать на главную страницу</h2>
        <p>Найдем аптеку с самой выгодной ценой в Ярославле!</p>
        <img src="1.jpg" alt="Image 1" style="width: 700px; height: 500px;">
        <!-- Добавьте больше изображений, если нужно -->
    </div>
    
    <?php if (!isset($_SESSION['userId'])): ?>
        <p style="margin-left: 180px;">Чтобы увидеть дополнительные разделы сайта, пожалуйста, <a href="login.php">войдите</a> или <a href="register.php">зарегистрируйтесь</a>.</p>
    <?php endif; ?>
</div>


    <script>
        const carouselItems = document.querySelectorAll('.carousel-item');
        let currentIndex = 0;

        setInterval(() => {
            currentIndex = (currentIndex + 1) % carouselItems.length;
            const offset = currentIndex * -100;
            document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
        }, 2000); // Измените время смены изображений, если нужно
    </script>

</body>
</html>
