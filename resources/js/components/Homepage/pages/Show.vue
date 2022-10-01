<template>
  	<div>
	   <Carousel />
		<ProfileTabs/>
	</div>
</template>

<script>
import Carousel from './../Carousel.vue'
import SearchCoffee from './../SearchCoffee.vue'
import ProfileTabs from './../ProfileTabs.vue'
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