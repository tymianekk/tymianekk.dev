<?php
$lastupdate = "26.07.2025";
$version = "2.7";

$language = $_GET['lang'] ?? 'en';

$translations = [
    'pl' => [
        'lang_html' => 'pl',
        'title' => 'O mnie - tymianekk',
        'time' => 'Czas w moim kraju: ',
        'weather' => 'Pogoda w moim mieście (Kraśnik, PL): ',
        'desc' => 'Pełen pasji programista i web deweloper z Polski',
        'status_online' => 'Dostępny',
        'status_idle' => 'Zaraz wracam',
        'status_dnd' => 'Nie przeszkadzać',
        'status_offline' => 'Niedostępny',
        'in' => 'W',

        'whoami' => 'Jestem nastolatkiem z Polski z pasją do programowania. Tworzę strony internetowe i proste programy głównie dla zabawy. Bardzo lubię także eksplorować lasy i jeździć na rowerze.',

        'myfutureplans' => 'Narazie programuję głównie dla zabawy, ale planuję nauczyć się bardzo dobrze C++, aby tworzyć bardziej zaawansowane projekty.',

        'myprogrammingjourney' => '<strong>Marzec 2023</strong> - Pierwszy raz spróbowałem programowania (Python), ale prawie nic się nie nauczyłem.<br>
<strong>Listopad 2024</strong>  - Wróciłem do programowania i dałem mu drugą szansę (front-end web development)<br>
<strong>Luty 2025</strong> - Zacząłem uczyć się C i wróciłem do Pythona<br>
<strong>Kwiecień 2025</strong> - Zacząłem uczyć się C++<br>
<strong>Lipiec/Sierpień 2025</strong> - Zacząłem uczyć się PHP',

        'tools' => '<strong>Urządzenia: </strong>Mac Mini M1, Raspberry PI 5

<strong>OS: </strong>MacOS 15 Sequoia, Raspberry PI OS (Raspbian)

<strong>Edytor kodu: </strong>Visual Studio Code',
        
        'changelog' => '<strong>Ostatni update: </strong>'.$lastupdate.'<br>
<strong>Version </strong>'.$version.'<br>
Dodano tłumaczenie w PHP (zamiast tego JS), zakupiono domenę'
    ],
    'en' => [
        'lang_html' => 'en',
        'title' => 'About me - tymianekk',
        'time' => 'Time in my country: ',
        'weather' => 'Weather in my city (Kraśnik, PL): ',
        'desc' => 'A passionate programmer and web developer from Poland',
        'status_online' => 'Online',
        'status_idle' => 'Idle',
        'status_dnd' => 'Do not disturb',
        'status_offline' => 'Offline',
        'in' => 'In',

        'whoami' => 'I\'m a Polish teenager with a passion for programming. I create websites and simple programs mostly for fun. I also really enjoy exploring forests and mountain biking.',

        'myfutureplans' => 'For now, I mostly code for fun, but I plan to learn C++ really well so I can create more powerful and advanced projects.',

        'myprogrammingjourney' => '<strong>March 2023</strong> - First attempt at programming (Python), but I didn’t learn much.<br>
<strong>November 2024</strong>  - Came back to programming and gave it a second chance (front-end web development)<br>
<strong>February 2025</strong> - Started learning C and returned to Python<br>
<strong>April 2025</strong> - Began learning C++<br>
<strong>July/August 2025</strong> - Started learning PHP',

        'tools' => '<strong>Devices: </strong>Mac Mini M1, Raspberry PI 5

<strong>OS: </strong>MacOS 15 Sequoia, Raspberry PI OS (Raspbian)

<strong>Code editor: </strong>Visual Studio Code',
        
        'changelog' => '<strong>Last update: </strong>'.$lastupdate.'<br>
<strong>Version </strong>'.$version.'<br>
Added translation in PHP (instead of in JS), bought a domain'
    ]
];

$translation = $translations[$language] ?? $translations['en'];
?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars($translation['lang_html'], ENT_QUOTES)?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($translation['title'], ENT_QUOTES)?></title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="icon" type="image/png" href="Images/web-programming.png"/>
    <style>
        .content {
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-style: normal;
        }
    </style>
    <div id="discord-status-map"
        data-online="<?= htmlspecialchars($translation['status_online'], ENT_QUOTES) ?>"
        data-idle="<?= htmlspecialchars($translation['status_idle'], ENT_QUOTES) ?>"
        data-dnd="<?= htmlspecialchars($translation['status_dnd'], ENT_QUOTES) ?>"
        data-offline="<?= htmlspecialchars($translation['status_offline'], ENT_QUOTES) ?>"
        data-in="<?= htmlspecialchars($translation['in'], ENT_QUOTES) ?>">
