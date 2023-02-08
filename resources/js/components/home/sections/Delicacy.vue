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
            <a @click="updateRate">
                                       <v-rating
                        v-model="item.rate"
                          color="amber"
                          dense
                          half-increments
                          readonly
                          size="20"
                        ></v-rating>
            </a>
                        <v-dialog v-model="rate" width="500" persistent>
            <v-card>
                <v-card-title class="text-h5 grey lighten-2">
                    PLEASE RATE!
                </v-card-title>

                <v-card-text>
                    <center>
                    <v-rating
                        v-model="rating"
                        color="yellow darken-3"
                        background-color="grey darken-1"
                        empty-icon="$ratingFull"
                        half-increments
                        hover
                        large
                    ></v-rating>
                    </center>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" text @click="submitRate(item.id)">
                        SUBMIT
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
                                    </center>
                                    <br />
                   
                  </v-card>
<br /><br /><br />
      </div>

</template>
<script>
export default {
    data(){
    	return{
        rate:false,
        star:5,
        userid:'',
        postid:'',
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
         submitRate(productid) {
            const rating = this.rating;
            axios
                .post("/submit_post_rating", {
                    rate: rating,
                    userid: this.userid,
                    postid: productid,
                    ip:localStorage.getItem("ip")
                })
                .then((res) => {
                    this.rate = false;

                    // this.rating = result.data.rate
                });
        },
        updateRate() {
            this.rate = true;
        },
        ShowProduct(id){
          this.$router.push({path:'/visit/timeline/'+id})
      }
    },
    mounted(){
      const id = window.location.search.substring(3)
      this.userid = window.location.search.substring(3)
        axios.post('/get_menu',{
          menu:'Delicacy',
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