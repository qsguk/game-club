<?php
require("connect.php");
session_start();

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['id'])) {
    die("Пользователь не авторизован.");
}

// Получаем данные из POST-запроса
$id = $_POST['id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Подготовка данных для обновления
$name = $mysqli->real_escape_string($name);
$surname = $mysqli->real_escape_string($surname);
$email = $mysqli->real_escape_string($email);

// Обновление данных в базе
if (!empty($password)) {
    $password = $mysqli->real_escape_string($password);
     
    $update_sql = "UPDATE `user` SET `name`='$name', `surname`='$surname', `email`='$email', `password`='$password' WHERE `id`=$id";
} else {
    $update_sql = "UPDATE `user` SET `name`='$name', `surname`='$surname', `email`='$email' WHERE `id`=$id";
}

if ($mysqli->query($update_sql)) {
    // Обновление прошло успешно, перенаправляем на страницу профиля
    header("Location: lk.php");
    exit();
} else {
    die("Ошибка обновления данных: " . $mysqli->error);
}

$mysqli->close();
?>
