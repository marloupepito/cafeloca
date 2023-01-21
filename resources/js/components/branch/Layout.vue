<template>
    <div>
        <router-view></router-view>
        <BottomNavbar />
    </div>
</template>

<script>
import BottomNavbar from './components/BottomNavbar.vue';

export default {
    components:{
        BottomNavbar
    }
}
</script>