var Contact = function () {

    return {
        
        //Map
        initMap: function () {
			var map;
			$(document).ready(function(){
			  map = new GMaps({
				div: '#map',
				lat: 43.92955,
				lng: -79.40918,
			  });
			   var marker = map.addMarker({
		            lat: 43.92955,
					lng: -79.40918,
		            title: 'Loop, Inc.'
		        });
			});
        }

    };
}();