</div>
</head>
<body>
    <div class="content">
        <nav>
            <a href="?lang=<?= $language === 'pl' ? 'en' : 'pl' ?>">
                <img src="Images/<?= $language === 'pl' ? 'en.png' : 'pl.png' ?>">
            </a>
            <div style="display: flex; align-items: center; text-shadow: 0px 10px 8px rgb(87, 87, 87); gap: 5px;">
                <p><?= htmlspecialchars($translation['time'], ENT_QUOTES)?></p>
                <strong id="localTime">00.00<script src="JS/time.js"></script></strong>
            </div>
            <div style="display: flex; align-items: center; text-shadow: 0px 10px 8px rgb(87, 87, 87); gap: 5px;">
                <p><?= htmlspecialchars($translation['weather'], ENT_QUOTES)?></p>
                <p id="weather"><script src="JS/weather.js"></script></p>
            </div>
        </nav>
        <header>
            <div class="linkBar">
                <a class="discord" href="https://discord.gg/Z7x84hY6" target="_blank">
                    <img src="Images/discord.png" alt="Discord">
                </a>
                <a class="github" href="https://github.com/tymianekk" target="_blank">
                    <img src="Images/github(2).png">
                </a>
                <a class="mail" href="mailto:tymianekk.1@gmail.com" target="_blank">
                    <img src="Images/email.png">
                </a>
            </div>
            <div class="nickname">
                <h1>tymianekk</h1>
                <div id="discord-status">Loading...</div><script src="JS/discord.js"></script>
            </div>
            <p><?= htmlspecialchars($translation['desc'], ENT_QUOTES) ?></p>
            <div class="languages">
                <img src="Images/html.png">
                <img src="Images/css.png">
                <img src="Images/js.png">
                <img src="Images/php.png">
                <img src="Images/python.png">
                <img src="Images/c.png">
                <img src="Images/cpp.png">
            </div>
            <div class="workplace">
                <div class="windowInfo">
                    <div class="button1" id="button"></div>
                    <div class="button2" id="button"></div>
                    <div class="button3" id="button"></div>
                </div>
                <div id="typewriter">
                    <script src="JS/codeshowcase.js"></script>
                </div>
            </div>
        </header>
        <section>
            <div class="terminal">
~$ whoami <br>
<?= $translation['whoami']?>
                        </div>
            <div class="terminal">
~$ myfutureplans <br>
<?= $translation['myfutureplans'] ?>
            </div>
            <div class="terminal">
~$ myprogrammingjourney<br>
<?= $translation['myprogrammingjourney'] ?>
            </div>
            <div class="terminal">
~$ tools<br>
<?= $translation['tools'] ?>
            </div>
            <div class="terminal" id="discord-div">
~$ discord
<script src="JS/discord2.js"></script>
<div id="game-div">
    <div class="image-status">
        <img src="Images/discord-prof.jpg" style="border-radius: 32px;">
        <div id="status-mini-icon"><div id="status-mini-icon-2"></div></div>
    </div>
    <div class="status-div">
        <strong>tymianekk_</strong>
        <p id="status"></p>
        <p id="game"></p>
        <strong id="game-time"></strong>
    </div>
</div>
            </div>
            <div class="terminal">
~$ changelog <br>
<?= $translation['changelog'] ?>
            </div>
            <div class="terminal" id="github-terminal">            
~$ github-stats <br>
<img src="https://github-readme-stats.vercel.app/api?username=tymianekk&show_icons=true&theme=dark" alt="GitHub stats" width="300px"/>
            </div>
            <div class="terminal" id="github-terminal">
~$ github-most-used-languages <br>
<img src="https://github-readme-stats.vercel.app/api/top-langs/?username=tymianekk&layout=compact&theme=dark" alt="Top Langs" width="300px"/>
            </div>
        </section>
        <footer id="footer">@tymianekk 2025. Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik"> Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> <a href="https://www.flaticon.com/free-icons/usa" title="usa icons">Usa icons created by GeekClick - Flaticon</a><a href="https://www.flaticon.com/free-icons/sky" title="sky icons">Sky icons created by kosonicon - Flaticon</a> Icons made by <a href="https://www.flaticon.com/authors/royyan-wijaya" title="Royyan Wijaya"> Royyan Wijaya </a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com'</a><a href="https://www.flaticon.com/free-icons/rainy-night" title="rainy night icons">Rainy night icons created by Rahul Kaklotar - Flaticon</a> Icons made by <a href="https://www.flaticon.com/authors/slidicon" title="Slidicon"> Slidicon </a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com'</a><a href="https://www.flaticon.com/free-icons/snow" title="snow icons">Snow icons created by pancaza - Flaticon</a></footer>
    <canvas id="codedrop"></canvas>
    <script src="JS/background.js"></script>
</body>
</html>
