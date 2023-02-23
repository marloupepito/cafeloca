<template>
  <v-app>
  <div class="text-center">
    <v-bottom-sheet
      v-model="sheet"
      persistent
    >
  
      <v-sheet
        class="text-center"
        height="100vh"
         :fullscreen="true"
      >
        <v-btn
          class="mt-6"
          text
          color="error"
          @click="sheet = !sheet"
        >
          close
        </v-btn>
        <div class="py-3">
          <img src="/images/info.jpg" width="100%" height="100%" />
        </div>
      </v-sheet>
    </v-bottom-sheet>
  </div>
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
        style="padding-top:50vh">
            <v-btn
          class="  mb-1 text-white font-weight-"
          @click="searchMap"
          color="black"
          large
          outlined
        >
         <b> Start Visit</b>
        </v-btn>
          </h4>
        </v-col>
          <v-col
          class="text-center"
          cols="12"
        >


        <v-btn
        class="text-white"
         @click="sheet = true"
          color="brown"
        >
<v-icon dark>
        mdi-information-variant
      </v-icon>
        </v-btn>


        </v-col>
      </v-row>
    </div>
    </v-app>
  </template>

<script>
export default {
  data: () => ({
      sheet: false,
    }),
    methods:{
        searchMap(){
            this.$router.push({path:'/visit/timeline'})
        }
    }
}
</script>
