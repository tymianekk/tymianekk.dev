async function getDiscordStatus() {
    const userId = "1085437666692182047";

    try {
        const res = await fetch(`https://api.lanyard.rest/v1/users/${userId}`);
        const data = await res.json();

        const statusElement = document.getElementById("discord-status");

        if (data.success) {
            const rawStatus = data.data.discord_status;
            const customStatusObj = data.data.activities.find(act => act.type === 4);
            const customStatus = customStatusObj?.state; // <- wyciągamy sam tekst statusu

            const readableStatus = statusMap[currentLang][rawStatus] || "Nieznany";
            const statusClass = statusClasses[rawStatus] || "status-offline";

            statusElement.classList.remove("status-online", "status-idle", "status-dnd", "status-offline", "loading");
            statusElement.classList.add(statusClass);

            // jeśli jest customowy status, dodaj po dwukropku
            statusElement.innerHTML = customStatus
                ? `${readableStatus} ~ ${customStatus}`
                : `${readableStatus}`;
        } else {
            statusElement.innerHTML = `
                <div class="discord-logo">⚠️</div>
                Failed to fetch status
            `;
            statusElement.classList.remove("loading");
            statusElement.classList.add("status-offline");
        }
    } catch (error) {
        const statusElement = document.getElementById("discord-status");
        statusElement.innerHTML = `
            <div class="discord-logo">❌</div>
            Network error
        `;
        statusElement.classList.remove("loading");
        statusElement.classList.add("status-offline");
    }
}