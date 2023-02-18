<template>
  <div  id="create">
    <div class="col-md-5 offset-md-4">
      
  <router-view></router-view>
    </div>
   <!--  <v-speed-dial
         style="margin-right:55px"
       v-model="fab"
      :top="top"
      :bottom="bottom"
      :right="right"
      :left="left"
      :direction="direction"
      :open-on-hover="hover"
      :transition="transition"
    >
      <template v-slot:activator >
        <v-btn
         :fixed="true"
          color="red"
          dark
          fab
       
        >
          <v-icon>
            mdi-location-exit
          </v-icon>
        </v-btn>
      </template>
 
    </v-speed-dial> -->
    <Navbar />
  </div>
</template>

<script>
import Navbar from "./components/Navbar.vue";
export default {
    components: {
        Navbar,
    },
      data: () => ({
      direction: 'top',
      fab: false,
      fling: false,
      hover: false,
      tabs: null,
      top: true,
      right: true,
      bottom: true,
      left: false,
      transition: 'slide-y-reverse-transition',
    }),
      methods:{
            existApp(){
               //window.close();
               console.log(this.finishAffinity())
            }
        },
        watch: {
      top (val) {
        this.bottom = !val
      },
      right (val) {
        this.left = !val
      },
      bottom (val) {
        this.top = !val
      },
      left (val) {
        this.right = !val
      },
    },
};
</script>


<style>
  /* This is for documentation purposes and will not be needed in your application */
  #create .v-speed-dial {
    position: absolute;
  }

  #create .v-btn--floating {
    position: relative;
  }


</style>