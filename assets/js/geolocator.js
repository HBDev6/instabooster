// alert('geolocator loaded');
$('#locationInput').val('location input by geolocator');
if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(showPosition);
}else{
    alert('geolocator is not able to work on your web browser');
}

function showPosition(position){
    url = 'https://api.opencagedata.com/geocode/v1/json?q='+position.coords.latitude+','+position.coords.longitude+'&key=1578cb74fcfb44ca940875e1d78d4f92&language=fr&pretty=1'

    $.get(url, {}, function(data){
        console.log(data.results[0]);
        $('#locationInput').val(data.results[0].formatted);
    })

}