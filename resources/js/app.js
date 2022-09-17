/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vuetify from './src/plugins/vuetify'
import routes from './components/routes/Route'
import VueRouter from 'vue-router'
import * as VueGoogleMaps from "vue2-google-maps";
import VueInsProgressBar from 'vue-ins-progress-bar'
import loading from 'vuejs-loading-screen'


window.Vue = require('vue').default;


Vue.use(loading, {
  bg: 'black',
  slot: `
    <div class="px-5 py-3 rounded">
               <img src="/images/logo.jpeg" width='300px' >
        </div>
  `
})

Vue.use(VueInsProgressBar, {
  position: 'fixed',
  show: true,
  height: '5px'
})

Vue.use(VueRouter);
   Vue.use(VueGoogleMaps, {
            load: {
                key: "AIzaSyBzlLYISGjL_ovJwAehh6ydhB56fCCpPQw",
                libraries: "geometry",
            },
        });
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('root-app', require('./components/Index.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


 const opts = {
    icons: {
        iconfont: 'md',  // 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4'
         iconfont: 'mdiSvg',
         iconfont: 'mdi',
         iconfont: 'fa',
         iconfont: 'fa4',
      },
      theme: {
        dark: false,
      },
      themes: {
        light: {
          primary: "#4682b4",
          secondary: "#b0bec5",
          accent: "#8c9eff",
          error: "#b71c1c",
        },
      },    
}
const router = new VueRouter({
  routes,
  mode:'history'
})
const app = new Vue({
    router,
    el: '#app',
    vuetify : new Vuetify(opts),
});
