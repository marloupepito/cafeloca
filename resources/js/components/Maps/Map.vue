<template>
    <div class="position-absolute w-100 h-100 top-0 start-0 bottom-0 end-0">
        <GmapMap
            class="w-100 h-100"
            :center="{ lat: 10.4833584, lng: 123.3998655 }"
            :zoom="14"
        >
            <GmapMarker
                 v-for="(m, i) in MyLocation"
                :key="i[0]"
                :position="m.position"
                :clickable="true"
                :draggable="true"
            />

            <GmapInfoWindow
                v-for="(m, index) in markers"
                :key="index"
                :position="m"
            >
               
            </GmapInfoWindow>
        </GmapMap>
    </div>
</template>

<script>
import Swal from 'sweetalert2'
import { gmapApi } from "vue2-google-maps";
export default {
    computed: {
        google: gmapApi,
    },

    data() {
        return {
            MyLocation:  [{
                position: {
                lat: 0.0,
                lng: 0.1
                }
            }],
            markers: [],
        };
    },
    methods: {
        visitStore(name, id, ll) {
           
              if (navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition((position) => {
                      var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(position.coords.latitude, position.coords.longitude), new google.maps.LatLng(parseFloat(ll[0]), parseFloat(ll[1])));
                        Swal.fire({
                          imageUrl: 'https://unsplash.it/400/200',
                          imageWidth: 400,
                          imageHeight: 200,
                          imageAlt: 'Custom image',
                          title: name,
                          confirmButtonText:'VISIT',
                          text: 'Meters:'+' '+parseInt(distance),
                          preConfirm: (e) => {
                               this.$router.push({ path: "/store/" + name.replace(/ /g, "-") });
                          }
                        }) 
                  });
              }
        },
    },
    mounted: function () {
      
        if (navigator.geolocation) {
            const meter = navigator.geolocation.getCurrentPosition((position) => {
                this.MyLocation[0].position.lat = position.coords.latitude;
                this.MyLocation[0].position.lng = position.coords.longitude;
           }); 
         }
             axios.post("/get_all_users")
            .then((res) => {
                this.markers = res.data.status;
            })
            .catch((err) => {});
        }
};
</script>

<style>
button.gm-ui-hover-effect {
    display: none !important;
}
</style>
