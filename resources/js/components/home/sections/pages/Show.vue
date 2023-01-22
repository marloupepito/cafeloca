<template>
  	<div>
	   <Carousel />
		<ProfileTabs/>
	</div>
</template>

<script>
import Carousel from './components/Carousel.vue'
import SearchCoffee from './components/SearchCoffee.vue'
import ProfileTabs from './components/ProfileTabs.vue'
export default {
		components:{
			Carousel,
			SearchCoffee,
			ProfileTabs
		},
		methods:{
		},
		mounted(){
		}

}

</script>