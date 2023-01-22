<template>
    <div>
        
      <v-card class="d-flex">
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
    
            <v-list-item-title>{{name}}</v-list-item-title>
    
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
    
     
    
      
    
        <div   style="padding:0px !important;margin: 0px !important;width:100%;">
          <div class="overflow-y-auto" max-height="100vh" min-height="100vh">
            <router-view></router-view>
          </div>
        </div>
      </v-card>
    
    
  
    
    
      </div>
    </template>
    
    <script>
      export default {
        components:{
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
            name:''
          }
        },
        mounted(){
          axios.get('/user')
          .then(res=>{
            this.usertype = res.data.usertype
            this.name = res.data.store_name
            localStorage.setItem("usertype", res.data.usertype);
            })
          .catch(err=>{
    
            })
        }
      }
    </script>