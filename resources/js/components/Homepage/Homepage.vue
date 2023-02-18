<template>
  <div
  >
  <v-responsive
      id="hide-on-scroll-example"
      class="overflow-y-auto"
      height="100vh"
    >
      <v-responsive height="auto">
      	 <router-view></router-view>

      </v-responsive>
    </v-responsive>
   <BottomNavBar />
  </div>
</template>


<script>
import BottomNavBar from './BottomNavBar'
export default {
		components:{
      BottomNavBar
		},
		methods:{
			backToHome(){
				this.$router.push({path:'/news_feed'})
				.catch(err=>{})
			},
			gotoUser(){
				this.$router.push({path:'/users'})
				.catch(err=>{})
			},
			gotoMap(){
				this.$router.push({path:'/search'})
				.catch(err=>{})
			},
      searchMap(){
        this.$router.push({path:'/search_product'})
        .catch(err=>{})
      }
		},
		mounted(){
			console.log(window.location.pathname)
		}

}

</script>