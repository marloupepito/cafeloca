<template>
    <div id="page-container" class="fade show">
            <Carousel />
            <Promotions />
            <Trending />
            <ProductList />
            <ProductList />
            <Policy />
            <Subscribe />
    </div>
</template>
<script>
import Carousel from './homepage/Carousel.vue'
import Promotions from './homepage/Promotions.vue'
import Trending from './homepage/Trending.vue'
import ProductList from './homepage/ProductList.vue'
import ProductList2 from './homepage/ProductList2.vue'
import Policy from './homepage/Policy.vue'
import Subscribe from './homepage/Subscribe.vue'
export default {
    components:{
        Carousel,
        Promotions,
        Trending,
        ProductList,
        ProductList2,
        Policy,
        Subscribe,
    },
}
</script>
<style>
    
</style>