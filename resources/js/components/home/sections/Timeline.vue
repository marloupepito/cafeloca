<template>
    <div
    >
        <v-container class="overflow-y-auto">
            <div dense>
                    <v-card
                        class="mx-auto w-100 m-3 mb-4"
                        outlined
                        v-for="(item, i) in dataPost" :key="i"
                      >
                        <v-list-item three-line>
                          <v-list-item-content>
                            <div class="text-overline mb-4">
                             {{ item.menu}}
                            </div>
                            <v-list-item-title class="text-h5 mb-1">
                              {{ item.productname }}
                            </v-list-item-title>
                            <v-list-item-subtitle>{{ item.about }}</v-list-item-subtitle>
                          </v-list-item-content>

                          <v-list-item-avatar
                            tile
                            size="80"
                            color="grey"
                          >
                          <v-img
                                style="width: 100%;"
                                :src="'/images/post/' + item.images"
                            />
                          </v-list-item-avatar>
                        </v-list-item>
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
                                            color="brown"
                                            @click="
                                                clickToVisit(
                                                    item.branchid,
                                                    item.id
                                                )
                                            "
                          >
                           SHOW MORE
                          </v-btn>
                        </v-card-actions> 
                      </v-card>
             </div><br />
            <center v-if="dataPost.length >= 5 && loading === false">
                <u><v-btn href="#"  color="brown" class="text-white" @click="seeMore(5)">SEE MORE</v-btn></u>
            </center>
            <v-progress-linear
                :class="loading === false ? 'd-none' : ''"
                indeterminate
                color="brown"
            ></v-progress-linear>
        </v-container>
        <br /><br />
    </div>
</template>

<script>
export default {
    data() {
        return {
            rating: 0,
            dataPost: [],
            limit: 5,
            loading: false,
        };
    },
    methods: {
        clickToVisit(branchid, id) {
            this.$router.push({ path: "/visit/timeline/" + branchid+'?'+id});
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
                    this.dataPost = Object.values(res.data.status);
                });
        },
    },
    mounted() {
        axios
            .post("/get_all_post", {
                limit: 5,
            })
            .then((res) => {
                this.dataPost = Object.values(res.data.status);
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
