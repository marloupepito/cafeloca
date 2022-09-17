<template>
    <v-app>
        <vue-ins-progress-bar></vue-ins-progress-bar>
              <router-view></router-view> 
     </v-app>
</template>

<script>
import axios from 'axios'
export default {
    components:{
    },
    data() {
        return {
            component:window.location.pathname === '/'?"true":"false",
        }
    },

     methods: {
      sendHttpRequest () {
        this.$isLoading(true) // show loading screen
        axios.get('/user')
        .then(res => {
            this.$isLoading(false)
        })
        .catch(err=>{
            this.$isLoading(false)
        })
      }
    },
    mounted() {
         this.$insProgress.finish()
         this.sendHttpRequest()
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
