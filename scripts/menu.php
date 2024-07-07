
<a href="#main-section">Главная</a>
<a href="#price-section">Цены</a>
<a href="#yandex-maps-section">Карты</a>
<a href="#footer">Контакты</a>
<?php
session_start();
// Проверяем наличие роли в сессии
if(isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
    // Проверяем роль пользователя и выводим соответствующую ссылку
    if($role == 'admin') {
        echo '<a href="scripts/lk.php">Личный кабинет</a>';
    } else {
        echo '<a href="scripts/lk1.php">Личный кабинет</a>';
    }
} else {
    // Если роль не определена, выводим ссылку на страницу входа
    echo '<a href="login/login.php">Вход</a>';
}
?>


