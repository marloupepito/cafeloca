<template>
  <v-card height="100vh">

<v-dialog
      v-model="rate"
      width="500"
      persistent
    >
      <v-card>
        <v-card-title class="text-h5 grey lighten-2">
          PLEASE RATE!
        </v-card-title>

        <v-card-text>
          <v-rating
          v-model="rating"
          color="yellow darken-3"
          background-color="grey darken-1"
          empty-icon="$ratingFull"
          half-increments
          hover
          large
        ></v-rating>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            text
            @click="submitRate"
          >
            SUBMIT
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>




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
      <a @click="updateRate">
        <v-rating
          :value="rating"
          color="amber"
          dense
          half-increments
          readonly
          size="14"
          
        ></v-rating>
        </a>
        <div class="grey--text ms-4">
          {{rating}} Star
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
        @click="clickToVisit(postData.branchid)"
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
      rating:3,
      rate:false,
    	absolute: true,
      overlay: false,
      selection: 1,
      postData:[],
      imagesData:[],
      userid:'',
      postid:''
    }),
    mounted(){

      axios.post('/get_every_product_post',{
        productid:window.location.pathname.split('/')[2]
        })
      .then(res=>{
        this.userid = window.location.pathname.split('/')[2]
        this.postData = res.data.status
        this.imagesData = res.data.images
        this.postid = res.data.status.id

              axios.post('/get_star_rating',{
                  userid:window.location.pathname.split('/')[2],
                  postid:res.data.status.id
              })
              .then(result=>{
                if(result.data.status === 'done'){
                  this.rate = false
                  this.rating = result.data.rate
                }
              })

        })
      },
    methods: {
      updateRate(){
        this.rate=true
        },
      submitRate(){
            const rating =this.rating
          axios.post('/submit_post_rating',{
            rate:rating,
            userid:this.userid,
            postid:this.postid
            })
          .then(res=>{
             this.rate = false
            // this.rating = result.data.rate
            })

        },
      clickToVisit(id){
        this.$router.push({path:'/search/'+this.postData.branchname.replace(/ /g,'-')+'?0='+id})
        
        },
      reserve () {
        this.loading = true

        setTimeout(() => (this.loading = false), 2000)
      },
    },
  }
</script>