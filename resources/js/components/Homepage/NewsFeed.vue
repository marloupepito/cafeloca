<template>

	<v-sheet
      id="scrolling-techniques-7"
      class="overflow-y-auto"
      max-height="600"
    >
	      <v-container class="overflow-y-auto">
	 <v-row dense>
        <v-col
          v-for="(item, i) in dataPost"
          :key="i"
          cols="12"
        >
        <br />
          <v-card
          class="elevation-5"
            color="white"
            dark
          >
            <div class="row" style="color:brown !important">
            <div class="col-md-5 col-5" style="padding:0px">
 				<v-avatar
                class="m-3"
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
                <center>
<v-rating
          v-model="rating"
          color="yellow darken-3"
          background-color="grey darken-1"
          empty-icon="$ratingFull"
          half-increments
          hover
          medium
        ></v-rating>
                </center>

                <v-card-actions >

                 <v-btn
                    outlined
                    rounded
                    small
                     style="color:brown !important"
                     @click="clickToVisit(item.branchname,item.branchid)"
                  >
                    CLICK TO VISIT
                  </v-btn>
                </v-card-actions>
              </div>
            </div>
            
            </div>
          </v-card>
        </v-col>
          
      </v-row><br /><br /><center v-if="dataPost.length >= 5 && loading === false"><u><a href="#" @click="seeMore(5)">SEE MORE</a></u></center>
		       <v-progress-linear
		       :class="loading === false?'d-none':''"
		      indeterminate
		      color="brown"
		    ></v-progress-linear>
      </v-container >
      </v-sheet>
</template>

<script>
export default {
    data(){
    	return{
    		rating: 4.5,
        	dataPost:[],
        	limit:5,
        	loading:false
    	}
    },
    methods:{
      clickToVisit(e,id){
        this.$router.push({path:'/news_feed/'+id})
        },
	    	seeMore(e){
	    		this.loading=true
	    		this.limit=this.limit+e
	    		axios.post('/get_all_post',{
    			limit:this.limit
		    		})
		    	.then(res=>{

		    		this.loading=false
		    		this.dataPost = res.data.status

		    	})
	    	}
    	},
    mounted(){
    	axios.post('/get_all_post',{
    			limit:5
    		})
    	.then(res=>{
        
    		this.dataPost = res.data.status
    	})
    	.catch(err=>{

    	})
    }
}
</script>

<style>
button.v-icon.notranslate.v-icon--link.material-icons.theme--dark.yellow--text.text--darken-3{
	padding:0px !important;
	text-align:center !important;
}
</style>