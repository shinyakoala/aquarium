var map;
var map = null;

$(function(){
	mapset(35.090622,136.878141,14);
    google.maps.event.addListener(map,"click",function(event){
        result = event;
        map.setCenter(new google.maps.LatLng(event.latLng.lat(),event.latLng.lng()));
        creaetMarker();
        page = 1;
        makeQuery();
    });
});

function mapset(lat,lng,zoom){
    var latlng = new google.maps.LatLng(lat,lng);
    var opt = {
        zoom: zoom,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map($("#map")[0],opt);
}

function creaetMarker(){
    var lat = result.latLng.lat();
    var lng = result.latLng.lng();
    if(begin){
        begin = false;
    }else{
        marker.setMap(null);
    }
    marker = new google.maps.Marker();
    marker.setPosition(new google.maps.LatLng(lat,lng));
    marker.setMap(map);
    
}

