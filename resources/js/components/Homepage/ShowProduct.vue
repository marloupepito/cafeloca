<template>
  <v-card height="100vh">
    <template slot="progress">
      <v-progress-linear
        color="deep-purple"
        height="10"
        indeterminate
      ></v-progress-linear>
    </template>
<a @click="overlay = !overlay" class="elevation-5">
    <v-img
      height="250"
      class="container"
      :src="'/images/post/'+postData.images"
    ></v-img>
</a>


<v-overlay
          :absolute="absolute"
          :opacity="1"
          :value="overlay"

              height="100%"
        >
            <v-card
              class="mx-auto"
              max-width="344"
              outlined
            >
              <v-carousel hide-delimiters>
                <v-carousel-item
                  v-for="(item,i) in imagesData"
                  :key="i"
                  :src="'/images/post/'+item.images"
                ></v-carousel-item>
              </v-carousel>
            </v-card>
              <v-btn block
                Block Button
                depressed
                color="brown"
                @click="overlay = false"
                >
                CLOSE
              </v-btn>
        </v-overlay>
      <div class="grey--text ms-4">
          Please Click the image.
        </div>
    <v-card-title>{{postData.productname}}</v-card-title>

    <v-card-text>
      <v-row
        align="center"
        class="mx-0"
      >
        <v-rating
          :value="4.5"
          color="amber"
          dense
          half-increments
          readonly
          size="14"
        ></v-rating>

        <div class="grey--text ms-4">
          4.5 Please Click the image!
        </div>
      </v-row>

      <div class="my-4 text-subtitle-1">
        ₱ {{postData.price}}, {{postData.branchname}}
      </div>

      <div>{{postData.about}}</div>
    </v-card-text>

    <v-divider class="mx-4"></v-divider>

    <v-card-title>Available Now</v-card-title>


    <v-card-actions>
      <v-btn
        color="brown"
        depressed
        class="btn"
        @click="clickToVisit(postData.id)"
        block
        style="color:white !important"
      >
        <b>VISIT</b>
      </v-btn>
    </v-card-actions>
  </v-card>
</template>


<script>
import axios from 'axios'
  export default {
    data: () => ({
    	absolute: true,
      overlay: false,
      selection: 1,
      postData:[],
      imagesData:[]
    }),
    mounted(){

      axios.post('/get_every_product_post',{
        productid:window.location.pathname.split('/')[2]
        })
      .then(res=>{
        this.postData = res.data.status
        this.imagesData = res.data.images
        })
      },
    methods: {
      clickToVisit(id){
        this.$router.push({path:'/search/'+this.postData.branchname.replace(/ /g,'-')+'?'+id})
        
        },
      reserve () {
        this.loading = true

        setTimeout(() => (this.loading = false), 2000)
      },
    },
  }
</script>