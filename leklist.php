<?php
session_start();


require_once 'db_config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ паенль</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
        <h2>Аптеки и лекарства</h2>

        <?php
        // Получение данных о лекарствах и аптеках из базы данных
        $sql = "SELECT apteka.nazvanieapteki, lek.nazvanie, apteka.stoimost, apteka.adres FROM apteka INNER JOIN lek ON apteka.id_lek = lek.id_lek";
        $result = $conn->query($sql);

        // Вывод каждого лекартсва в красивой рамочке
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div style="border: 1px solid #ccc; border-radius: 10px; padding: 10px; margin-bottom: 20px;">';
                echo '<h3>' . $row['nazvanieapteki'] . '</h3>';
                echo '<p>Лекарство: ' . $row['nazvanie'] . '</p>';
                echo '<p>Цена: ' . $row['stoimost'] . '</p>';
                echo '<p>Адрес: ' . $row['adres'] . '</p>';
                echo '</div>';
            }
        } else {
            echo "Пользователи не найдены.";
        }
        ?>
    </div>
</div>

</body>
</html>
