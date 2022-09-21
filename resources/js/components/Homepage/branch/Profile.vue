<template>
  <v-card
    class="mx-auto"
    height="90vh"
  >
    <v-navigation-drawer
      class="bg-white"
      permanent
    width="w-100"
    >
      <v-list>
        <v-list-item
          v-for="item in items"
          :key="item.title"
          link
        >
          <v-list-item-icon>
            <v-icon :color="item.color">{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title><b>{{ item.title }}</b></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>

      <template v-slot:append>
        <div class="pa-2 bg-brown">
          <v-btn block color="brown" @click="logout">
           <b style="color:white">Logout</b>
          </v-btn>
        </div>
      </template>
    </v-navigation-drawer>
  </v-card>
</template>


<script>
  export default {
    data () {
      return {
        items: [
          { title: 'Account', icon: 'mdi-account-box', color:'primary'  },
          { title: 'Dashboard', icon: 'mdi-view-dashboard', color:'red' },
          { title: 'Admin', icon: 'mdi-gavel', color:'success'  },
        ],
      }
    },
    methods:{
    	logout(){
    		this.$router.push({path:'/my_account/logout'})
    	}
    }
  }
</script>