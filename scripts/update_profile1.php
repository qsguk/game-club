<?php
require("connect.php");
session_start();

// Проверка, что пользователь авторизован
if (!isset($_SESSION['id'])) {
    die("Пользователь не авторизован.");
}

// Получаем данные из формы
$id = $_POST['id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Проверка, что пароли совпадают
if (!empty($password) && ($password !== $confirm_password)) {
    die("Пароли не совпадают.");
}

// Защита от SQL-инъекций
$name = $mysqli->real_escape_string($name);
$surname = $mysqli->real_escape_string($surname);
$email = $mysqli->real_escape_string($email);

// Создание строки обновления
if (!empty($password)) {
    
    $update_sql = "UPDATE `user` SET `name`='$name', `surname`='$surname', `email`='$email', `password`='$password' WHERE `id`=$id";
} else {
    $update_sql = "UPDATE `user` SET `name`='$name', `surname`='$surname', `email`='$email' WHERE `id`=$id";
}

// Выполнение запроса
if ($mysqli->query($update_sql)) {
    echo "Профиль обновлен.";
    header("Location: lk1.php"); // Перенаправление на страницу профиля
} else {
    echo "Ошибка обновления профиля: " . $mysqli->error;
}

$mysqli->close();
?>