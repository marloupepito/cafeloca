
// import Map from './../Maps/Map.vue'
// import Parallax from './../home/components/Parallax.vue'
// import NewsFeed from './../Homepage/NewsFeed.vue'
// import SearchCoffee from './../Homepage/SearchCoffee.vue'
// import ShowProduct from './../Homepage/ShowProduct.vue'
// import Show from './../Homepage/pages/Show.vue'
// import Users from './../Homepage/pages/Users.vue'
// import Login from './../auth/Login.vue'

// import AdminIndex from './../Homepage/admin/Index.vue'
// import AdminUsersTable from './../Homepage/admin/UsersTable.vue'
// import AdminCafeView from './../Homepage/admin/CafeView.vue'
// import Logout from './../Homepage/admin/Logout.vue'
// import Dashboard from './../Homepage/admin/Dashboard.vue'


// import Logout2 from './../Homepage/branch/Logout.vue'
// import Homepage from './../Homepage/Homepage.vue'

// import BranchLayout from './../branch/page.vue'
// import Profile from './../Homepage/branch/Profile.vue'
// import Menu from './../Homepage/branch/Menu.vue'
// import MyLocation from './../Homepage/branch/MyLocation.vue'
// import Timeline from './../Homepage/branch/Timeline.vue'
// import Coffee from './../Homepage/branch/Coffee.vue'
// import Bread from './../Homepage/branch/Bread.vue'
// import Snack from './../Homepage/branch/Snack.vue'
// import Delicacy from './../Homepage/branch/Delicacy.vue'

import Parallax from './../home/components/Parallax.vue'
import Homepage from './../home/Page.vue'
import Timeline from './../home/sections/Timeline.vue'
import Search from './../home/sections/Search.vue'
import Map from './../Maps/Map.vue'
 import Login from './../auth/Login.vue'
 import Logout from './../administrator/sections/components/Logout.vue'
import Register from './../auth/Register.vue'

 import Administrator from './../administrator/Page.vue'
 import Dashboard from './../administrator/sections/Dashboard.vue'
 import Accounts from './../administrator/sections/Accounts.vue'
 import Cafeshop from './../administrator/sections/Cafeshop.vue'


 import Branch from './../branch/Page.vue'
 import Profile from './../branch/sections/Profile.vue'
 import Menu from './../branch/sections/Menu.vue'
 import Timeline2 from './../branch/sections/Timeline.vue'
 import Logout2 from './../branch/components/Logout.vue'
const routes = [
  { path: '/', component: Parallax },
  { path: '/visit', component: Homepage,
    children:[
        {path:'/visit/timeline', component:Timeline},
        {path:'/visit/search', component:Search},
        {path:'/visit/search_map', component:Map},
        {path:'/visit/auth', component:Login},
        {path:'/visit/register', component: Register },
    ]
  },
  { path: '/administrator', component: Administrator,
    children:[
     { path: '/administrator/dashboard', component: Dashboard },
     { path: '/administrator/accounts', component: Accounts },
     { path: '/administrator/accounts/:id', component: Cafeshop },
     { path: '/administrator/logout', component: Logout },
    ]
  },
      { path: '/my_account', component: Branch,
      children:[
      { path: '/my_account/profile', component: Profile },
      { path:'/my_account/my_location', component:Map, name:'MyLocation' },
      { path:'/my_account/menu', component:Menu, name:'Menu' },
      { path:'/my_account/timeline', component:Timeline2, name:'Timeline' },
       { path:'/my_account/logout', component:Logout2, name:'logout2' },
      ]
    },
]


export default routes;