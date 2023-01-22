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
        <Navbar />
    </div>
</template>

<script>
import Navbar from "./components/Navbar.vue";
export default {
    components: {
        Navbar,
    },
};
</script>
