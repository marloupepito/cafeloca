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
              <v-img src="/images/logo.png"></v-img>
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
      <v-list-item to="/administrator/dashboard">
        <v-list-item-icon>
          <v-icon>mdi-monitor-dashboard</v-icon>
        </v-list-item-icon>

        <v-list-item-title>Home</v-list-item-title>
      </v-list-item>

      <v-list-group
        :value="true"

        prepend-icon="mdi-account-group-outline"
      >
        <template v-slot:activator>
          <v-list-item-title>Accounts</v-list-item-title>
        </template>

        <v-list-item
          v-for="(item, i) in items"
          :key="i"
          :to="item.path"
          style="margin-left:10px"
        >
          <v-list-item-icon>
            <v-icon v-text="item.icon"></v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title v-text="item.title"></v-list-item-title>
          </v-list-item-content>
        </v-list-item>

      </v-list-group>


       <v-list-item to="/administrator/logout">
        <v-list-item-icon>
          <v-icon>mdi-logout</v-icon>
        </v-list-item-icon>

        <v-list-item-title>Logout</v-list-item-title>
      </v-list-item>

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
              {title:'Approved', icon: 'mdi-account-check-outline',path:'/administrator/approved'},
              {title:'Pending', icon: 'mdi-account-clock-outline',path:'/administrator/pending'},
              {title:'Not Approved', icon: 'mdi-account-alert-outline',path:'/administrator/unapproved'},
              {title:'Block', icon: 'mdi-account-cancel-outline',path:'/administrator/block'},
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