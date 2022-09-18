<template>
  	<div>
	   <Carousel />
	   <ProductList />
	</div>
</template>

<script>
import Carousel from './../Carousel.vue'
import ProductList from './../ProductList.vue'
export default {
		components:{
			Carousel,
			ProductList
		},
		methods:{
		},
		mounted(){
			console.log(window.location.pathname)
		}

}

</script>