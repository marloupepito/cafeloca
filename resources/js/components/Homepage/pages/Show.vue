<template>
  	<div>
	   <Carousel />
	   <SearchCoffee />
	</div>
</template>

<script>
import Carousel from './../Carousel.vue'
import SearchCoffee from './../SearchCoffee.vue'
export default {
		components:{
			Carousel,
			SearchCoffee
		},
		methods:{
		},
		mounted(){
			console.log(window.location.pathname)
		}

}

</script>