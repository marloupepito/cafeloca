<template>
    <div>
        <div class="row">
            <div class="col-md-6 pt-0">
                <center>
                    <img src="/images/logo.png" class="mt-5 hideMobile" style="margin-top:50px !important" width="400px" height="500px"/>
                </center>
            </div>
            <div class="col-md-6 pt-0">
                <router-view></router-view>
            </div>
        </div>
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