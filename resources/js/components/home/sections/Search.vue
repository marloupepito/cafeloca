<template lang="">
  
    <div>
      <div class="row m-2 mt-5">
        <div class="col-10 p-0">
          <v-autocomplete
               :items="items2"
                small-chips
                label="Search Menu"
                color="brown"
                outlined
                dense
                class="p-1"
                v-model="values"
              ></v-autocomplete>
        </div>
        <div class="col-2 p-0">
             <v-btn
             depressed
             medium
              color="brown"
              style="height:60%"
              class=" m-0 text-white"
              @click="submitSearch"
            >
              <center><v-icon>fas fa-search</v-icon></center>
            </v-btn>
        </div>
      </div>
            </v-col>
    
    <v-container fluid>
      <div class="row">
            <div
            class="col-md-4 col-6"
              v-for="card in cards"
              :key="card.id"
            >
            <a @click="clickToVisit(card.branchid,card.branchname)">
              <v-card>
                <v-img
                  :src="'/images/post/'+card.images"
                  class="white--text align-end"
                  gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                  height="200px"
                >
                  <v-card-title v-text="card.productname"></v-card-title>
                </v-img>
    
                <v-card-actions>
                  <v-spacer></v-spacer>
    
                  <b>{{card.menu}}</b>
    
                  <v-btn icon>
                    <v-icon color="brown">mdi-bookmark</v-icon>
                  </v-btn>
    
                </v-card-actions>
              </v-card>
              </a>
            </div>
          </div>
          <br /><br /><center v-if="cards.length >= 5 && loading === false"><u><a href="#" @click="seeMore(5)">SEE MORE</a></u></center>
               <v-progress-linear
               :class="loading === false?'d-none':''"
              indeterminate
              color="brown"
            ></v-progress-linear>
            <br /><br />
    </v-container>
    
             <br />
          </div>
    
    </template>
    <script>
    export default {
        data(){
            return{
             items2: ['Coffee', 'Bread', 'Delicacy', 'Snack'],
            values:[],
            star:5,
            cards: [],
            limit:5,
            loading:false
            }
        },
        methods:{
          submitSearch(){
            axios.post('/get_search_menu',{
              menu:this.values
              })
            .then(res=>{
             this.cards = res.data.status1
           //  console.log(res.data.status2)
           //  console.log(res.data.status3)
           //  console.log(res.data.status4)
            
              })
          },
           clickToVisit(id,branchname){
            this.$router.push({path:'/visit/coffee/'+branchname.replace(/ /g,'-')+'?0='+id})
            },
            seeMore(e){
              this.loading=true
              this.limit=this.limit+e
              axios.post('/get_all_post',{
              limit:this.limit
                })
              .then(res=>{
    
                this.loading=false
                 this.cards = res.data.status
    
              })
            }
        },
        mounted(){
         axios.post('/get_all_post',{
          limit:5
          })
         .then(res=>{
           this.cards = res.data.status
          })
         }
    }
    </script>
    <style lang="">
        
    </style>