window.initMap = function() {
    var myLatLng = {lat: -25.363, lng: 131.044};

    console.log(document.getElementById('map'));
    console.log($('#map'));

    var map = new google.maps.Map($('#map'), {
        zoom: 4,
        center: myLatLng
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Hello World!'
    });
}
