<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="title">About me - tymianekk</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="icon" type="image/png" href="Images/web-programming.png"/>
    <style>
        .content {
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-style: normal;
        }
    </style>
</head>
<body>
    <div class="content">
        <script src="JS/translator.js" defer></script>
        <nav>
            <a onclick=changeLang() id="image"><img src="Images/pl.png"></a>
            <script>
                function changeLang() {
                    toggleLanguage();
                    dcStatusLang();
                    przelaczJezykDC();
                }
            </script>
            <div style="display: flex; align-items: center; text-shadow: 0px 10px 8px rgb(87, 87, 87); gap: 5px;">
                <p id="time">Time in my country: </p>
                <strong id="localTime">00.00<script src="JS/time.js"></script></strong>
            </div>
            <div style="display: flex; align-items: center; text-shadow: 0px 10px 8px rgb(87, 87, 87); gap: 5px;">
                <p id="weatherInfo">Weather in my city (Kraśnik, PL): </p>
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
            <p id="desc">A passionate programmer and front-end web developer from Poland</p>
            <div class="languages">
                <img src="Images/html.png">
                <img src="Images/css.png">
                <img src="Images/js.png">
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
            <div class="terminal" id="whoami">
~$ whoami <br>
I'm a Polish teenager with a passion for programming. I create websites and simple programs mostly for fun. I also really enjoy math and learning foreign languages. I speak Polish, English, and Spanish.
                        </div>
            <div class="terminal" id="myfutureplans">
~$ myfutureplans <br>
For now, I mostly code for fun, but I plan to learn C++ really well so I can create more powerful and advanced projects.

I also want to learn some back-end web development.
            </div>
            <div class="terminal" id="myprogrammingjourney">
~$ myprogrammingjourney<br>
<strong>March 2023</strong> - First attempt at programming (Python), but I didn’t learn much.<br>
<strong>November 2024</strong>  - Came back to programming and gave it a second chance (front-end web development)<br>
<strong>February 2025</strong> - Started learning C and returned to Python<br>
<strong>April 2025</strong> - Began learning C++
            </div>
            <div class="terminal" id="tools">
~$ tools<br>
<strong>Devices: </strong>Mac Mini M1, Raspberry PI 5

<strong>OS: </strong>MacOS 15 Sequoia, Raspberry PI OS (Raspbian)

<strong>Code editor: </strong>Visual Studio Code
            </div>
            <div class="terminal" id="projects">
~$ projects <br>
<a href="https://github.com/tymianekk/Terminal-Cat-" target="_blank">Cat simulator in the terminal</a> - C++

<a href="https://github.com/tymianekk/Geometry-calculator" target="_blank">Geometry calculator</a> - C++

<a href="https://about-tymianekk.netlify.app" target="_blank">This page</a> - HTML, CSS, JS
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
            <div class="terminal" id="info">
~$ info <br>
Domain coming soon!<br>
Version 2.6<br>
Thanks <a href="https://kotokk.dev" target="_blank">@kotokk_dev</a> for telling me what to change.
            </div>
            <div class="terminal" id="changelog">
~$ changelog <br>
<strong>Last update: </strong>14.07.2025<br>
<strong>Version 2.6</strong><br>
Added GitHub stats and most used languages
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
