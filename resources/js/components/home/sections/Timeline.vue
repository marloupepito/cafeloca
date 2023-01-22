<template>
    <v-sheet
        id="scrolling-techniques-7"
        class="overflow-y-auto"
        max-height="600"
    >
        <v-container class="overflow-y-auto">
            <v-row dense>
                <v-col v-for="(item, i) in dataPost" :key="i" cols="12">
                    <br />
                    <v-card class="elevation-5 container" color="white" dark>
                        <div class="row" style="color: brown !important">
                            <div class="col-md-5 col-3" style="padding: 0px">
                                <img
                                    style="width: 100%; height: 150px"
                                    :src="'/images/post/' + item.images"
                                />
                            </div>
                            <div class="col-md-7 col-9" style="padding: 0px">
                                <div class="ml-3">
                                    <center class="h3 m-0">
                                        {{ item.productname }}
                                    </center>
                                    <div class="my-4 text-subtitle-1">
                                        {{ item.about }}
                                    </div>
                                    <center>
                                        <v-rating
                                            v-model="item.rate"
                                            color="yellow darken-3"
                                            background-color="grey darken-1"
                                            empty-icon="$ratingFull"
                                            half-increments
                                            medium
                                            readonly
                                        ></v-rating>
                                    </center>

                                    <v-card-actions>
                                        <v-btn
                                            outlined
                                            rounded
                                            small
                                            block
                                            style="color: brown !important"
                                            @click="
                                                clickToVisit(
                                                    item.branchname,
                                                    item.id
                                                )
                                            "
                                        >
                                            SHOW MORE
                                        </v-btn>
                                    </v-card-actions>
                                </div>
                            </div>
                        </div>
                    </v-card>
                </v-col>
             </v-row><br /><br />
            <center v-if="dataPost.length >= 5 && loading === false">
                <u><a href="#" @click="seeMore(5)">SEE MORE</a></u>
            </center>
            <v-progress-linear
                :class="loading === false ? 'd-none' : ''"
                indeterminate
                color="brown"
            ></v-progress-linear>
        </v-container>
    </v-sheet>
</template>

<script>
export default {
    data() {
        return {
            rating: 4.5,
            dataPost: [],
            limit: 5,
            loading: false,
        };
    },
    methods: {
        clickToVisit(e, id) {
            this.$router.push({ path: "/news_feed/" + id });
        },
        seeMore(e) {
            this.loading = true;
            this.limit = this.limit + e;
            axios
                .post("/get_all_post", {
                    limit: this.limit,
                })
                .then((res) => {
                    this.loading = false;
                    this.dataPost = res.data.status;
                });
        },
    },
    mounted() {
        axios
            .post("/get_all_post", {
                limit: 5,
            })
            .then((res) => {
                this.dataPost = res.data.status;
            })
            .catch((err) => {});
    },
};
</script>

<style>
button.v-icon.notranslate.v-icon--link.material-icons.theme--dark.yellow--text.text--darken-3,
button.v-icon.notranslate.v-icon--link.material-icons.theme--dark.grey--text.text--darken-1 {
    padding: 0px !important;
    text-align: center !important;
}
</style>
