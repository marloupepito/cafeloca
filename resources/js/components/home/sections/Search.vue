<template lang="">
  
    <div>
      <br />
          <v-container fluid>
      <div class="row">
        <div class="col-12">
          <v-autocomplete
      v-model="model"
      :items="items"
      :loading="isLoading"
      :search-input.sync="search"
      chips
      clearable
      hide-details
      hide-selected
      item-text="menu"
      item-value="branchname"
      label="Search for a menu..."
      solo
      spellcheck="false" 
      :filter="customFilter"
    >
      <template v-slot:no-data>
        <v-list-item>
          <v-list-item-title>
            Search for your favorite
            <strong>menu</strong>
          </v-list-item-title>
        </v-list-item>
      </template>
      <template v-slot:selection="{ attr, on, item, selected }">
        <v-chip
          v-bind="attr"
          :input-value="selected"
          color="blue-grey"
          class="white--text"
          v-on="on"
        >
          <v-icon left>
           mdi-store-search-outline
          </v-icon>
          <span v-text="item.branchname+' - '+ item.menu"></span>
        </v-chip>
      </template>
      <template v-slot:item="{ item }">
        <v-list-item-avatar
          color="indigo"
          class="text-h5 font-weight-light white--text"
         
        >
          {{ item.branchname.charAt(0) }}
        </v-list-item-avatar>
        <v-list-item-content  @click="valueProduct(item.branchname,item.menu)" >
          <v-list-item-title v-text="item.branchname"></v-list-item-title>
          <v-list-item-subtitle >{{item.menu}} - {{item.productname}}</v-list-item-subtitle>
        </v-list-item-content>
        <v-list-item-action>
          <v-icon>mdi-store-search-outline</v-icon>
        </v-list-item-action>
      </template>
    </v-autocomplete>
 </div>
       
      </div>
            </v-col>
    </v-container>
    <v-container fluid>
      <div class="row">
            <div
            class="col-md-4 col-6"
              v-for="card in cards"
              :key="card.id"
            >
            <a @click="clickToVisit(card.branchid,card.branchname,card.menu)">
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
            loading:false,
             isLoading: false,
            items: [],
            model: null,
            search: null,
            tab: null,
            }
        },

        watch: {
      model (val) {
        if (val != null) this.tab = 0
        else this.tab = null
      },
      search (val) {
        // Items have already been loaded
        if (this.items.length > 0) return

        this.isLoading = true

             axios.post('/get_search_menu',{
              menu:this.values
              })
            .then(res=>{
                this.items  = res.data.status1
              this.isLoading = false
              })
              .catch(err=>{
                this.isLoading = false
                })
          },
        },
        methods:{
            customFilter (item, queryText, itemText) {
             const textOne = item.menu.toLowerCase()
             const textTwo = item.branchname.toLowerCase()
             const textThree = item.productname.toLowerCase()
              const searchText = queryText.toLowerCase()
              console.log(item.productname)
              return textOne.indexOf(searchText) > -1  || textTwo.indexOf(searchText) > -1 || textThree.indexOf(searchText) > -1
          },
          valueProduct(branchname, menu){
            console.log(branchname+menu)
            axios.post('/get_search_menu2',{
              branchname:branchname,
              menu:menu
              })
            .then(res=>{
              this.cards = res.data.status1
              console.log(res.data.status1)
              })
            },
         
           clickToVisit(id,branchname,menu){
            this.$router.push({path:'/visit/coffee/'+branchname.replace(/ /g,'-')+'/'+menu+'?0='+id})
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