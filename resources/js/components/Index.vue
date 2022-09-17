<template>
    <v-app>
        <div :class="hidden" v-if="path === '/'">
        <div id="loading"/>
            
        <div class="cpsu"/>

        </div>
        <vue-ins-progress-bar></vue-ins-progress-bar>
              <router-view></router-view> 
     </v-app>
</template>

<script>
const path = window.location.pathname
import axios from 'axios'
export default {
    components:{
    },
    data() {
        return {
            component:window.location.pathname === '/'?"true":"false",
            timeHide:4,
            path:path,
            hidden:'',
        }
    },
        watch: {
            timeHide:{
                handler(value){
                     if (value > 0) {
                        setTimeout(() => {
                            this.timeHide--;
                        }, 1000);
                    }else{
                        this.hidden ='d-none'
                    }
                },
                immediate: true
            }
        },
     methods: {
     
    },
    mounted() {
         this.$insProgress.finish()
    },
     created () {
    this.$insProgress.start()
 
        this.$router.beforeEach((to, from, next) => {
          this.$insProgress.start()
          next()
        })
     
        this.$router.afterEach((to, from) => {
          this.$insProgress.finish()
        })
      }
};
</script>

<style>
  #loading {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 100;
  width: 100vw;
  height: 100vh;
  background-color: black;
  background-image: url("/images/logo.jpeg");
  background-repeat: no-repeat;
  background-position: center;
}

</style>
