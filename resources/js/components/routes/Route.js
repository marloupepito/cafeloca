
import Map from './../Maps/Map.vue'
import Home from './../Home.vue'
import NewsFeed from './../Homepage/NewsFeed.vue'
import Show from './../Homepage/pages/Show.vue'
import Users from './../Homepage/pages/Users.vue'
import Login from './../auth/Login.vue'
import Register from './../auth/Register.vue'

import AdminIndex from './../Homepage/admin/Index.vue'
import AdminUsersTable from './../Homepage/admin/UsersTable.vue'
import AdminCafeView from './../Homepage/admin/CafeView.vue'
import Logout from './../Homepage/admin/Logout.vue'
import Logout2 from './../Homepage/branch/Logout.vue'
import Homepage from './../Homepage/Homepage.vue'


import Profile from './../Homepage/branch/Profile.vue'
import Menu from './../Homepage/branch/Menu.vue'
import MyLocation from './../Homepage/branch/MyLocation.vue'
import Timeline from './../Homepage/branch/Timeline.vue'
const routes = [
  { path: '/', component: Home },
  { path: '/register', component: Register },
  { path: '/search', component: Homepage,
      children:[
        { path: '/search', component: Map},
        { path: '/search/:id', component: Show},
        { path: '/users', component: Login },
        { path: '/news_feed', component: NewsFeed },
      ]
   },
   
    localStorage.getItem("usertype")==='admin'? { path: '/administrator/dashboard', component: AdminIndex, name:'admin',
      children:[
           { path:'/administrator/accounts', component:AdminUsersTable, name:'admin2' },
           { path:'/administrator/accounts/:id', component:AdminCafeView, name:'admin3' },
           { path:'/administrator/logout', component:Logout, name:'logout' },
      ],
      beforeEnter: (to, from, next) => {
        axios.get('/authenticated')
        .then(res=>{
          next()
        })
        .catch(err=>{
          return next({ path: '/users'})
        })
      } 
    }:{ path: '/my_account', component: AdminIndex, name:'admin',
      children:[
          { path:'/my_account/profile', component:Profile, name:'profile' },
           { path:'/my_account/my_location', component:MyLocation, name:'MyLocation' },
           { path:'/my_account/menu', component:Menu, name:'Menu' },
           { path:'/my_account/timeline', component:Timeline, name:'Timeline' },
            { path:'/my_account/logout', component:Logout2, name:'logout2' },
      ],
      beforeEnter: (to, from, next) => {
        axios.get('/authenticated')
        .then(res=>{
          next()
        })
        .catch(err=>{
          return next({ path: '/users'})
        })
      } 
    },



]


export default routes;