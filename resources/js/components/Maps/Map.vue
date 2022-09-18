<template>
    <div  style="height:100vh">
        <GmapMap
           style="height:100vh"
            :center="{ lat: 10.4833584, lng: 123.3998655 }"
            :zoom="14"
        >
            <GmapMarker
                :position="{ lat: parseFloat(MyLocation.lat), lng: parseFloat(MyLocation.lng) }"
               
            />

            <GmapInfoWindow
                :key="index"
                v-for="(m, index) in markers"
                :position="{ lat: parseFloat(m.lat), lng: parseFloat(m.lng) }"
            >
				<a @click="visit(m.store_name,m.id)">
                        {{ m.store_name }}
                        </a>
            </GmapInfoWindow>
        </GmapMap>
    </div>
</template>

<script>
//  :clickable="true"
//  :draggable="true"

import Swal from 'sweetalert2'
import { gmapApi } from "vue2-google-maps";
export default {
    computed: {
        google: gmapApi,
    },

    data() {
        return {
        	 items: [
        {
          color: '#952175',
          src: 'https://cdn.vuetifyjs.com/images/cards/cooking.png',
          title: 'Supermodel',
          artist: 'Foster the People',
        },
        {
          color: '#952175',
          src: 'https://cdn.vuetifyjs.com/images/cards/cooking.png',
          title: 'Halcyon Days',
          artist: 'Ellie Goulding',
        },{
          color: '#952175',
          src: 'https://cdn.vuetifyjs.com/images/cards/cooking.png',
          title: 'Halcyon Days',
          artist: 'Ellie Goulding',
        },
      ],
            MyLocation: {
                lat: 0,
                lng: 0,
            },
            markers: [],
            dialog: false,
	        notifications: false,
	        sound: true,
	        widgets: false,
	        timerCount: 1
	        };

    },
    methods: {


    	visit(branch_name,id){
                 this.$router.push({path:'/search/'+branch_name.replace(/ /g,'-')})
                
                localStorage.setItem("id",id)
    		},
        visitStore(name, id, ll) {
           
              if (navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition((position) => {
                      var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(position.coords.latitude, position.coords.longitude), new google.maps.LatLng(parseFloat(ll[0]), parseFloat(ll[1])));
                        console.log(distance)
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
            })
            .catch((err) => {});
        }
};
</script>

<style>
button.gm-ui-hover-effect {
    display: none !important;
}
div.swal2-container.swal2-center.swal2-backdrop-show{
    padding:0px !important;
}
</style>
