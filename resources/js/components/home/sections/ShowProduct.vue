<template>
    <v-card height="120vh">
        <!-- persistent -->
        <v-dialog v-model="rate" width="500" >
            <v-card>
                <v-card-title class="text-h5 grey lighten-2">
                    PLEASE RATE!
                </v-card-title>

                <v-card-text>
                    <v-rating
                        v-model="rating"
                        color="yellow darken-3"
                        background-color="grey darken-1"
                        empty-icon="$ratingFull"
                        half-increments
                        hover
                        large
                    ></v-rating>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" text @click="submitRate">
                        SUBMIT
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <template slot="progress">
            <v-progress-linear
                color="deep-purple"
                height="10"
                indeterminate
            ></v-progress-linear>
        </template>
        <a @click="overlay = !overlay" class="elevation-5">
            <v-img
                height="250"
                class="container"
                :src="'/images/post/' + postData.images"
            ></v-img>
        </a>

        <v-overlay
            :absolute="absolute"
            :opacity="1"
            :value="overlay"
            height="100%"
        >
            <v-card class="mx-auto" max-width="344" outlined>
                <v-carousel hide-delimiters>
                    <v-carousel-item
                        v-for="(item, i) in imagesData"
                        :key="i"
                        :src="'/images/post/' + item.images"
                    ></v-carousel-item>
                </v-carousel>
            </v-card>
            <v-btn
                block
                Block
                Button
                depressed
                color="brown"
                @click="overlay = false"
            >
                CLOSE
            </v-btn>
        </v-overlay>
        <div class="grey--text ms-4">Please Click the image.</div>
        <v-card-title>{{ postData.productname }}</v-card-title>

        <v-card-text>
            <v-row align="center" class="mx-0">
                <a @click="updateRate">
                    <v-rating
                        :value="rating"
                        color="amber"
                        dense
                        half-increments
                        readonly
                        size="14"
                    ></v-rating>
                </a>
                <div class="grey--text ms-4">{{ rating }} Stars</div>
            </v-row>

            <div class="my-4 text-subtitle-1">
                ₱ {{parseFloat(postData.price).toFixed(2)}}, {{ postData.branchname }}
            </div>

            <div>{{ postData.about }}</div>
        </v-card-text>

        <v-divider class="mx-4"></v-divider>

        <v-card-title>Available Now</v-card-title>

        <v-card-actions>
            <v-btn
                color="brown"
                depressed
                class="btn"
                @click="clickToVisit(postData.branchid,postData.id)"
                block
                style="color: white !important"
            >
                <b>VIEW SHOP</b>
            </v-btn>
        </v-card-actions>
        <br /><br /><br />
    </v-card>
</template>

<script>
import axios from "axios";
export default {
    data: () => ({
        rating: 0,
        rate: false,
        absolute: true,
        overlay: false,
        selection: 1,
        postData: [],
        imagesData: [],
        userid: "",
        postid: "",
        ip:[]
    }),
    mounted() {
          this.mount()
    },
    methods: {
        mount(){
              axios
            .post("/get_every_product_post", {
                branchid: window.location.pathname.split("/")[3],
                id:window.location.search.substring(1),
                ip:localStorage.getItem("ip")
            })
            .then((res) => {
                this.ip = res.data.ip;
                  
                this.userid = window.location.pathname.split("/")[3];
                this.postData = res.data.status;
                this.imagesData = res.data.images;
                this.postid = res.data.status.id;
                this.rating =res.data.ip.length === 0?0:res.data.status.rate
            });
            },
        updateRate() {

            this.rate = true;
                axios.post('/get_user_rating',{
                    userid: this.userid,
                    postid: this.postid,
                    ip:localStorage.getItem("ip")
                })
                 .then(res=>{
                    this.rating = res.data.status.rate === null?0:parseInt(res.data.status.rate)
                })
        },
        submitRate() {
            const rating = this.rating;
            axios
                .post("/submit_post_rating", {
                    rate: rating,
                    userid: this.userid,
                    postid: this.postid,
                    ip:localStorage.getItem("ip")
                })
                .then((res) => {
                    this.rate = false;
                    // this.rating = result.data.rate
                    this.mount()
                });
        },
        clickToVisit(id,id2) {
             localStorage.setItem("whereback",'showproduct');
            localStorage.setItem("branchid",id);
            localStorage.setItem("productid",id2);
            this.$router.push({
                path:
                    "/visit/coffee/" +
                    this.postData.branchname.replace(/ /g, "-") +
                    "?0=" +
                    id,
            });
        },
        reserve() {
            this.loading = true;

            setTimeout(() => (this.loading = false), 2000);
        },
    },
};
</script>
>
