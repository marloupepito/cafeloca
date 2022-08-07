<template>
    <v-app>
    <div id="page-container" class="fade show">
            <Header v-if="component === 'false'"/>
                <router-view></router-view>
            <Footer v-if="component === 'false'" />
    </div>
    </v-app>
</template>

<script>
import Header from './homepage/Header.vue'
import Footer from './homepage/Footer.vue'
export default {
    components:{
        Footer,
        Header
    },
    data() {
        return {
            component:window.location.pathname === '/'?"true":"false"
        }
    },
    mounted() {
        // axios.get('/user')
        // .then(res=>{

        // })
    },
};
</script>
