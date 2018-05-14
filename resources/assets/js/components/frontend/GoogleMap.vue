<template>
    <div class="google-map" :id="mapName">
        <slot></slot>
    </div>
</template>

<script>
    function initMap(){
        console.log('google maps api loaded.')
    }
    export default {
        props: [
            'name',
            'latitude',
            'longitude',
            'zoom'
        ],

        data: function () {
            return {
                mapName: this.name + "-map",
                markers: [],
                pins: []
            }
        },

        // created() {
        //     var googleMapsApi = document.createElement('script');
        //     googleMapsApi.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCRXeRhZCIYcKhtc-rfHCejAJsEW9rYtt4&callback=initMap';
        //     document.getElementsByTagName('head')[0].appendChild(googleMapsApi);
        // },

        mounted: function () {
            const element = document.getElementById(this.mapName);
            const options = {
                zoom: this.zoom,
                center: new google.maps.LatLng(this.latitude,this.longitude),
                disableDefaultUI: true,
                zoomControl: true,
                scaleControl: true
            };
            const map = new google.maps.Map(element, options);
            const bounds = new google.maps.LatLngBounds();
            this.markers = this.$children;

            for(var i = 0; i < this.markers.length; i++){
                var pin = this.markers[i];
                this.pins.push({
                    latitude: pin._data.markerCoordinates.latitude,
                    longitude: pin._data.markerCoordinates.longitude,
                });

                const position = new google.maps.LatLng(pin.latitude, pin.longitude);
                const marker = new google.maps.Marker({
                    position,
                    map,
                    // icon: '/wp-content/themes/kma-slim/img/map-pin.png'
                });

                const infowindow = new google.maps.InfoWindow({
                    maxWidth: 279,
                    content: pin.$refs.infowindow,
                    title: pin._data.name
                });

                marker.addListener('click', function(){
                    infowindow.open(map, marker);
                });

                bounds.extend(position);
                map.fitBounds(bounds);

            }
        },

    }
</script>