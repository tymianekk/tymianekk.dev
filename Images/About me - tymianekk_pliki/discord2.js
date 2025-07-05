let jezykAktualny = "en";
let startCzasuGry = null;
let interwalCzasu = null;

const mapaStatusow = {
    en: {
        online: "Online",
        idle: "Idle",
        dnd: "Do not disturb",
        offline: "Offline",
        gameLabel: "In game",
        noGame: "Not playing anything."
    },
    pl: {
        online: "Dostępny",
        idle: "Zaraz wracam",
        dnd: "Nie przeszkadzać",
        offline: "Niedostępny",
        gameLabel: "W grze",
        noGame: "Nie grasz w nic."
    }
};

function przelaczJezykDC() {
    jezykAktualny = jezykAktualny === "en" ? "pl" : "en";
    pobierzStatusDiscord();
}

function formatujCzas(msStart) {
    const teraz = Date.now();
    const roznica = Math.floor((teraz - msStart) / 1000); 

    const godziny = Math.floor(roznica / 3600);
    const minuty = Math.floor((roznica % 3600) / 60);
    const sekundy = roznica % 60;

    return [
        godziny.toString().padStart(2, '0'),
        minuty.toString().padStart(2, '0'),
        sekundy.toString().padStart(2, '0')
    ].join(':');
}

function odliczajCzasGry() {
    if (startCzasuGry) {
        const czasGry = document.getElementById("game-time");
        czasGry.textContent = formatujCzas(startCzasuGry);
    }
}

function ustawLiveTimer(start) {
    clearInterval(interwalCzasu); 
    startCzasuGry = start;
    if (startCzasuGry) {
        interwalCzasu = setInterval(odliczajCzasGry, 1000);
    }
}

async function pobierzStatusDiscord() {
    const idUzytkownika = "1085437666692182047";

    try {
        const odpowiedz = await fetch(`https://api.lanyard.rest/v1/users/${idUzytkownika}`);
        const dane = await odpowiedz.json();

        const elementStatusu = document.getElementById("status");
        const elementGry = document.getElementById("game");
        const czasGry = document.getElementById("game-time");
        const kropkaStatusu = document.getElementById("status-mini-icon");
        const kropkaStatusu2 = document.getElementById("status-mini-icon-2");

        if (dane.success) {
            const surowyStatus = dane.data.discord_status;
            const statusCzytelny = mapaStatusow[jezykAktualny][surowyStatus] || "Nieznany";
            

            if (surowyStatus === "online") {
                kropkaStatusu.style.backgroundColor = "rgb(54, 144, 70)";
            } else if (surowyStatus === "offline") {
                kropkaStatusu.style.backgroundColor = "rgb(107, 109, 118)";
                kropkaStatusu.style.display = "grid";
                kropkaStatusu.style.placeItems = "center";
                kropkaStatusu2.style.height = "8px";
                kropkaStatusu2.style.width = "8px";
                kropkaStatusu2.style.borderRadius = "4px";
                kropkaStatusu2.style.backgroundColor = "#2c2f33";
            } else if (surowyStatus === "dnd") {
                kropkaStatusu.style.backgroundColor = "rgb(200, 34, 50)";
                kropkaStatusu.style.display = "grid";
                kropkaStatusu.style.placeItems = "center";
                kropkaStatusu2.style.height = "4px";
                kropkaStatusu2.style.width = "10px";
                kropkaStatusu2.style.backgroundColor = "#2c2f33";
            } else if (surowyStatus === "idle") {
                kropkaStatusu.style.backgroundColor = "rgb(189, 132, 67)";
                kropkaStatusu.style.display = "grid";
                kropkaStatusu.style.placeItems = "center";
                kropkaStatusu2.style.position = "absolute";
                kropkaStatusu2.style.top = "0";
                kropkaStatusu2.style.left = "0";
                kropkaStatusu2.style.height = "10px";
                kropkaStatusu2.style.width = "10px";
                kropkaStatusu2.style.borderRadius = "5px";
                kropkaStatusu2.style.backgroundColor = "#2c2f33";
            } 
            

            const aktywnosc = dane.data.activities.find(a => a.type === 0);
            if (aktywnosc) {
                const nazwaGry = aktywnosc.name;
                const etykietkaGry = mapaStatusow[jezykAktualny].gameLabel;
                elementGry.textContent = `${etykietkaGry} ${nazwaGry}`;


                if (aktywnosc.timestamps && aktywnosc.timestamps.start) {
                    startCzasuGry = aktywnosc.timestamps.start;
                    czasGry.style.display = "block";
                    ustawLiveTimer(startCzasuGry);
                } else {
                    czasGry.style.display = "none";
                    clearInterval(interwalCzasu);
                }

            } else {
                elementStatusu.textContent = `${statusCzytelny}`;
                czasGry.style.display = "none";
                clearInterval(interwalCzasu);
            }

        } else {
            elementStatusu.textContent = "Nie udało się pobrać statusu ⚠️";
            elementGry.textContent = "";
            czasGry.style.display = "none";
            clearInterval(interwalCzasu);
        }

    } catch (blad) {
        document.getElementById("status").textContent = "Błąd sieci ❌";
        document.getElementById("game").textContent = "";
        document.getElementById("game-time").style.display = "none";
        clearInterval(interwalCzasu);
    }
}

pobierzStatusDiscord();
setInterval(pobierzStatusDiscord, 60000); 