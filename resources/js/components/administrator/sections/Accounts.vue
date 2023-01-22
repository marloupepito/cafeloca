<template>
	<div>
	    <UsersTable />
	</div>
</template>

<script>
import UsersTable from './components/UsersTable.vue'
export default {
	components:{
			UsersTable,
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
      }
  },

}
</script>