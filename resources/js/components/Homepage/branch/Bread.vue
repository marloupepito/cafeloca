<template lang="">
  
<div>

        <v-col
          v-for="(item, i) in userData"
          :key="i"
          cols="12"
        >
          <v-card
            color="brown"
            dark
             @click="ShowProduct(item.id)"
          >
            <div class="d-flex flex-no-wrap">
            <v-avatar
                class="ma-3"
                size="125"
                tile
              >
                <v-img :src="'/images/post/'+item.images"></v-img>
              </v-avatar>
              <div>
                <v-card-title
                  class="text-h5"
                  v-text="item.productname"
                ></v-card-title>

                <v-card-subtitle v-text="item.about"></v-card-subtitle>

                <v-card-actions>
                  <v-row
                        align="center"
                        class="mx-0"
                      >
                        <v-rating
                        v-model="item.rate"
                          color="amber"
                          dense
                          half-increments
                          readonly
                          size="14"
                        ></v-rating>

                        <div class="grey--text ms-4">
                         ₱ {{item.price}}
                        </div>
                      </v-row>
                </v-card-actions>
              </div>
             
              
            </div>
          </v-card>
        </v-col> <br /><br /><br />
      </div>

</template>
<script>
export default {
    data(){
    	return{
        star:5,
        userData:[],
    		  items: [
        {
          color: 'brown',
          src: 'https://cdn.vuetifyjs.com/images/cards/cooking.png',
          title: 'Supermodel',
          artist: 'Foster the People',
        },
        {
          color: 'brown',
          src: 'https://cdn.vuetifyjs.com/images/cards/cooking.png',
          title: 'Halcyon Days',
          artist: 'Ellie Goulding',
        },
      ],
    	}
    },
      methods:{
        ShowProduct(id){
       this.$router.push({path:'/news_feed/'+id})
      }
    },
    mounted(){
      const id = window.location.search.substring(3)

        axios.post('/get_menu',{
          menu:'Bread',
          id:id
          })
        .then(res=>{
          this.userData = res.data.status
          })
       
      }
}
</script>
<style lang="">
    
</style>