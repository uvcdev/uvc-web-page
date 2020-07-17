(function(exports) {
    "use strict";

    function initMap() {
      var myLatLng = {
        lat: 37.392221,
        lng: 126.958915
      };
      var map = new google.maps.Map(document.getElementById("googleMap"), {
        zoom: 16,
        center: myLatLng
      });
      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: "(주)유비씨"
      });
    }

    exports.initMap = initMap;
  })((this.window = this.window || {}));