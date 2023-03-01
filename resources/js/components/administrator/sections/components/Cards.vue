<template>
<div class="container">
     <div class="row">
     		<div class="col-md-3">

	    			<v-card
				    class="mx-auto"
				    max-width="100%"
				    elevation="6"
				    outlined
				  >
				    <v-list-item to="/administrator/approved" three-line>
				      <v-list-item-content>
				        <div class="text-overline mb-4">
				         Approved
				        </div>
				        <v-list-item-title class="text-h5 mb-1">
				          Total {{count1}}
				        </v-list-item-title>
				      </v-list-item-content>

				      <v-list-item-avatar
				        tile
				        size="80"
				        color="white"
				      >
				      <img src="/images/check.png" />
				 </v-list-item-avatar>
				    </v-list-item>

				  </v-card>

	    		</div>

	    		<div class="col-md-3">

	    		<v-card
				    class="mx-auto"
				    max-width="100%"
				    elevation="6"

				    outlined
				  >
				    <v-list-item to="/administrator/pending" three-line>
				      <v-list-item-content>
				        <div class="text-overline mb-4">
				         Pending
				        </div>
				        <v-list-item-title class="text-h5 mb-1">
				          Total {{count4}}
				        </v-list-item-title>
				      </v-list-item-content>

				      <v-list-item-avatar
				        tile
				        size="80"
				        color="white"
				      >
				        <img src="/images/question.png" />
				 </v-list-item-avatar>
				    </v-list-item>

				  </v-card>

	    		</div>



	    		<div class="col-md-3">

	    			<v-card
				    class="mx-auto"
				    max-width="100%"
				    elevation="6"
				    outlined
				  >
				    <v-list-item to="/administrator/unapproved" three-line>
				      <v-list-item-content>
				        <div class="text-overline mb-4">
				         Unapproved
				        </div>
				        <v-list-item-title class="text-h5 mb-1">
				          Total {{count2}}
				        </v-list-item-title>
				      </v-list-item-content>

				      <v-list-item-avatar
				        tile
				        size="80"
				        color="white"
				      >
				        <img src="/images/x.png" />
				 </v-list-item-avatar>
				    </v-list-item>

				  </v-card>

	    		</div>
	    		

	    		<div class="col-md-3">

	    		<v-card
				    class="mx-auto"
				    max-width="100%"
				    elevation="6"

				    outlined
				  >
				    <v-list-item to="/administrator/block" three-line>
				      <v-list-item-content>
				        <div class="text-overline mb-4">
				         Blocked
				        </div>
				        <v-list-item-title class="text-h5 mb-1">
				         Total {{count3}}
				        </v-list-item-title>
				      </v-list-item-content>

				      <v-list-item-avatar
				        tile
				        size="80"
				        color="white"
				      >
				        <img src="/images/block.png" />
				 </v-list-item-avatar>
				    </v-list-item>

				  </v-card>

	    		</div>

	    </div>


</div>
</template>

<script>
export default {
	components:{
		},
 data () {
      return {
      count1:'',
      count2:'',
      count3:'',
      count4:'',
      }
  },
  mounted(){
  	axios.post('/get_counted_user')
  	.then(res=>{
  		this.count1 =res.data.status1
  		this.count2 =res.data.status2
  		this.count3 =res.data.status3
  		this.count4 =res.data.status4
  		})
  }
}
</script>