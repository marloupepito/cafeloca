<template>
    <v-app>
        <router-view></router-view>
     </v-app>
</template>

<script>
const path = window.location.pathname
import axios from 'axios'
export default {
    components:{

    },
    mounted(){
         axios.get('/user')
        .then(res=>{
            this.$insProgress.finish()
            this.auth = window.location.pathname.split('/')[1]
            localStorage.setItem("user_id", res.data.id);
            this.load=true
            this.usertype = localStorage.getItem("usertype");
          
        })
        .catch(err=>{
            this.auth = false
        })

        if(localStorage.getItem("ip") === null){
          localStorage.setItem("ip",Math.random());
        }
    },
    data() {
        return {
            usertype:'',
            load:false,
            auth:'',
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
                        this.load=true
                    }else{
                        this.hidden ='d-none'
                    }
                },
                immediate: true
            }
        },
     methods: {
     
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
