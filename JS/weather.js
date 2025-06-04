const apiKey = "//API key";  
const miasto = "Krasnik,PL";
const url = `https://api.openweathermap.org/data/2.5/weather?q=${miasto}&appid=${apiKey}&units=metric&lang=pl`;

fetch(url)
  .then(response => response.json())
  .then(data => {
    const temp = data.main.temp;
    const description = data.weather[0].description;
    const icon = data.weather[0].icon;
    const iconUrl = `https://openweathermap.org/img/wn/${icon}@2x.png`;

    document.getElementById("weather").innerHTML = `
       <strong>${temp}°C</strong><img width="15px" src="${iconUrl}" alt="${description}">
    `;
  })
  .catch(error => {
    console.error(error);
    document.getElementById("weather").textContent = "";
  }
);
