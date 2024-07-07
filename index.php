<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_club";

$conn = new mysqli($servername, $username, $password, $dbname);
// Проверяем наличие роли в сессии
isset($_SESSION['id']) && isset($_SESSION['role'])
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Компьютерный клуб</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed">
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Rubik">
        
        <link type="image/x-icon" href="src/favicon.ico" rel="icon">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="scripts/vue-global.js"></script>
        <style>
.pricing-table {
    background-color: var(--color-main);
    font-size: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    width: 100%;
    padding: 20px ;
    margin: 0px auto;
}

.pricing-table h2 {
    text-align: center;
    margin-bottom: 20px;
}

.tariff-table {
    width: 100%;
    border-collapse: collapse;
}

.tariff-table th, .tariff-table td {
    border: px solid #ddd;
    padding: 12px;
    text-align: center;
}

.tariff-table th {
    background-color: var(--color-main);
    color: white;
}

.tariff-table tr:nth-child(even) {
    background-color: var(--color-main);
}

.tariff-table tr:hover {
    background-color: var(--color-main);
}

.price-button {
    background-color: var(--color-main);
    color: white;
    border: 1px solid #ddd;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    border-radius: 5px;
    cursor: pointer;
}

.price-button:hover {
    background-color: var(--color-main);
    border: 1px solid #03f6fc;
}
.td123{
    color:#03f6fc;
}
</style>
    </head>
    <body>


        <header class="header">
            <div class="content">
                <!-- <div class="logo-wrapper vertical-centered">
                     <img class="logo" src="src/logo_cringe.png" height="40px" width="100px">
                </div> -->
                <div class="nav-wrapper vertical-centered">
                    <nav class="nav">
                    <?php require("scripts/menu.php");?>
                    </nav>
                    <div class="menu-block">
                        <span class="menu-btn">
                            <div class="hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="cross">
                                <span></span>
                                <span></span>
                            </div>
                        </span>
                        <ul class="menu-nav">
                        <?php require("scripts/menu.php");?>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <section class="main-section vertical-centered" id="main-section">
            <div class="content">
                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" id="Слой_2" x="0" y="0" style="enable-background:new 0 0 1517.2 435" version="1.1" viewBox="0 0 1517.2 435">

                    <style>.st1{fill:url(#SVGID_00000168826680175855689800000015483966745700170369_)}.st2{fill:url(#SVGID_00000036210383107163301680000003222247366468880022_)}.st3{fill:url(#SVGID_00000085958544973759784900000014575456559912489660_)}.st4{fill:url(#SVGID_00000067939472573920279220000004497883336563684744_)}.st5{fill:url(#SVGID_00000074408682644788036820000013423127643891013261_)}</style>
                
                    <linearGradient id="SVGID_1_" x1="-80.849" x2="1736.583" y1="-31.205" y2="491.742" gradientUnits="userSpaceOnUse"><stop offset="0" style="stop-color:#0096fd"/>
                        <stop offset="1" style="stop-color:#03f6fc"/>
                    </linearGradient>
                
                    <path class="text-svg-e" d="M1517.2 435h-251l-56-100h255z" style="fill:url(#SVGID_1_)"/>
                
                    <linearGradient id="SVGID_00000139263444471119383730000012960950417173369733_" x1="-41.817" x2="1775.614" y1="-160.071" y2="362.877" gradientUnits="userSpaceOnUse">
                        <stop offset="0" style="stop-color:#0096fd"/><stop offset="1" style="stop-color:#03f6fc"/>
                    </linearGradient>
                    
                    <path class="text-svg-e" d="M1423.7 268h-251l-56-100h255z" style="fill:url(#SVGID_00000139263444471119383730000012960950417173369733_)"/>
                
                    <linearGradient id="SVGID_00000167378612762506315820000017174544712830610089_" x1="-4.627" x2="1812.805" y1="-289.322" y2="233.626" gradientUnits="userSpaceOnUse">
                        <stop offset="0" style="stop-color:#0096fd"/><stop offset="1" style="stop-color:#03f6fc"/>
                    </linearGradient>
                    
                    <path class="text-svg-e" d="M1329.7 101h-251l-56-100h255z" style="fill:url(#SVGID_00000167378612762506315820000017174544712830610089_)"/>
                
                    <linearGradient id="SVGID_00000110462539723898159430000000424804256178848129_" x1="-60.857" x2="1756.575" y1="-93.902" y2="429.046" gradientUnits="userSpaceOnUse">
                        <stop offset="0" style="stop-color:#0096fd"/><stop offset="1" style="stop-color:#03f6fc"/>
                    </linearGradient>
                    
                    <path class="text-svg-l" d="m831.2 1 237 434h149L978.2 1z" style="fill:url(#SVGID_00000110462539723898159430000000424804256178848129_)"/>
                
                    <linearGradient id="SVGID_00000011010255490039007970000004475504771364634758_" x1="-75.308" x2="1742.123" y1="-43.677" y2="479.27" gradientUnits="userSpaceOnUse">
                        <stop offset="0" style="stop-color:#0096fd"/><stop offset="1" style="stop-color:#03f6fc"/>
                    </linearGradient>
                    
                    <path class="text-svg-l" d="m640.2 1 239 434h145L789.2 1z" style="fill:url(#SVGID_00000011010255490039007970000004475504771364634758_)"/>
                
                    <linearGradient id="SVGID_00000071536094451162449670000007465234654979625139_" x1="-107.655" x2="1709.776" y1="68.74" y2="591.687" gradientUnits="userSpaceOnUse">
                        <stop offset="0" style="stop-color:#0096fd"/><stop offset="1" style="stop-color:#03f6fc"/>
                    </linearGradient>
                
                    <path class="text-svg-g" d="M591.2 1h-146l89 167h-289v100h109c.4 19.5.8 39 1.1 58.5-24.5 5.8-45.5 7.3-60.6 7.6-9.5.1-23.2.2-40-2.4-8.2-1.2-14.9-2.8-18.2-3.6-5.7-1.4-36.4-9.1-61.1-30.7-5.9-5.2-47-41.3-41.3-90.4 3.8-32.6 26.1-53.2 39-65 41.6-38.2 93.2-40.2 109.4-40.6 55.6-1.4 95.8 23.4 110.6 33.6 22.7-28 45.3-56 68-84-25.4-16-68.9-38.7-127.3-47.4-60.1-9-106.8 1.1-128.6 6.1-20.9 4.7-49.9 11.6-83.7 30.4-21 11.7-60.8 34.5-90.1 81.7C20.9 138.7 2.1 169.6.1 213.6c-2.5 55.1 23 95 32.7 109.6 31.9 48.4 76 68.6 103.5 81.3 46.7 21.4 86.5 24.8 116.6 27.4 72.1 6.1 127.4-7.8 149.1-14.1 34-9.8 61.1-22.5 80.1-32.8 0-39.1 0-78.2-.1-117.3 36.4-1.9 72.7-3.8 109.1-5.7l91 173h149L591.2 1z" style="fill:url(#SVGID_00000071536094451162449670000007465234654979625139_)"/>
                </svg>
            </div>
        </section>

        <section class="qualities-section" id="qualities-section">
            <div class="content">
                <div class="quality-wrapper" id="nvidia">
                    <div class="quality quality-right">
                        <h1>Мощнейшее железо ждёт тебя</h1>
                        <p>Наши машины созданы для того, чтобы обеспечить вам максимальную производительность и комфорт в играх. 
                            У нас вы найдёте процессоры последнего поколения, высокопроизводительные видеокарты и быстрые SSD-диски. Приходите к нам и убедитесь сами: наше железо действительно ждёт вас!</p>
                    </div>
                </div>
                <div class="quality-wrapper" id="dxracer">
                    <div class="quality quality-left">
                        <h1>Геймерские кресла от DxRacer</h1>
                        <p>Это не просто мебель, это настоящие произведения искусства, созданные специально для любителей компьютерных игр. Они сочетают в себе высокую 
                            функциональность, стильный дизайн и максимальный комфорт. Благодаря этому, вы сможете провести за игрой многие часы без усталости и дискомфорта.</p>
                    </div>
                </div>
                <div class="quality-wrapper" id="play-station">
                    <div class="quality quality-right">
                        <h1>Игровая зона с PS5 и сочными телевизорами</h1>
                        <p>Добро пожаловать в нашу игровую зону, где мы предлагаем вам испытать новейшую игровую консоль PlayStation 5 вместе с нашими большими телевизорами высокого разрешения.</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="pricing-table" id="price-section">
        <h2 class="td123">Тарифы и Цены</h2>
        <table class="tariff-table">
    <tr class="td123">
        <th>Время</th>
        <th>Standart</th>
        <th>VIP</th>
        <th>TV</th>
    </tr>
    <tr>
        <td class="td123">1 час</td>
        <td><button class="price-button" onclick="location.href='scripts/package.php?tariff=standart&time=1 час&price=100'">100 руб</button></td>
        <td><button class="price-button" onclick="location.href='scripts/package.php?tariff=vip&time=1 час&price=200'">200 руб</button></td>
        <td><button class="price-button" onclick="location.href='scripts/package.php?tariff=tv&time=1 час&price=150'">150 руб</button></td>
    </tr>
    <tr>
        <td class="td123">3 часа</td>
        <td><button class="price-button" onclick="location.href='scripts/package.php?tariff=standart&time=3 часа&price=250'">250 руб</button></td>
        <td><button class="price-button" onclick="location.href='scripts/package.php?tariff=vip&time=3 часа&price=500'">500 руб</button></td>
        <td><button class="price-button" onclick="location.href='scripts/package.php?tariff=tv&time=3 часа&price=400'">400 руб</button></td>
    </tr>
    <tr>
        <td class="td123">5 часов</td>
        <td><button class="price-button" onclick="location.href='scripts/package.php?tariff=standart&time=5 часов&price=400'">400 руб</button></td>
        <td><button class="price-button" onclick="location.href='scripts/package.php?tariff=vip&time=5 часов&price=800'">800 руб</button></td>
        <td><button class="price-button" onclick="location.href='scripts/package.php?tariff=tv&time=5 часов&price=650'">650 руб</button></td>
    </tr>
    <tr>
        <td class="td123">День</td>
        <td><button class="price-button" onclick="location.href='scripts/package.php?tariff=standart&time=День&price=700'">700 руб</button></td>
        <td><button class="price-button" onclick="location.href='scripts/package.php?tariff=vip&time=День&price=1300'">1300 руб</button></td>
    </tr>
    <tr>
        <td class="td123">Ночь</td>
        <td><button class="price-button" onclick="location.href='scripts/package.php?tariff=standart&time=Ночь&price=600'">600 руб</button></td>
        <td><button class="price-button" onclick="location.href='scripts/package.php?tariff=vip&time=Ночь&price=1100'">1100 руб</button></td>
    </tr>
    <tr>
        <td class="td123">Месяц</td>
        <td><button class="price-button" onclick="location.href='scripts/package.php?tariff=standart&time=Месяц&price=5000'">5000 руб</button></td>
        <td><button class="price-button" onclick="location.href='scripts/package.php?tariff=vip&time=Месяц&price=9000'">9000 руб</button></td>
    </tr>
</table>
    </div>

        <section class="yandex-maps-section" id="yandex-maps-section">
            <div class="yandex-map">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A46ed7ec6c2f31e7c14ecc007b1dab9a7f1ae67c90ebe99e616bde7bcaa90a178&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;scroll=false&amp;style=stylers.lightness:invert"></script>
            </div>
        </section>

        <footer class="footer" id="footer">
            <img class="logo" src="src/logo.png" height="60px">
            <div class="policy-wrapper vertical-centered">
                <a href="">Политика конфиденциальности</a>
            </div>
            <div class="contacts-wrapper">
                <div class="phone-wrapper">
                    <div class="phone-icon-wrapper vertical-centered">
                        <i class="fa fa-phone-square"></i>
                    </div>
                    <div class="text-wrapper vertical-centered">
                        <h1 class="phone-number">+7 (123) 123-45-67</h1>
                    </div>
                </div>
                <div class="phone-wrapper">
                    <div class="phone-icon-wrapper vertical-centered">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="text-wrapper vertical-centered">
                        <h1 class="mail">service.d18@gmail.com</h1>
                    </div>
                </div>
                <div class="phone-wrapper">
                    <div class="phone-icon-wrapper vertical-centered">
                        <i class="fa fa-whatsapp" ></i>
                    </div>
                    <div class="text-wrapper vertical-centered">
                        <a href="">service.d18</a>
                    </div>
                </div>
                <div class="phone-wrapper">
                    <div class="phone-icon-wrapper vertical-centered">
                        <i class="fa fa-vk" ></i>
                    </div>
                    <div class="text-wrapper vertical-centered">
                        <a href="https://vk.com/game_d18">service.d18</a>
                    </div>
                </div>
            </div>
            <div class="phone-wrapper">
                <div class="phone-icon-wrapper vertical-centered">
                    <i class="fa fa-map-marker"></i>
                </div>
                <div class="text-wrapper vertical-centered">
                    <h1 class="mail">Древлянка 18а</h1>
                </div>
            </div>
        </footer>
        <script src="scripts/qualities-animation.js"></script>
        <script src="scripts/menu.js"></script>
        
    </body>
</html>