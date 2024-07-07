<?php
require("connect.php");
session_start();

// Проверка, что пользователь авторизован и имеет права на просмотр списка пользователей
if (!isset($_SESSION['id'])) {
    die("Пользователь не авторизован.");
}

// Запрос данных пользователей из базы данных
$sql = "SELECT id, name, surname, email, role FROM user";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['surname']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['role']) . "</td>";
        echo "<td>";
        echo "<button onclick=\"editUser(" . $row['id'] . ", '" . htmlspecialchars($row['name']) . "', '" . htmlspecialchars($row['surname']) . "', '" . htmlspecialchars($row['role']) . "')\">Редактировать</button>";
        echo "<button onclick=\"deleteUser(" . $row['id'] . ")\">Удалить</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>Нет пользователей</td></tr>";
}

$mysqli->close();
?>