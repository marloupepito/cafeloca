<template>
  	<div  class="col-md-4 offset-md-4 p-0">
						<v-toolbar

				          dark
				          color="primary"
				          style="position:fixed !important; z-index:1 !important;"
				        >
				          <a
				            icon
				            dark
				            @click="backToHome(dialog = false)"
				          >
				            <v-icon>mdi-arrow-left-bold</v-icon>
				          </a>
				          <v-spacer></v-spacer>
				          
				        </v-toolbar>
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
			backToHome(){
				this.$router.push({path:'/'})
			}
		}

}

</script>