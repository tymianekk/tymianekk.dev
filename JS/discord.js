let currentLang = "en"; 

const statusMap = {
    en: {
        online: "Online",
        idle: "Idle",
        dnd: "Do not disturb",
        offline: "Offline"
    },
    pl: {
        online: "Dostępny",
        idle: "Zaraz wracam",
        dnd: "Nie przeszkadzać",
        offline: "Niedostępny"
    }
};

const statusClasses = {
    online: "status-online",
    idle: "status-idle",
    dnd: "status-dnd",
    offline: "status-offline"
};

function dcStatusLang() {
    currentLang = currentLang === "en" ? "pl" : "en";
    getDiscordStatus();
}

async function getDiscordStatus() {
  const userId = "1085437666692182047"; 

  const isMobile = /Mobi|Android|iPhone|iPad|iPod/i.test(navigator.userAgent);
  
  try {
    const res = await fetch(`https://api.lanyard.rest/v1/users/${userId}`);
    const data = await res.json();

    const statusElement = document.getElementById("discord-status");

    if (data.success) {
      const rawStatus = data.data.discord_status;
      const customStatus = data.data.activities.find(act => act.type === 4);
      const readableStatus = statusMap[currentLang][rawStatus] || "Nieznany";
      const statusClass = statusClasses[rawStatus] || "status-offline";

      let displayText = readableStatus;

      if (isMobile && customStatus?.state) {
        const emoji = customStatus.emoji?.name || "";
        displayText = `${emoji} ${customStatus.state}`;
      } else if (!isMobile && customStatus?.state) {
        const emoji = customStatus.emoji?.name || "";
        displayText = `${readableStatus} ~${emoji}${customStatus.state}`;
      }

      statusElement.className = "";
      statusElement.classList.add(statusClass);
      statusElement.innerHTML = displayText;
    } else {
      statusElement.innerHTML = `
        <div class="discord-logo">⚠️</div>
        Failed to fetch status
      `;
      statusElement.className = "status-offline";
    }
  } catch (error) {
    const statusElement = document.getElementById("discord-status");
    statusElement.innerHTML = `
      <div class="discord-logo">❌</div>
      Network error
    `;
    statusElement.className = "status-offline";
  }
}

getDiscordStatus();
setInterval(getDiscordStatus, 60000); 