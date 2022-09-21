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
			        <div class="col-md-6 col-12">
						  <v-card
						    class="mx-auto"
						    max-width="434"
						    tile
						  >
						  
						    <v-img
						      height="100%"
						      src="https://cdn.vuetifyjs.com/images/cards/server-room.jpg"
						    >
						      <v-row
						        align="end"
						        class="fill-height"
						      >
						        <v-col
						          align-self="start"
						          class="pa-0"
						          cols="12"
						        >
						          <v-avatar
						            class="profile"
						            color="grey"
						            size="164"
						            tile
						          >
						            <v-img src="https://cdn.vuetifyjs.com/images/profiles/marcus.jpg"></v-img>
						          </v-avatar>
						        </v-col>
						        <v-col class="py-0">
						          <v-list-item
						            color="rgba(0, 0, 0, .4)"
						            dark
						          >
						            <v-list-item-content>
						              <v-list-item-title class="text-h6">
						                Marcus Obrien
						              </v-list-item-title>
						              <v-list-item-subtitle>Network Engineer</v-list-item-subtitle>
						            </v-list-item-content>
						          </v-list-item>
						        </v-col>
						      </v-row>
						    </v-img>



						    <v-simple-table dense>
							    <template v-slot:default>
							      <thead>
							        <tr>
							          <th class="text-left">
							            Name
							          </th>
							          <th class="text-left">
							            Calories
							          </th>
							        </tr>
							      </thead>
							      <tbody>
							        <tr
							          v-for="item in desserts"
							          :key="item.name"
							        >
							          <td>{{ item.name }}</td>
							          <td>{{ item.calories }}</td>
							        </tr>
							      </tbody>
							    </template>
							  </v-simple-table>

						  </v-card>


					
			        </div>
			        <div class="col-md-6 col-12">
			        <GmapMap
				           style="height:75vh"
				            :center="{ lat: 10.4833584, lng: 123.3998655 }"
				            :zoom="16"
				        >
				            <GmapMarker
				                :position="{ lat: parseFloat(10.4833584), lng: parseFloat(123.3998655) }"
				               
				            />

				          <!--   <GmapInfoWindow
				                :key="index"
				                v-for="(m, index) in markers"
				                :position="{ lat: parseFloat(m.lat), lng: parseFloat(m.lng) }"
				            >
								<a @click="visit(m.store_name,m.id)">
				                        {{ m.store_name }}
				                        </a>
				            </GmapInfoWindow> -->
				        </GmapMap>
			        </div>
		        </div>
	</div>
</template>

<script>
const store_name = window.location.pathname.split('/')[3] === undefined?'':window.location.pathname.split('/')[3].replace(/-/g,' ')
import { gmapApi } from "vue2-google-maps";
export default {
	   computed: {
        google: gmapApi,
    },
	mounted(){

		},
data () {
      return {
      	 desserts: [
          {
            name: 'Frozen Yogurt',
            calories: 159,
          },
          {
            name: 'Ice cream sandwich',
            calories: 237,
          },
          {
            name: 'Eclair',
            calories: 262,
          },
          {
            name: 'Cupcake',
            calories: 305,
          },
          {
            name: 'Gingerbread',
            calories: 356,
          },
        
        ],
      	messages: [
	        {
	          avatar: 'https://avatars0.githubusercontent.com/u/9064066?v=4&s=460',
	          name: 'John Leider',
	          title: 'Welcome to Vuetify!',
	          excerpt: 'Thank you for joining our community...',
	        },
        ],
 		itemss: [
       {
          text: 'administrator',
          disabled: true,
        },
        {
          text: 'Accounts',
          disabled: true,
        },
        {
          text: store_name,
          disabled: false,
          href: '#',
        },
      ],
      }
  }

}

</script>