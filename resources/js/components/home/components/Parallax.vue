<template>
    <div
    style="height:100vh; background-size: cover; background-image: url('/images/home.png');background-position: center;"
     
    >
      <v-row
        align="center"
        justify="center"
      >
        <v-col
          class="text-center"
          cols="12"
        >
         
          <h4 class="subheading" 
        style="padding-top:350px">
            <v-btn
          class="  mb-3 text-white font-weight-"
          @click="searchMap"
          color="black"
          large
          outlined
        >
         <b> Start Visit</b>
        </v-btn>
          </h4>
        </v-col>
      </v-row>
    </div>
  </template>

<script>
export default {
    methods:{
        searchMap(){
            this.$router.push({path:'/visit/timeline'})
        }
    }
}
</script>
