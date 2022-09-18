<template>
  <v-card
    class="overflow-hidden mx-auto"
    height="100vh"
    max-width="500"
  >
    <v-bottom-navigation
    :value="2"
      absolute
      hide-on-scroll
      horizontal
      background-color="brown"
      scroll-target="#hide-on-scroll-example"
    >

     <v-btn
        color="white"
        text

        @click="backToHome"
      >

        <center><v-icon>mdi-home</v-icon></center>
      </v-btn>

      <v-btn
        color="white"
        text
      >
<!--         <span>Back</span>
 -->
        <center><v-icon>mdi-history</v-icon></center>
      </v-btn>
  <v-btn
        color="white"
        text
@click="gotoMap"
      >
<!--         <span>Location</span> -->

        <center><v-icon>mdi-map-marker</v-icon></center>
      </v-btn>
      <v-btn
        color="white"
        text
        @click="gotoUser"
      >
       <!--  <span>My Account</span> -->

        <center><v-icon>mdi-account-circle</v-icon></center>
      </v-btn>

    
    </v-bottom-navigation>

    <v-responsive
      id="hide-on-scroll-example"
      class="overflow-y-auto"
      height="100vh"
    >
      <v-responsive height="auto">
      	 <router-view></router-view>
      </v-responsive>
    </v-responsive>
   
  </v-card>
</template>


<script>
export default {
		components:{

		},
		methods:{
			backToHome(){
				this.$router.push({path:'/'})
				.catch(err=>{})
			},
			gotoUser(){
				this.$router.push({path:'/users'})
				.catch(err=>{})
			},
			gotoMap(){
				this.$router.push({path:'/search'})
				.catch(err=>{})
			}
		},
		mounted(){
			console.log(window.location.pathname)
		}

}

</script>