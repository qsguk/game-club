<?php
require("connect.php");
session_start();

// Проверка, что пользователь авторизован
if (!isset($_SESSION['id'])) {
    die("Пользователь не авторизован.");
}

// Получаем данные из POST-запроса
$id = $_POST['id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$role = $_POST['role'];

// Защита данных от SQL-инъекций
$id = $mysqli->real_escape_string($id);
$name = $mysqli->real_escape_string($name);
$surname = $mysqli->real_escape_string($surname);
$role = $mysqli->real_escape_string($role);

// Обновление данных в базе
$update_sql = "UPDATE `user` SET `name`='$name', `surname`='$surname', `role`='$role' WHERE `id`=$id";

if ($mysqli->query($update_sql)) {
    echo "Данные пользователя обновлены.";
} else {
    echo "Ошибка обновления данных: " . $mysqli->error;
}

$mysqli->close();
?>