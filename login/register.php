<?php
session_start();

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_club";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Проверка, что пароли совпадают

// Хеширование пароля


// Добавление данных в таблицу
$sql = "INSERT INTO user (email, password, role) VALUES ('$email', '$password', 'user')";

if ($conn->query($sql) === TRUE) {
    // Регистрация успешна, перенаправляем на главную страницу
    header("Location: login.php");
    exit();
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>