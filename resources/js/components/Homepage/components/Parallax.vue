<template>
    <div
    style="height:100vh; background-size: cover; background-image: url('/images/cafe.jpg');background-position: center;"
     
    >
      <v-row
        align="center"
        justify="center"
      >
        <v-col
          class="text-center"
          cols="12"
        >
          <h1 
        style="padding-top:100px" class="text-h4 text-white  mb-4">
            <b>Cafe Location App</b>
          </h1>
          <h4 class="subheading" 
        style="padding-top:200px">
            <v-btn
          class="  mb-3 text-white font-weight-"
          @click="searchMap"
          color="brown"
          large
        >
          Start Visit
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
            this.$router.push({path:'/search'})
        }
    }
}
</script>
