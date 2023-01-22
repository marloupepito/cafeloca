<template>
	
	<div>
		<div class="w-100">
	      <v-breadcrumbs :items="itemss">
	          <template v-slot:divider>
	            <v-icon>mdi-chevron-right</v-icon>
	          </template>
	        </v-breadcrumbs>
	    </div>


	   <Cards />
	    <UsersTable />
	</div>
</template>

<script>
import UsersTable from './components/UsersTable.vue'
import Cards from './components/Cards.vue'
export default {
	components:{
			UsersTable,
			Cards
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