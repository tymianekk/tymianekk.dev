const statusElement = document.getElementById("discord-status-map");
const statusMap = {
  online: statusElement.dataset.online,
  idle: statusElement.dataset.idle,
  dnd: statusElement.dataset.dnd,
  offline: statusElement.dataset.offline
};

const statusClasses = {
    online: "status-online",
    idle: "status-idle",
    dnd: "status-dnd",
    offline: "status-offline"
};

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
      const readableStatus = statusMap[rawStatus] || "Nieznany";
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