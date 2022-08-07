<template>
    <div class="position-absolute w-100 h-100 top-0 start-0 bottom-0 end-0">
        <GmapMap
        :options="{
   zoomControl: true,
   mapTypeControl: false,
   scaleControl: false,
   streetViewControl: false,
   rotateControl: false,
   fullscreenControl: true,
   disableDefaultUi: false
 }"
            class="w-100 h-100"
            :center="{ lat: 10.4833584, lng: 123.3998655 }"
            :zoom="14"
        >
            <GmapMarker
                :position="{ lat: parseFloat(MyLocation.lat), lng: parseFloat(MyLocation.lng) }"
                :clickable="true"
                :draggable="true"
            />

            <GmapInfoWindow
                :key="index"
                v-for="(m, index) in markers"
                :position="m"
                @click="center = m"
            >
                <a class="text-center" @click="visitStore(m.store_name, index,[m.lat,m.lng])"
                    ><i class="fas fa-coffee"></i> {{ m.store_name }}<br />
                   <center>
                    {{
                     parseInt(google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(parseFloat(MyLocation.lat), parseFloat(MyLocation.lng)), new google.maps.LatLng(m.lat, m.lng)))
                    }}m
                    </center>
                    </a>
            </GmapInfoWindow>
        </GmapMap>
    </div>
</template>

<script>
import Swal from 'sweetalert2'
import { gmapApi } from "vue2-google-maps";
import Vue from 'vue'
import * as VueGoogleMaps from "vue2-google-maps";
 Vue.use(VueGoogleMaps, {
            load: {
                key: "AIzaSyDGe5vjL8wBmilLzoJ0jNIwe9SAuH2xS_0",
                libraries: "geometry",
            },
        });
export default {
    computed: {
        google: gmapApi,
    },

    data() {
        return {
            MyLocation: {
                lat: null,
                lng: null,
            },
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
                this.MyLocation.lat = position.coords.latitude;
                this.MyLocation.lng = position.coords.longitude;
            }); 
         }
             axios.post("/get_all_users")
            .then((res) => {
                this.markers = res.data.status;
                console.log(res.data.status)
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
