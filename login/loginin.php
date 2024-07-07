<?php
// Подключение к базе данных (замените данными вашей базы)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_club";

$conn = new mysqli($servername, $username, $password, $dbname);
// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Защита от SQL-инъекций
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Запрос для проверки пользователя в базе данных
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    session_start();
    if ($result->num_rows > 0) {
        // Получаем данные пользователя
    $user = $result->fetch_assoc();
    
    // Сохраняем роль пользователя в сессии
    
    $_SESSION['id'] = $user['id'];
    $_SESSION['role'] = $user['role'];
    
    
    // Перенаправляем на основную страницу
    header("Location: ../index.php");
    exit;
} else {
    // Пользователь не найден, выводим сообщение об ошибке или перенаправляем на другую страницу
    echo "Неверный email или пароль";
}
}

// Закрытие соединения с базой данных
$conn->close();
?>