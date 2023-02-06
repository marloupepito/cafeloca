<template>
    <div class="overflow-hidden">
        <div class="container">
              <v-card
            class="mx-auto w-100 m-3"
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

        <!--     <v-card-actions>
              <v-btn
                outlined
                rounded
                text
              >
                Button
              </v-btn>
            </v-card-actions> -->
          </v-card>
        </div>
         <center v-if="dataPost.length >= 5 && loading === false">
            <u><a href="#" @click="seeMore(5)">SEE MORE</a></u>
        </center>
        <v-progress-linear
            :class="loading === false ? 'd-none' : ''"
            indeterminate
            color="brown"
        ></v-progress-linear>
    </div>
</template>

<script>
export default {
    mounted() {
        axios
            .post("/get_branch_post",{
              limit:5
            })
            .then((res) => {
                this.dataPost = res.data.status;
            })
            .catch((err) => {});
    },
    data: () => ({
        dataPost: [],
        rating: 4.5,
        items: [],
        limit: 5,
        loading: false,
    }),
    methods:{
      seeMore(e) {
            this.loading = true;
            this.limit = this.limit + e;
            axios
                .post("/get_branch_post", {
                    limit: this.limit,
                })
                .then((res) => {
                    this.loading = false;
                    this.dataPost = res.data.status;
                });
        },
    }
};
</script>
