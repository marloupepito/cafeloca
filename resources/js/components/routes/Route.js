import Product from './../Homepage/pages/Products.vue'
import ProductDetails from './../Homepage/pages/Product-Details.vue'
import Home from './../Home.vue'
import Login from './../auth/Login.vue'
import Map from './../Maps/Map.vue'
const routes = [
	// { path: '*', redirect: '/dashboard/v2' },
//   { path: '*', component: ExtraError },
  { path: '/', component: Map },
  { path: '/store/:id', component: Home },
  { path: '/login', component: Login },
  { path: '/map', component: Map },
  { path: '/product', component: Product },
  { path: '/product-details', component: ProductDetails },
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