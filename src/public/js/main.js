let links = {
    facebook:   'https://www.facebook.com/pg/shahriar-farzam-669498900072024/photos/?ref=page_internal',
    google:     'https://scholar.google.com/citations?user=ztLYBJgAAAAJ&hl=en',
    twitter:    'https://twitter.com/Shahriar1983',
    linkedin:   'https://www.linkedin.com/in/shahriar-farzam',
    instagram:  'https://www.instagram.com/shahriar.farzam/',
    github:     'https://github.com/shfarzam',
    //skype:      'https://join.skype.com/invite/pW1wAhaDK6hq'
    skype:      'skype:sh.farzam@hotmail.com?chat'
    };

$(window).on('load',function () {
    var anchors = document.querySelectorAll('a');
    Array.prototype.forEach.call(anchors, function (element, index) {
        if(links.hasOwnProperty(element.id)) {
            element.href = links[element.id];
        }

    });
});

$(document).ready(function(){
    var latitude;
    var longitude;
    var openWeatherMap = 'http://api.openweathermap.org/data/2.5/weather';

    $.get("https://api.ipdata.co?api-key=test", function (response) {
        latitude  = response.latitude;
        longitude = response.longitude;
        $('#city').html(response.city + ", " + response.region);
        //$("#toast-text").html(JSON.stringify(response, null, 4));
    }, "jsonp").done(function (){

    $.getJSON(openWeatherMap, {
        lat: latitude,
        lon: longitude,
        units: 'metric',
        appid: '88c7fb4c2f6f2c1e987a0acc4eab5bc5'
    }).done(function(weather) {
        //$('#toast-text').append(weather.main.temp);
        $('#temp').html('Temp: <b>'+Math.round(weather.main.temp)+'</b>');
        $('#temp-feels').html('Feels Like: <b>'+Math.round(weather.main.feels_like)+'</b>');
        $('#temp-max').html('Max Temp: <b>'+Math.round(weather.main.temp_max)+'</b>');
        $('#temp-min').html('Min Temp: <b>'+Math.round(weather.main.temp_min)+'</b>');
        $('#weather').html('Weather: <b>'+weather.weather[0].description+'</b>');
        console.log(weather);
    });
    });

    $('.toast').toast('show');
});