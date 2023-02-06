<template>
    <div>
        <GmapMap
        ref="mapRef"
           style="height:92vh"
            :center="{ lat: 10.4833584, lng: 123.3998655 }"
            :zoom="14"
            :streetViewControl="true"
        >
            <GmapMarker
            ref="myMarker"
            v-model="distance"
            v-if="userId !== undefined"
                :draggable="true"
                :clickable="true"
                @dragend="changeLocation"
                :position="{ lat: parseFloat(userData.lat), lng: parseFloat(userData.lng) }"
               
            />
          <GmapMarker
          v-else
                :position="{ lat: parseFloat(MyLocation.lat), lng: parseFloat(MyLocation.lng) }"
               
            />
           
            <GmapInfoWindow
               v-if="userId === undefined"
                :key="index"
                v-for="(m, index) in markers"
                :position="{ lat: parseFloat(m.lat), lng: parseFloat(m.lng) }"
            >
				<a v-if="userId === undefined" @click="visit(m.store_name,m.id)">
                        {{ m.store_name }}
                        </a>
                    <div v-else>
                    {{ m.store_name }}
                    </div>
            </GmapInfoWindow>


        </GmapMap>
    </div>
</template>

<script>
//  :clickable="true"
//  :draggable="true"

import Swal from 'sweetalert2'
export default {
    data() {
        return {
            usertype:localStorage.getItem("usertype") === 'cafe'?'cafe':localStorage.getItem("usertype") === 'cafe'?'admin':false,
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
            distance:'',
            markers: [],
            dialog: false,
	        notifications: false,
	        sound: true,
	        widgets: false,
	        timerCount: 1,
            userData:[],
            userId:''
	        };

    },
    methods: {
        changeLocation(e){
            const lat = e.latLng.lat()
            const lng = e.latLng.lng()
            if(window.confirm('You want to change your location?')){
               axios.post('/change_location_lng_lat',{
                lng:lng,
                lat:lat
                })
               .then(res=>{

                })
               .catch(err=>{
                alert('Error set Location!')
                })
            }else{
            }
        },

    	visit(branch_name,id){
                 this.$router.push({path:'/visit/coffee/'+branch_name.replace(/ /g,'-')+'?0='+id})
                
                localStorage.setItem("id",id)
    		},
        //visitStore(name, id, ll) {
           
          //    if (navigator.geolocation) {
            //      navigator.geolocation.getCurrentPosition((position) => {
              //        var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(position.coords.latitude, position.coords.longitude), new google.maps.LatLng(parseFloat(ll[0]), parseFloat(ll[1])));
         //               console.log(distance)
         //         });
            //  }
        //},
    },
    mounted: function () {
        axios.get('/user')
        .then(res=>{
            this.userData = res.data
        })
        .catch(err=>{})
        if (navigator.geolocation) {
            const meter = navigator.geolocation.getCurrentPosition((position) => {
                this.MyLocation.lat = position.coords.latitude;
                this.MyLocation.lng = position.coords.longitude;
           }); 
         }
             axios.post("/get_all_users")
            .then((res) => {
                this.markers = res.data.status;
                this.userId =  res.data.id
                console.log('ddddd',res.data.status)
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
