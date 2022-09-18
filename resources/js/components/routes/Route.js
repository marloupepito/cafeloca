
import Map from './../Maps/Map.vue'
import Home from './../Home.vue'
import Show from './../Homepage/pages/Show.vue'
const routes = [
  { path: '/', component: Home },
  { path: '/search', component: Map },
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