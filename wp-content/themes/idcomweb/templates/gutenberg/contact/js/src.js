function idcomMapForm() {
    
    /**
     * Leaflet map
     */
    
    var $ = jQuery.noConflict();
    
    if($('#my-map').length){
                
        var timeOutMap = setTimeout(function(){
                
            var cities = L.layerGroup();

            L.marker([$('.mapCtn').attr('data-lat'), $('.mapCtn').attr('data-lng')]).bindPopup($('.mapCtn').attr('data-name')).addTo(cities);

            var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, '+
                'Imagery © <a href="https://www.groupe-idcom.fr/" target="_blank" rel="noopener">Groupe IDCOM</a>',
                mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

            var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
                    maxZoom: 20,
                    subdomains:['mt0','mt1','mt2','mt3']
                });

            var map = L.map('my-map', {
                center: [$('.mapCtn').attr('data-lat'), $('.mapCtn').attr('data-lng')],
                zoom:   10,
                layers: [googleStreets,cities]
            });

            var overlays = {
                "Cities": cities
            };

        },400);
        
    }
    
}