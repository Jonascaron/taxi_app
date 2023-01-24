const NAAM_SPAN = document.getElementById('span_plaats');
const TEMP_SPAN = document.getElementById('span_temp');
const WEER_SPAN = document.getElementById('span_weer');
const OPHAAL_SPAN = document.getElementById('span_ophaal');
const ZOEK_VELD = document.getElementById('zoek_veld');
const ZOEK_KNOP = document.getElementById('zoek_knop');
const RESULTAAT = document.getElementById('resultaat');

const URL = "https://geocoding-api.open-meteo.com/v1/search?name=";
const URL2 = 'https://api.open-meteo.com/v1/forecast?current_weather=true';

ZOEK_KNOP.addEventListener('click',function(){
  console.log(ZOEK_VELD.value)
  fetch(URL + ZOEK_VELD.value)
  .then(andwoord=>andwoord.json())
  .then(resultaat=>{
    console.log(resultaat.results);
    
    for (let i = 0; i < resultaat.results.length; i++) {
      console.log(resultaat.results[i]);

      let gevondenresultaat = document.createElement('p');
      gevondenresultaat.innerText = resultaat.results[i].name;
      gevondenresultaat.onclick = krijgtemp;
      gevondenresultaat.setAttribute('data-longitude', resultaat.results[i].longitude);
      gevondenresultaat.setAttribute('data-latitude', resultaat.results[i].latitude);
      gevondenresultaat.setAttribute('name', resultaat.results[i].name);
      RESULTAAT.appendChild(gevondenresultaat);
    }
    
  })
})

function krijgtemp(clickEvent){
  console.log(clickEvent.target);
  let geselecteerd=clickEvent.target;
  console.log(geselecteerd.getAttribute('data-longitude'))
  console.log(geselecteerd.getAttribute('data-latitude'))
  console.log(geselecteerd.getAttribute('name'))
  cordinaten.longitude = geselecteerd.getAttribute('data-longitude')
  cordinaten.latitude = geselecteerd.getAttribute('data-latitude')
  cordinaten.name = geselecteerd.getAttribute('name')
  update();
}

let cordinaten= {
  latitude: 52.41,
  longitude: 4.68,
  name: 'haarlem'
}


function update(){
fetch(URL2 + "&latitude="+cordinaten.latitude+"&longitude=" + cordinaten.longitude)
  .then((response) => response.json())
  .then((data) => {
    console.log(data.current_weather)
    console.log(data)

    const CODE_BESCHRIJVING = {
      0:  "Clear sky",
      1:  "Mainly clear",
      2:  "partly cloudy",
      3:  "overcast",
      45: "Fog",
      48: "depositing rime fog",
      51: "Drizzle Light",
      53: "Drizzle moderate",
      55: "Drizzle dense intensity",
      56: "Freezing Drizzle Light",
      57: "Freezing Drizzle dense intensity",
      61: "Rain Slight",
      63: "Rain moderate",
      65: "Rain heavy intensity",
      66: "Freezing Rain Light",
      67: "Freezing Rain heavy intensity",
      71: "Snow fall Slight",
      73: "Snow fall moderate",
      75: "Snow fall heavy intensity",
      77: "Snow grains",
      80: "Rain showers Slight",
      81: "Rain showers moderate",
      82: "Rain showers violent",
      85: "Snow showers slight",
      86: "Snow showers heavy",
      95: "Thunderstorm Slight or moderate",
      96: "Thunderstorm with slight hail",
      99: "Thunderstorm with heavy hail",
    }

    NAAM_SPAN.innerText = cordinaten.name
    TEMP_SPAN.innerText = data.current_weather.temperature
    WEER_SPAN.innerText = CODE_BESCHRIJVING[data.current_weather.weathercode]
    OPHAAL_SPAN.innerText = data.current_weather.time 
});
}

update();