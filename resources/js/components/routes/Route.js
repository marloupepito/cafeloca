
import Map from './../Maps/Map.vue'
import Show from './../Homepage/pages/Show.vue'
const routes = [
	// { path: '*', redirect: '/dashboard/v2' },
//   { path: '*', component: ExtraError },
  { path: '/', component: Map,
     
   },
  { path: '/visit', component: Show },
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