<template>
<div>
    
  <v-card class="d-flex" v-if="usertype === 'admin'">
    <v-navigation-drawer
      v-model="drawer"
      :mini-variant.sync="mini"
      permanent
      height='100vh'
    >
    
      <v-list-item class="px-2" >
        <v-list-item-avatar>
          <v-img src="https://randomuser.me/api/portraits/men/85.jpg"></v-img>
        </v-list-item-avatar>

        <v-list-item-title>John Leider</v-list-item-title>

        <v-btn
          icon
          @click.stop="mini = !mini"
        >
          <v-icon>mdi-chevron-left</v-icon>
        </v-btn>
      </v-list-item>

      <v-divider></v-divider>

      <v-list dense>
        <v-list-item-group
        color="primary"
      >
        <v-list-item
          v-for="item in items"
          :key="item.title"
          :to='item.path'
          link
        >
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-item-group>
      </v-list>
    </v-navigation-drawer>

 

  

    <v-container class="fill-height m-0 mw-100">
      <div class="w-100 col-md-12">
        <router-view></router-view>
      </div>
    </v-container>
  </v-card>


<div v-else-if="usertype === 'cafe'">

    <Branch />


</div>


  </div>
</template>

<script>
import Branch from './../branch/Index.vue'
  export default {
    components:{
      Branch
      },
    data () {
      return {
        usertype:'',
        drawer: true,
        items: [
          { title: 'Dashboard', icon: 'mdi-monitor-dashboard', path:'/administrator/dashboard' },
          { title: 'Accounts', icon: 'mdi-account-group-outline', path:'/administrator/accounts' },
          { title: 'Logout', icon: 'mdi-logout', path:'/administrator/logout' },
        ],
        mini: false,
       
      }
    },
    mounted(){
      axios.get('/user')
      .then(res=>{
        this.usertype = res.data.usertype
        localStorage.setItem("usertype", res.data.usertype);
        })
      .catch(err=>{

        })
    }
  }
</script>