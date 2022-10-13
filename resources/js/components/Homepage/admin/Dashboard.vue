<template>
	
	<div>
		<div class="w-100">
	      <v-breadcrumbs :items="itemss">
	          <template v-slot:divider>
	            <v-icon>mdi-chevron-right</v-icon>
	          </template>
	        </v-breadcrumbs>
	    </div>


	    <div class="row">
	    		<div class="col-md-4">

	    			<v-card
				    class="mx-auto"
				    max-width="100%"
				    elevation="6"
				    outlined
				  >
				    <v-list-item three-line>
				      <v-list-item-content>
				        <div class="text-overline mb-4">
				          Account Approved
				        </div>
				        <v-list-item-title class="text-h5 mb-1">
				          Total {{count1}}
				        </v-list-item-title>
				      </v-list-item-content>

				      <v-list-item-avatar
				        tile
				        size="80"
				        color="grey"
				      ></v-list-item-avatar>
				    </v-list-item>

				  </v-card>

	    		</div>
	    		<div class="col-md-4">

	    		<v-card
				    class="mx-auto"
				    max-width="100%"
				    elevation="6"

				    outlined
				  >
				    <v-list-item three-line>
				      <v-list-item-content>
				        <div class="text-overline mb-4">
				          Account Pending
				        </div>
				        <v-list-item-title class="text-h5 mb-1">
				          Total {{count2}}
				        </v-list-item-title>
				      </v-list-item-content>

				      <v-list-item-avatar
				        tile
				        size="80"
				        color="grey"
				      ></v-list-item-avatar>
				    </v-list-item>

				  </v-card>

	    		</div>




	    		<div class="col-md-4">

	    		<v-card
				    class="mx-auto"
				    max-width="100%"
				    elevation="6"

				    outlined
				  >
				    <v-list-item three-line>
				      <v-list-item-content>
				        <div class="text-overline mb-4">
				          Account Blocked
				        </div>
				        <v-list-item-title class="text-h5 mb-1">
				         Total {{count3}}
				        </v-list-item-title>
				      </v-list-item-content>

				      <v-list-item-avatar
				        tile
				        size="80"
				        color="grey"
				      ></v-list-item-avatar>
				    </v-list-item>

				  </v-card>

	    		</div>

	    </div>
	    <UsersTable />
	</div>
</template>

<script>
import UsersTable from './UsersTable'
export default {
	components:{
			UsersTable
		},
 data () {
      return {
      	 itemss: [
        {
          text: 'administrator',
          disabled: true,
        },
        {
          text: 'Dashboard',
          disabled: false,
          href: '#',
        },
      ],
      count1:'',
      count2:'',
      count3:'',
      }
  },
  mounted(){
  	axios.post('/get_counted_user')
  	.then(res=>{
  		this.count1 =res.data.status1
  		this.count2 =res.data.status2
  		this.count3 =res.data.status3
  		})
  }
}
</script>