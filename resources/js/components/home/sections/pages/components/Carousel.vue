<template>
  <div
    max-width="444"
   
  >
    <v-carousel
      :continuous="false"
      :cycle="cycle"
      :show-arrows="true"
      hide-delimiter-background
      delimiter-icon="mdi-minus"
      height="150"
    >
      <v-carousel-item
        v-for="(covers, i) in cover"
                    :key="i"
                    :src="'/images/post/'+covers.cover"
      >
        
      </v-carousel-item>
    </v-carousel>
    <v-list two-line>
      <v-list-item>
        <v-list-item-avatar>
          <v-img :src="'/images/post/'+userData.profile"></v-img>
        
        </v-list-item-avatar>
        <v-list-item-content>
          <v-list-item-title>{{userData.store_name}}</v-list-item-title>
          <div class="row">
            <div class="col-md-8 col-8 pb-0">
                <v-list-item-subtitle>{{userData.store_location}}</v-list-item-subtitle>
            </div>
            <div class="col-md-4 col-4 pb-0" style="padding-left:0px;padding-right:0px">
               <v-list-item-subtitle>
                 <v-icon
                >
                  mdi-run
                </v-icon>{{distance}}m
               </v-list-item-subtitle>
            </div>
          </div>
           <v-list-item-subtitle>{{userData.landmark}}</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </div>
</template>
<script>
export default {
    data(){
    	return{
        cover:[],
        distance:'',
        userData:[],
    		 colors: [
          'green',
          'secondary',
          'yellow darken-4',
          'red lighten-2',
          'orange darken-1',
        ],
        cycle: false,
        slides: [
          'First',
          'Second',
          'Third',
          'Fourth',
          'Fifth',
        ],
    	}
    },
    mounted(){
      const id = window.location.search.substring(3)
      axios.post('/get_coffee_cover2',{
        id:id
        })
          .then(res=>{
            this.cover = res.data.status
            })
      axios.post('/get_user_id',{
      id:id
      })
      .then(res=>{
        this.userData =res.data.status
             if (navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition((position) => {
                      var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(position.coords.latitude, position.coords.longitude), new google.maps.LatLng(parseFloat(res.data.status.lat), parseFloat(res.data.status.lng)));
                       this.distance =distance
                       console.log(distance)
                  });
              }
        })
      }
}
</script>
<style lang="">
    
</style>