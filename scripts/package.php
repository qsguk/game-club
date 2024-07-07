<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_club";

$conn = new mysqli($servername, $username, $password, $dbname);

$isAuthenticated = isset($_SESSION['id']) && isset($_SESSION['role']);
$role = $isAuthenticated ? $_SESSION['role'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tariff'])) {
    // Проверяем, был ли пользователь аутентифицирован
    if ($isAuthenticated) {
        $user_id = $_SESSION['id'];
        $tariff = $_POST['tariff'];
        $time = date('Y-m-d H:i:s');
        $name_tar = $_POST['name_tar']; // Получаем информацию о текущем выбранном пакете

        // Подготовленный запрос для вставки данных в базу данных
        $stmt = $conn->prepare("INSERT INTO tariffs (user_id, name_tariff, time, name_tar) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $user_id, $tariff, $time, $name_tar);

        // Выполняем запрос
        if ($stmt->execute()) {
            // После успешного добавления записи, перенаправляем на страницу личного кабинета
            header("Location: lk1.php");
            exit();
        }

        // Закрываем запрос
        $stmt->close();
    } else {
        echo "Пожалуйста, войдите, чтобы забронировать тариф.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 20px 2px;
            cursor: pointer;
            border-radius: 12px;
            transition-duration: 0.4s;
        }
        
        .button:hover {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
        }
    </style>
</head>
<body>

<?php
$tariff = isset($_GET['tariff']) ? $_GET['tariff'] : '';
$time = isset($_GET['time']) ? $_GET['time'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';
?>

<script>
    const tariff = "<?php echo $tariff; ?>";
    const time = "<?php echo $time; ?>";
    const price = "<?php echo $price; ?>";

    const source = {
        "standart": {
            "bg": "modal-fon",
            "name": "STANDART",
            "gpu": "NVIDIA GeForce GTX 1650",
            "cpu": "Intel Core i3-9100",
            "ram": "16Gb, 3000Mhz",
            "screen": "144Hz, 23.6\", закруглённый",
            "mouse": "HIPER QUANTUM Q-M2",
            "keyboard": "HIPER MK-2 CHASE"
        },
        "vip": {
            "bg": "modal-fon2",
            "name": "VIP",
            "gpu": "NVIDIA GeForce GTX 1650",
            "cpu": "Intel Core i3-9100",
            "ram": "16Gb, 3200Mhz",
            "screen": "144Hz, 27\", закруглённый",
            "mouse": "HyperX Pulsefire",
            "keyboard": "HyperX Alloy Core RGB"
        },
        "tv": {
            "bg": "modal-fon4",
            "name": "TV",
            "screen": '144Hz 40" 4K Ultra HD',
            "console": "PlayStation 5"
        }
    };

    document.addEventListener("DOMContentLoaded", function() {
        const modalData = source[tariff];
        document.getElementById("modal-title").classList.add(modalData.bg);
        document.getElementById("modal-tariff").textContent = `Тариф "${modalData.name}"`;
       
        document.getElementById("modal-time").textContent = time;
        document.getElementById("modal-price").textContent = `${price} ₽`;

        if (tariff !== 'tv') {
            document.getElementById("gpu").textContent = modalData.gpu;
            document.getElementById("cpu").textContent = modalData.cpu;
            document.getElementById("ram").textContent = modalData.ram;
            document.getElementById("screen").textContent = modalData.screen;
            document.getElementById("mouse").textContent = modalData.mouse;
            document.getElementById("keyboard").textContent = modalData.keyboard;
            document.getElementById("gpu-wrapper").style.display = "block";
            document.getElementById("cpu-wrapper").style.display = "block";
            document.getElementById("ram-wrapper").style.display = "block";
            document.getElementById("mouse-wrapper").style.display = "block";
            document.getElementById("keyboard-wrapper").style.display = "block";
            document.getElementById("console-wrapper").style.display = "none";
        } else {
            document.getElementById("screen").textContent = modalData.screen;
            document.getElementById("console").textContent = modalData.console;
            document.getElementById("gpu-wrapper").style.display = "none";
            document.getElementById("cpu-wrapper").style.display = "none";
            document.getElementById("ram-wrapper").style.display = "none";
            document.getElementById("mouse-wrapper").style.display = "none";
            document.getElementById("keyboard-wrapper").style.display = "none";
            document.getElementById("console-wrapper").style.display = "block";
        }
    });

    function closeModal() {
        window.location.href = '../index.php#price-section';
    }
</script>

<div id="myModal" class="modal">
    <div class="modal-content horizontal-centered">
        <div id="modal-title">
            <div class="modal-tariff-wrapper vertical-centered">
                <h1 id="modal-tariff">Тариф</h1>
            </div>
            <span class="close" onclick="closeModal()">&times;</span>
        </div>
        <div id="modal-info">
            <div id="modal-chars">
                <div class="modal-chars-title">
                    <div class="text-wrapper">
                        <h1>ИНФОРМАЦИЯ</h1>
                    </div>
                </div>
                <div class="modal-char">
                    <div class="text-wrapper">
                        <p>ВРЕМЯ<span id="modal-time"></span></p>
                    </div>
                    <div class="text-wrapper">
                        <p>ЦЕНА<span id="modal-price"></span></p>
                    </div>
                </div>
                <div id="modal-actions" class="modal-actions">
                    <?php if (!$isAuthenticated) : ?>
                        <button class="button" onclick="login()">Войти</button>
                    <?php else : ?>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="tariff" value="<?php echo isset($_GET['tariff']) ? $_GET['tariff'] : ''; ?>">
        <button class="button" type="submit">Забронировать</button>
    </form>
                    <?php endif; ?>
                </div>
            </div>
            <div id="modal-pc-wrapper">
                <div class="modal-pc-title">
                    <div class="text-wrapper">
                        <h1>ХАРАКТЕРИСТИКИ</h1>
                    </div>
                </div>
                <div id="modal-pc">
                    <div class="modal-pc-part" id="gpu-wrapper">
                        <div class="text-wrapper">
                            <img src="../src/gpu.png" />    
                            <p id="gpu"></p>
                        </div>
                    </div>
                    <div class="modal-pc-part" id="cpu-wrapper">
                        <div class="text-wrapper">
                            <img src="../src/cpu.png" />    
                            <p id="cpu"></p>
                        </div>
                    </div>
                    <div class="modal-pc-part" id="ram-wrapper">
                        <div class="text-wrapper">
                            <img src="../src/ram.png" />    
                            <p id="ram"></p>
                        </div>
                    </div>
                    <div class="modal-pc-part" id="screen-wrapper">
                        <div class="text-wrapper">
                            <img src="../src/monitor.png" />    
                            <p id="screen"></p>
                        </div>
                    </div>
                    <div class="modal-pc-part" id="mouse-wrapper">
                        <div class="text-wrapper">
                            <img src="../src/mouse.png" />    
                            <p id="mouse"></p>
                        </div>
                    </div>
                    <div class="modal-pc-part" id="keyboard-wrapper">
                        <div class="text-wrapper">
                            <img src="../src/keyboard.png" />    
                            <p id="keyboard"></p>
                        </div>
                    </div>
                    <div class="modal-pc-part" id="console-wrapper">
                        <div class="text-wrapper">
                            <img src="../src/console.png" />    
                            <p id="console"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>