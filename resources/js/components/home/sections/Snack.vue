<template lang="">
  
<div>
             <v-card
                        class="mx-auto w-100 m-3 mb-4"
                        outlined
                        v-for="(item, i) in userData" :key="i"
                      >
                        <v-list-item three-line>
                          <v-list-item-content>
                            <div class="text-overline mb-4">
                             {{ item.menu}}
                            </div>
                            <v-list-item-title class="text-h5 mb-1">
                              {{ item.productname }}
                            </v-list-item-title>
                            <v-list-item-subtitle>{{ item.about }}</v-list-item-subtitle>
                          </v-list-item-content>

                          <v-list-item-avatar
                            tile
                            size="80"
                            color="grey"
                          >
                          <v-img
                                style="width: 100%;"
                                :src="'/images/post/' + item.images"
                            />
                          </v-list-item-avatar>
                        </v-list-item>
                          <div class="grey--text ms-4">
                         ₱ {{item.price}}
                        </div>
                        <center>

                                       <v-rating
                        v-model="item.rate"
                          color="amber"
                          dense
                          half-increments
                          readonly
                          size="20"
                        ></v-rating>
                                    </center>
                                    <br />
                   
                  </v-card> <br /><br /><br />
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
          this.$router.push({path:'/visit/timeline/'+id})
      }
    },
    mounted(){
      const id = window.location.search.substring(3)

        axios.post('/get_menu',{
          menu:'Snack',
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