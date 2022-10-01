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
				          Headline 5
				        </v-list-item-title>
				        <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle>
				      </v-list-item-content>

				      <v-list-item-avatar
				        tile
				        size="80"
				        color="grey"
				      ></v-list-item-avatar>
				    </v-list-item>

				    <v-card-actions>
				      <v-btn
				        outlined
				        rounded
				        text
				      >
				        Button
				      </v-btn>
				    </v-card-actions>
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
				          Headline 5
				        </v-list-item-title>
				        <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle>
				      </v-list-item-content>

				      <v-list-item-avatar
				        tile
				        size="80"
				        color="grey"
				      ></v-list-item-avatar>
				    </v-list-item>

				    <v-card-actions>
				      <v-btn
				        outlined
				        rounded
				        text
				      >
				        Button
				      </v-btn>
				    </v-card-actions>
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
				          Headline 5
				        </v-list-item-title>
				        <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle>
				      </v-list-item-content>

				      <v-list-item-avatar
				        tile
				        size="80"
				        color="grey"
				      ></v-list-item-avatar>
				    </v-list-item>

				    <v-card-actions>
				      <v-btn
				        outlined
				        rounded
				        text
				      >
				        Button
				      </v-btn>
				    </v-card-actions>
				  </v-card>

	    		</div>
	    </div>
	</div>
</template>

<script>
export default {
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
      }
  }
}
</script>