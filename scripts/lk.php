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
<script>
    function logout() {
        window.location.href = 'logout.php';
    }
    function editProfile() {
    document.getElementById("profile-edit-form").style.display = "block";
}
    </script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <button onclick="window.location.href='../index.php'">Главная страница</button>
        <button onclick="logout()">Выйти из профиля</button>
    </header>

    <main>
        <section class="profile">
            <h2>Профиль администратора</h2>
            <p>Имя: <span id="firstName"><?php echo "{$Name}"; ?></span></p>
            <p>Фамилия: <span id="lastName"><?php echo "{$surname}"; ?></span></p>
            <p>Email: <span id="email"><?php echo "{$email}"; ?></span></p>
            <button onclick="editProfile()">Редактировать профиль</button>
        </section>

        <section id="profile-edit-form" style="display: none;" class="profile">
            <h2>Редактировать профиль</h2>
            <form action="update_profile.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div>
                    <label for="edit-name">Имя:</label>
                    <input type="text" id="edit-name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
                </div>
                <div>
                    <label for="edit-surname">Фамилия:</label>
                    <input type="text" id="edit-surname" name="surname" value="<?php echo htmlspecialchars($surname); ?>" required>
                </div>
                <div>
                    <label for="edit-email">Email:</label>
                    <input type="email" id="edit-email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                </div>
                <div>
                    <label for="edit-password">Пароль:</label>
                    <input type="password" id="edit-password" name="password">
                </div>
                <div>
                    <button type="submit">Сохранить изменения</button>
                </div>
            </form>
        </section>

        <section class="users">
            <h2>Список пользователей</h2>
            <input type="text" id="search" placeholder="Поиск пользователей..." onkeyup="searchUsers()">
            <table>
                <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Email</th>
                        <th>Роль</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody id="userList">
                    <!-- Данные будут загружены сюда с помощью JavaScript -->
                </tbody>
            </table>
        </section>
        <section id="user-edit-form" style="display: none;">
            <h2>Редактировать пользователя</h2>
            <form id="editForm">
                <input type="hidden" name="id" id="edit-id">
                <div>
                    <label for="edit-name">Имя:</label>
                    <input type="text" id="edit-name" name="name" required>
                </div>
                <div>
                    <label for="edit-surname">Фамилия:</label>
                    <input type="text" id="edit-surname" name="surname" required>
                </div>
                <div>
                    <label for="edit-role">Роль:</label>
                    <input type="text" id="edit-role" name="role" required>
                </div>
                <div>
                    <button type="button" onclick="updateUser()">Сохранить изменения</button>
                </div>
            </form>
        </section>
    </main>

    <script>
    function logout() {
        window.location.href = 'logout.php';
    }

    function editProfile() {
        document.getElementById("profile-edit-form").style.display = "block";
    }

    function loadUsers() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'fetch_users.php', true);
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById('userList').innerHTML = this.responseText;
            }
        }
        xhr.send();
    }

    function searchUsers() {
        let input = document.getElementById('search').value.toLowerCase();
        let table = document.getElementById('userList');
        let tr = table.getElementsByTagName('tr');

        for (let i = 0; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName('td');
            let found = false;
            for (let j = 0; j < td.length; j++) {
                if (td[j]) {
                    let txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toLowerCase().indexOf(input) > -1) {
                        found = true;
                        break;
                    }
                }
            }
            tr[i].style.display = found ? '' : 'none';
        }
    }

    function editUser(id, name, surname, role) {
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-name').value = name;
        document.getElementById('edit-surname').value = surname;
        document.getElementById('edit-role').value = role;
        document.getElementById('user-edit-form').style.display = 'block';
    }

    function updateUser() {
        const form = document.getElementById('editForm');
        const formData = new FormData(form);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_user.php', true);
        xhr.onload = function() {
            if (this.status === 200) {
                loadUsers();
                document.getElementById('user-edit-form').style.display = 'none';
            }
        }
        xhr.send(formData);
    }

    function deleteUser(id) {
        if (confirm('Вы уверены, что хотите удалить этого пользователя?')) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'delete_user.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (this.status === 200) {
                    loadUsers();
                }
            }
            xhr.send('id=' + id);
        }
    }

    // Загружаем пользователей при загрузке страницы
    window.onload = loadUsers;
    </script>
    <script src="scripts.js"></script>
</body>
</html>