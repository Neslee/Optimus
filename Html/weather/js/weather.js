// Author : Neslee Canil Pinto
// Date : 13/08/2018

function load_page() {
    var obj;   // Create object obj to store JSON Data
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            obj = JSON.parse(this.responseText);  // Convert String to Object Format
            var day_array = obj.query.results.channel.item.forecast;  // Assign Forecast data to variable day_array

            var today = new Date(); // Create var today to store date value
            var currenthour = today.getHours(); // Assign hours to currenthour
            if (currenthour < 12) {   // Check if currenthour is less than 12
               document.getElementById('greetings').innerHTML="GOOD MORNING";
            } else if (currenthour < 16) {  // Check if currenthour is less than 18
                document.getElementById('greetings').innerHTML="GOOD AFTERNOON";
            } else {  // Check if currenthour is greater than 18
                document.getElementById('greetings').innerHTML="GOOD EVENING";
            }

            for (var i = 0; i <= 6; i++) {  

                if (day_array[i].day == 'Mon') {   // Check if day is Monday
                    days = "MONDAY";
                } else if (day_array[i].day == 'Tue') {   // Check if day is Tuesday
                    days = "TUESDAY";
                } else if (day_array[i].day == 'Wed') {   // Check if day is Wednesday
                    days = "WEDNESDAY";
                } else if (day_array[i].day == 'Thu') {    // Check if day is Thursday
                    days = "THURSDAY";
                } else if (day_array[i].day == 'Fri') {    // Check if day is Friday
                    days = "FRIDAY";
                } else if (day_array[i].day == 'Sat') {     // Check if day is Saturday
                    days = "SATURDAY";
                } else if (day_array[i].day == 'Sun') {      // Check if day is Sunday
                    days = "SUNDAY";
                }
 
                document.getElementById('week-day' + i).innerHTML = days;   // Assign Weekdays Text to week_day of i


                var image = document.getElementById("weather-image" + i);   // Get weather-image of i to image variable
                image.style.position = "absolute";    // Style image to position absolute


                if (day_array[i].text == "Mostly Cloudy") {   // Check if text is Mostly Cloudy
                    image.style.background = "url('images/weather-icons.jpg') 35% 12%";
                    image.style.width = "150px";
                    image.style.height = "110px"; 
                } else if (day_array[i].text == "Sunny") {     // Check if text is Sunny
                    image.style.background = "url('images/weather-icons.jpg') 10% 0";
                    image.style.width = "150px";
                    image.style.height = "110px";
                } else if (day_array[i].text == "Mostly Sunny") {   // Check if text is Mostly Sunny
                    image.style.background = "url('images/weather-icons.jpg') 94% 5%";
                    image.style.width = "150px";
                    image.style.height = "110px";
                } else if (day_array[i].text == "Breezy") {    // Check if text is Breezy
                    image.style.background = "url('images/weather-icons.jpg')  65% 50%";
                    image.style.width = "150px";
                    image.style.height = "110px";
                } else if (day_array[i].text == "Partly Cloudy") {   // Check if text is Partly Cloudy
                    image.style.background = "url('images/weather-icons.jpg') 5% 50%";
                    image.style.width = "150px";
                    image.style.height = "110px";
                } else if (day_array[i].text == "Mostly Cloudy") {   // Check if text is Mostly Cloudy
                    image.style.background = "url('images/weather-icons.jpg') 40% 7%";
                    image.style.width = "150px";
                    image.style.height = "110px";
                } else if (day_array[i].text == "Cloudy") {    // Check if text is Cloudy
                    image.style.background = "url('images/weather-icons.jpg')  65% 12%";
                    image.style.width = "150px";
                    image.style.height = "110px";
                } else if (day_array[i].text == "Rain") {    // Check if text is Rain
                    image.style.background = "url('images/weather-icons.jpg')  5% 95%";
                    image.style.width = "150px";
                    image.style.height = "110px";
                } else if (day_array[i].text == "Scattered Thunderstorms") {   // Check if text is Scattered Thunderstorms
                    image.style.background = "url('images/weather-icons.jpg') 64% 88%";
                    image.style.width = "150px";
                    image.style.height = "110px"; 
                } else if (day_array[i].text == "Scattered Showers") {    // Check if text is Scattered Showers
                    image.style.background = "url('images/weather-icons.jpg') 7% 89%";
                    image.style.width = "150px";
                    image.style.height = "110px";
                }
                else if (day_array[i].text == "Thunderstorms") {   // Check if text is Thunderstorms
                    image.style.background = "url('images/weather-icons.jpg') 64% 88%";
                    image.style.width = "150px";
                    image.style.height = "110px";
                }


                var max_temp = day_array[i].high;   // Assign high temparture to max_temp variable
                var min_temp = day_array[i].low;    // Assign Low temparture to min_temp variable
                max_temperature = (max_temp - 32) / 1.8;    // Convert faranheat to Degree
                max_temp = max_temperature.toFixed(0);
                min_temperature = (min_temp - 32) / 1.8;    // Convert faranheat to Degree
                min_temp = min_temperature.toFixed(0);
                document.getElementById('day' + i + '_high_temperature').innerHTML = max_temp + '&deg';
                document.getElementById('day' + i + '_low_temperature').innerHTML = min_temp + '&deg';
            }
        }
    };
    var city = document.getElementById("selection").value;
    xhttp.open("GET", "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22" + city + "%2C%20in%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys", true);
    xhttp.send();
}

