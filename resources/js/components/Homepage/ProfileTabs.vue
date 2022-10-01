<template>
  <v-sheet elevation="6">
    <v-tabs
    centered
      background-color="brown"
      dark
      next-icon="mdi-arrow-right-bold-box-outline"
      prev-icon="mdi-arrow-left-bold-box-outline"
      show-arrows
    >
      <v-tabs-slider color="yellow"></v-tabs-slider>
      <v-tab
      @click="coffee"
      >
      Coffee
      </v-tab>
      <v-tab
      @click="bread"
      >
      Bread
      </v-tab>
       <v-tab
      @click="delicacy"
      >
      Delicacy
      </v-tab>
      <v-tab
      @click="snack"
      >
      Snack
      </v-tab>
     
    </v-tabs>
     <router-view></router-view> 
  </v-sheet>
</template>



<script>
export default {
   data(){
      return{
        cafeName:'',
        searchId:''
      }
    },
    components:{
    },
    mounted(){
       this.cafeName = window.location.pathname.split('/')[2]
       this.searchId =window.location.search.substring(3);
       console.log(this.searchId)

       },
    methods:{
        coffee(){
          this.$router.push({path:'/search/'+this.cafeName+'/coffee', query:this.searchId })
          .catch(err=>{})
        },
        bread(){
          this.$router.push({path:'/search/'+this.cafeName+'/bread', query:this.searchId})
           .catch(err=>{})
        },
        snack(){
          this.$router.push({path:'/search/'+this.cafeName+'/snack', query:this.searchId})
           .catch(err=>{})
        },
        delicacy(){
          this.$router.push({path:'/search/'+this.cafeName+'/delicacy', query:this.searchId})
           .catch(err=>{})
        },
    },
  

}

</script>