<template>
  <v-sheet elevation="6">
   <div class="row">
      <div class="col-md-3 col-3">
       <v-btn color="brown" @click="backTO" style="margin:8px !important" outlined>BACK</v-btn>  
      </div>
      <div class="col-md-9 col-9 ">
        <center>
        <v-rating
        color="yellow darken-3"
          half-increments
          :clearable="true"
          length="5"
           readonly
          size="20"
          :value="rate"
        ></v-rating>
        </center>
      </div>
   </div>

    <v-tabs
    centered
      background-color="brown"
      dark
      align-with-title
      v-model="tabs"
      next-icon="mdi-arrow-right-bold-box-outline"
      prev-icon="mdi-arrow-left-bold-box-outline"
      show-arrows
    >
      <v-tabs-slider color="brown"></v-tabs-slider>
       <v-tab

      @click="map"
      >
      Map
      </v-tab>
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
        searchId:'',
        productid:'',
        branchid:'',
        rate:'',
        tabs:''
      }
    },
    components:{
    },
    mounted(){
       this.cafeName = window.location.pathname.split('/')[3]
       this.searchId =window.location.search.substring(3);
       this.productid = localStorage.getItem("productid");
       this.branchid = localStorage.getItem("branchid");
       axios.post('/get_branch_rating',{
        branchid:this.searchId
        })
        .then(res=>{
          this.rate = res.data.status
          this.tabs=window.location.pathname.split('/')[4]
          })
       },
    methods:{
      backTO(){
        this.$router.push({path:'/visit/timeline/'+this.branchid+'?'+this.productid})
        },
       map(){
          this.$router.push({path:'/visit/coffee/'+this.cafeName, query:this.searchId })
          .catch(err=>{})
        },
        coffee(){
          this.$router.push({path:'/visit/coffee/'+this.cafeName+'/coffee', query:this.searchId })
          .catch(err=>{})
        },
        bread(){
          this.$router.push({path:'/visit/coffee/'+this.cafeName+'/bread', query:this.searchId})
           .catch(err=>{})
        },
        snack(){
          this.$router.push({path:'/visit/coffee/'+this.cafeName+'/snack', query:this.searchId})
           .catch(err=>{})
        },
        delicacy(){
          this.$router.push({path:'/visit/coffee/'+this.cafeName+'/delicacy', query:this.searchId})
           .catch(err=>{})
        },
    },
  

}

</script>