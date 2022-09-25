<template>
  <v-card
    class="overflow-hidden"
    height="100vh"
    max-width="500"
  >
    <v-bottom-navigation
    :value="parseInt(active)"
      absolute
      hide-on-scroll
      background-color="brown"
      scroll-target="#hide-on-scroll-example"
    >

     <v-btn
        color="white"
        text

        @click="timeline"
      >
      <span>Timeline</span>
        <center><v-icon>mdi-timeline</v-icon></center>
      </v-btn>

      <v-btn
        color="white"
        text
        @click="menu"
      >
      <span>Menu</span>

        <center><v-icon>mdi-coffee-to-go</v-icon></center>
      </v-btn>
  <v-btn
        color="white"
        text
@click="myLocation"
      >
<span>My Location</span>
        <center><v-icon>mdi-map-marker</v-icon></center>
      </v-btn>
      <v-btn
        color="white"
        text
        @click="profile"
      >
 <span>Profile</span>
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
     data() {
        return {
          active:localStorage.getItem("active")
        }
     },
		components:{
      
		},
    mounted(){
      localStorage.setItem("active", 3)
      },
	 	methods:{
	     timeline(){
        this.$router.push({path:'/my_account/timeline'})
        .catch(err=>{})
      localStorage.setItem("active", 0)
        },
      menu(){
         this.$router.push({path:'/my_account/menu'})
         .catch(err=>{})
      localStorage.setItem("active", 1)
        },
      myLocation(){
         this.$router.push({path:'/my_account/my_location'})
         .catch(err=>{})
      localStorage.setItem("active", 2)
        },
      profile(){
         this.$router.push({path:'/my_account/profile'})
         .catch(err=>{})
      localStorage.setItem("active", 3)
      }
		},
		mounted(){
			console.log(window.location.pathname)
		}

}

</script>