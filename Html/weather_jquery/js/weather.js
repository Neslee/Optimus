// Author : Neslee Canil Pinto
// Date : 13/08/2018

var city;
$(document).ready(function () {

    city =$(".inner-menu li.active").attr('id');
    weather();

    $('li').click(function(){
        $(this).children('ul').stop().slideToggle(400);
    });
    
    $(".inner-menu li").click(function() {
        city = this.id;
        weather();
        $('#city_name').html(city);
    });

    $('#city_name').html(city);


  function weather(){ 
    $.get("https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22"+city+"%2C%20In%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys", function(data, status){

            var day_array = data.query.results.channel.item.forecast;  

            var today = new Date(); 
            var currenthour = today.getHours(); 
            if (currenthour < 12) {  
                $('#greetings').html('GOOD MORNING');
            } else if (currenthour < 16) { 
                $('#greetings').html('GOOD AFTERNOON'); 
            } else if (currenthour < 20) { 
                $('#greetings').html('GOOD EVENING'); 
            } else {
                $('#greetings').html('GOOD NIGHT');
            }

            for (var i = 0; i <= 6; i++) {  

                if (day_array[i].day == 'Mon') {   
                    days = "MONDAY";
                } else if (day_array[i].day == 'Tue') {  
                    days = "TUESDAY";
                } else if (day_array[i].day == 'Wed') { 
                    days = "WEDNESDAY";
                } else if (day_array[i].day == 'Thu') {    
                    days = "THURSDAY";
                } else if (day_array[i].day == 'Fri') {   
                    days = "FRIDAY";
                } else if (day_array[i].day == 'Sat') {  
                    days = "SATURDAY";
                } else if (day_array[i].day == 'Sun') {    
                    days = "SUNDAY";
                }

                $('#week-day'+i).html(days);  


                $('#weather-image'+i).css({"position" : "absolute","width":"150px","height":"110px"});    

                if (day_array[i].text == "Mostly Cloudy") {  
                    $('#weather-image'+i).css({"background":"url('images/weather-icons.jpg') 35% 12%"}); 
                } 
                else if (day_array[i].text == "Sunny") {     
                    $('#weather-image'+i).css({"background":"url('images/weather-icons.jpg') 10% 0%"}); 
                } 
                else if (day_array[i].text == "Mostly Sunny") {   
                    $('#weather-image'+i).css({"background":"url('images/weather-icons.jpg') 94% 5%"}); 
                } 
                else if (day_array[i].text == "Breezy") {    
                    $('#weather-image'+i).css({"background":"url('images/weather-icons.jpg') 65% 50%"}); 
                } 
                else if (day_array[i].text == "Partly Cloudy") {  
                    $('#weather-image'+i).css({"background":"url('images/weather-icons.jpg') 5% 50%"}); 
                } 
                else if (day_array[i].text == "Cloudy") {    
                    $('#weather-image'+i).css({"background":"url('images/weather-icons.jpg') 65% 12%"}); 
                } 
                else if (day_array[i].text == "Rain") {    
                    $('#weather-image'+i).css({"background":"url('images/weather-icons.jpg') 7% 88%"}); 
                } 
                else if (day_array[i].text == "Scattered Thunderstorms") {  
                    $('#weather-image'+i).css({"background":"url('images/weather-icons.jpg') 64% 88%"}); 
                } 
                else if (day_array[i].text == "Scattered Showers") {    
                    $('#weather-image'+i).css({"background":"url('images/weather-icons.jpg') 7% 89%"}); 
                }
                else if (day_array[i].text == "Thunderstorms") {   
                    $('#weather-image'+i).css({"background":"url('images/weather-icons.jpg') 64% 88%"}); 
                }


                var max_temp = day_array[i].high;  
                var min_temp = day_array[i].low;   
                max_temperature = (max_temp - 32) / 1.8;    
                max_temp = max_temperature.toFixed(0);
                min_temperature = (min_temp - 32) / 1.8;   
                min_temp = min_temperature.toFixed(0);
                $('#day' + i + '_high_temperature').html(max_temp + '&deg'); 
                $('#day' + i + '_low_temperature').html(min_temp + '&deg'); 
    }
});
}
});

