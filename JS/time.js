function showLocalTime() {
  const now = new Date();
  const timeInPoland = now.toLocaleTimeString("pl-PL", {
    timeZone: "Europe/Warsaw",
    hour: "2-digit",
    minute: "2-digit",
    second: "2-digit"
  });
  
  document.getElementById("localTime").textContent = timeInPoland;
}

showLocalTime();
setInterval(showLocalTime, 1000);