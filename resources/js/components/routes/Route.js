
import Map from './../Maps/Map.vue'
import Home from './../Home.vue'
import Show from './../Homepage/pages/Show.vue'
import Users from './../Homepage/pages/Users.vue'
import Login from './../auth/Login.vue'

import Homepage from './../Homepage/Homepage.vue'
const routes = [
  { path: '/', component: Home },
  { path: '/search', component: Homepage,
      children:[
        { path: '/search', component: Map},
        { path: '/search/:id', component: Show},
        { path: '/users', component: Login },
      ]
   },
   
  { path: '/admin', component: Map, name:'admin',
  beforeEnter: (to, from, next) => {
    axios.get('/authenticated')
    .then(res=>{
      next()
    })
    .catch(err=>{
      return next({ path: '/login'})
    })
  } },
]


export default routes;