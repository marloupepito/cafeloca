<template>
  <v-container class="hero d-flex ">
        <div class="mb-6  align-self-end w-100">
              <v-btn
          class=" w-100 mb-3 text-white font-weight-bold w-100"
          @click="searchMap"
          color="brown"
          large
        >
          Start Visit
        </v-btn>
        </div>
    </v-container>
</template>
<script>
// import Carousel from './homepage/Carousel.vue'
// import Promotions from './homepage/Promotions.vue'
// import Trending from './homepage/Trending.vue'
// import ProductList from './homepage/ProductList.vue'
// import ProductList2 from './homepage/ProductList2.vue'
// import Policy from './homepage/Policy.vue'
// import Subscribe from './homepage/Subscribe.vue'
export default {
    // components:{
    //     Carousel,
    //     Promotions,
    //     Trending,
    //     ProductList,
    //     ProductList2,
    //     Policy,
    //     Subscribe,
    // },

    methods:{
        searchMap(){
            this.$router.push({path:'/users'})
        }
    }
}
</script>
<style scoped>
.hero {
  background-image: url("/images/background.png");
  height: 100vh; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}
</style>