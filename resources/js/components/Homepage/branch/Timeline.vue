<template>
  <v-card class="overflow-hidden">
    <v-app-bar
      absolute
     src="https://picsum.photos/1920/1080?random"
      dark
      hide-on-scroll
      prominent
      scroll-target="#scrolling-techniques-4"
    >

    </v-app-bar>
    <v-sheet
      id="scrolling-techniques-4"
      class="overflow-y-auto"
      max-height="600"
    >
      <v-container style="height: 100vh;">
      	

<br /><br /><br /><br /><br />

      <div class="row">
    
        <div
          v-for="(item, i) in dataPost"
          :key="i"
          class="col-md-4 col-12"
        >
        <br />
          <v-card
          class="elevation-16"
            color="white"
            dark
          >
            <div class="row" style="color:brown !important">
            <div class="col-md-5 col-5" style="padding:0px">
 				<v-avatar
                class="ma-3"
                size="125"
                tile
              >
               <v-img :src="'/images/post/'+item.images"></v-img> 
              </v-avatar>
            </div>
             <div class="col-md-7 col-7"  style="padding:0px">
             		 <div>
                <v-card-title
                 style="padding:5px"
                  class="text-h5"
                  v-text="item.productname"
                ></v-card-title>

                <v-card-subtitle v-text="item.about"  style="padding-top:5px;padding-bottom:5px !important" ></v-card-subtitle>
        <v-rating
          v-model="rating"
          color="yellow darken-3"
          background-color="grey darken-1"
          empty-icon="$ratingFull"
          half-increments
          hover
          medium
        ></v-rating>

		     
                <v-card-actions >
                 <v-btn
                    class="ml-2"
                    outlined
                    rounded
                    small
                     style="color:brown !important"
                  >
                    START RADIO
                  </v-btn>
                </v-card-actions>
              </div>
            </div>
            
            </div>
          </v-card>
        </div><br /><br />
      </div><br /><br />



      </v-container>
    </v-sheet>
  </v-card>
</template>


<script>
  export default {
    mounted(){
      axios.post('/get_branch_post')
      .then(res=>{
         this.dataPost = res.data.status
        })
      .catch(err=>{

        })
      },  
    data: () => ({
      dataPost:[],
    	rating: 4.5,
      items: [
        {
          color: 'white',
          src: 'https://cdn.vuetifyjs.com/images/cards/foster.jpg',
          title: 'Supermodel',
          artist: 'Foster the People',
        },{
          color: 'white',
          src: 'https://cdn.vuetifyjs.com/images/cards/foster.jpg',
          title: 'Supermodel',
          artist: 'Foster the People',
        },{
          color: 'white',
          src: 'https://cdn.vuetifyjs.com/images/cards/foster.jpg',
          title: 'Supermodel',
          artist: 'Foster the People',
        },
        {
          color: 'white',
          src: 'https://cdn.vuetifyjs.com/images/cards/foster.jpg',
          title: 'Supermodel',
          artist: 'Foster the People',
        },
         {
          color: 'white',
          src: 'https://cdn.vuetifyjs.com/images/cards/foster.jpg',
          title: 'Supermodel',
          artist: 'Foster the People',
        },
         {
          color: 'white',
          src: 'https://cdn.vuetifyjs.com/images/cards/foster.jpg',
          title: 'Supermodel',
          artist: 'Foster the People',
        },
       
      ],
    }),
  }
</script>