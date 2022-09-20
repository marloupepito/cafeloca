
import Map from './../Maps/Map.vue'
import Home from './../Home.vue'
import Show from './../Homepage/pages/Show.vue'
import Users from './../Homepage/pages/Users.vue'
import Login from './../auth/Login.vue'
import Register from './../auth/Register.vue'

import AdminIndex from './../Homepage/admin/Index.vue'
import AdminUsersTable from './../Homepage/admin/UsersTable.vue'
import AdminCafeView from './../Homepage/admin/CafeView.vue'
import Logout from './../Homepage/admin/Logout.vue'

import Homepage from './../Homepage/Homepage.vue'
const routes = [
  { path: '/', component: Home },
  { path: '/register', component: Register },
  { path: '/search', component: Homepage,
      children:[
        { path: '/search', component: Map},
        { path: '/search/:id', component: Show},
        { path: '/users', component: Login },
      ]
   },
   
  { path: '/administrator/dashboard', component: AdminIndex, name:'admin',
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
          return next({ path: '/'})
        })
      } 
    },
]


export default routes;