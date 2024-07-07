<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_club";

$conn = new mysqli($servername, $username, $password, $dbname);

$isAuthenticated = isset($_SESSION['id']) && isset($_SESSION['role']);
$role = $isAuthenticated ? $_SESSION['role'] : null;
$user_id = $isAuthenticated ? $_SESSION['id'] : null;

if ($isAuthenticated) {
    $sql = "SELECT time, name_tariff, use_not FROM tariffs WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();}
?>
<?php
require("connect.php");
session_start();

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['id'])) {
    die("Пользователь не авторизован.");
}

// Получаем ID пользователя из сессии
$id = $_SESSION['id'];

// Создание строки инструкции SELECT
$select_sql = "SELECT * FROM `user` WHERE `id` = " . $id;

// Выполнение запроса
$res = $mysqli->query($select_sql);
if ($res) {
    // Получаем возвращаемую строку
    $row = $res->fetch_array();
    $Name = $row['Name'];
    $surname = $row['surname'];
    $email = $row['email'];
} else {
    die("Ошибка получения пользователя с ID = $id");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #14161C;
            color: #FFFFFF;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }
        .header button {
            padding: 10px 20px;
            background-color: #1B263B;
            border: none;
            color: #FFFFFF;
            cursor: pointer;
        }
        .profile-info, .edit-form {
            margin: 20px 0;
        }
        .profile-info div, .edit-form div {
            margin-bottom: 10px;
        }
        .actions {
            display: flex;
            gap: 20px;
            margin: 20px 0;
        }
        .actions button {
            padding: 10px 20px;
            background-color: #1B263B;
            border: none;
            color: #FFFFFF;
            cursor: pointer;
        }
        .game-time {
            margin: 20px 0;
        }
        .game-time table {
            width: 100%;
            border-collapse: collapse;
        }
        .game-time table tr {
            border-bottom: 1px solid #FFFFFF;
        }
        .game-time table tr:last-child {
            border-bottom: none;
        }
        .game-time table td {
            padding: 10px 0;
        }
        .edit-form {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <button onclick="window.location.href='../index.php'">Главная</button>
        </div>
        <div class="profile-info">
            <div>Email: <?php echo "{$email}"; ?></div>
            <div>Имя: <?php echo "{$Name}"; ?></div>
            <div>Фамилия: <?php echo "{$surname}"; ?></div>
        </div>
        <div class="actions">
            <button onclick="toggleEditForm()">Редактировать профиль</button>
            <button onclick="logout()">Выйти из профиля</button>
        </div>
        <div class="edit-form" id="editForm">
            <form action="update_profile1.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div>
                    <label for="name">Имя:</label>
                    <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
                </div>
                <div>
                    <label for="surname">Фамилия:</label>
                    <input type="text" id="surname" name="surname" value="<?php echo $surname; ?>" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div>
                    <label for="password">Пароль:</label>
                    <input type="password" id="password" name="password">
                </div>
                <div>
                    <label for="confirm_password">Повторите пароль:</label>
                    <input type="password" id="confirm_password" name="confirm_password">
                </div>
                <button type="submit">Сохранить изменения</button>
            </form>
        </div>
        <div class="game-time">
            <h2>Забронированные часы игрового времени</h2>
            <table>
        
        <?php
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['name_tariff']; ?></td>
                <td><?php echo $row['use_not']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
        </div>
    </div>

    <script>
        function logout() {
            window.location.href = 'logout.php';
        }

        function toggleEditForm() {
            const editForm = document.getElementById('editForm');
            if (editForm.style.display === 'none' || editForm.style.display === '') {
                editForm.style.display = 'block';
            } else {
                editForm.style.display = 'none';
            }
        }
    </script>
</body>
</html>