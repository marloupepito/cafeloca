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
                :position="{ lat: parseFloat(MyLocation.lat), lng: parseFloat(MyLocation.lng) }"
               
            />
           
            <GmapInfoWindow
                :position="{ lat: parseFloat(lattt), lng: parseFloat(lnggg) }"
            >
				<a >
                        {{ store_name }}
                        </a>
                  
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
            store_name:"",
            lattt:"",
            lnggg:"",
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
                 this.$router.push({path:'/search/'+branch_name.replace(/ /g,'-')+'?0='+id})
                
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

        this.searchId =window.location.search.substring(3);
       console.log(this.searchId)
      
        if (navigator.geolocation) {
            const meter = navigator.geolocation.getCurrentPosition((position) => {
                this.MyLocation.lat = position.coords.latitude;
                this.MyLocation.lng = position.coords.longitude;
           }); 
         }
             axios.post('/get_user_id',{
                id:this.searchId
                })
            .then((res) => {
                this.store_name=res.data.status.store_name
                this.lnggg=res.data.status.lng
                this.lattt=res.data.status.lat
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
