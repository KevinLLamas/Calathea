<style>
.google-map{
    height:100%;
    margin-bottom: -8px;
}

.google-map iframe{
    width:100%;
    border:0;
    filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale"); /* Firefox 10+ */
    -webkit-filter: grayscale(99%); /* Chrome 19+ & Safari 6+ */
    -webkit-backface-visibility: hidden;  /* Fix for transition flickering */
} 
#map {
    height: 400px;  /* The height is 400 pixels */
    width: 100%;  /* The width is the width of the web page */
}
</style>
<div id="map"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMOg75K24AhWgbuKKzFQ47q4kuWwufzGI&callback=initMap&signed_in=true" async defer></script>
    <script>
    function initMap() {
      // The location of Uluru
      var uluru = {lat: 19.512230, lng: -99.268843 };
      // The map, centered at Uluru 
      var map = new google.maps.Map(
          document.getElementById('map'), {zoom: 18, center: uluru});
      // The marker, positioned at Uluru
      var marker = new google.maps.Marker({position: uluru, map: map});
    }
</script>