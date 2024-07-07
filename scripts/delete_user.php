<?php
require("connect.php");
session_start();

// Проверка, что пользователь авторизован
if (!isset($_SESSION['id'])) {
    die("Пользователь не авторизован.");
}

// Получаем данные из POST-запроса
$id = $_POST['id'];

// Защита данных от SQL-инъекций
$id = $mysqli->real_escape_string($id);

$delete_sql = "DELETE FROM `user` WHERE `id`=$id";

if ($mysqli->query($delete_sql)) {
    echo "Пользователь удален.";
} else {
    echo "Ошибка удаления пользователя: " . $mysqli->error;
}

$mysqli->close();
?>