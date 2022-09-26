<template lang="">
  
<div>

        <v-col
          v-for="(item, i) in items"
          :key="i"
          cols="12"
        >
          <v-card
            :color="item.color"
            dark
          >
            <div class="d-flex flex-no-wrap">
            <v-avatar
                class="ma-3"
                size="125"
                tile
              >
                <v-img :src="item.src"></v-img>
              </v-avatar>
              <div>
                <v-card-title
                  class="text-h5"
                  v-text="item.title"
                ></v-card-title>

                <v-card-subtitle v-text="item.artist"></v-card-subtitle>

                <v-card-actions>
                  <v-row
                        align="center"
                        class="mx-0"
                      >
                        <v-rating
                        v-model="star"
                          color="amber"
                          dense
                          half-increments
                          readonly
                          size="14"
                        ></v-rating>

                        <div class="grey--text ms-4">
                          4.5 (413)
                        </div>
                      </v-row>
                </v-card-actions>
              </div>

              
            </div>
          </v-card>
        </v-col>
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
    mounted(){
      const id = window.location.search.substring(1)

      axios.post('/get_user_id',{
      id:id
      })
      .then(res=>{
        this.userData =res.data.status
       // console.log(res.data.status)
        })
      }
}
</script>
<style lang="">
    
</style>