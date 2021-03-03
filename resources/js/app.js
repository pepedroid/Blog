/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// importamos js routing vue
import router from './routes/router.js';
import store from './store/store.js';

import moment from './moment/moment.js'

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//ESTOS COMPONENTES SON LA ESTRUCTURA DE LA PÁGINA WEB
Vue.component('nav-component',require('./components/content/NavComponent.vue').default);
Vue.component('header-component',require('./components/content/HeaderComponent.vue').default);

Vue.component('about-component',require('./components/content/AboutComponent.vue').default);

Vue.component('example-component', require('./components/content/ExampleComponent.vue').default);
Vue.component('login-form-component', require('./components/LoginComponent.vue').default);
Vue.component('registro-form-component', require('./components/RegistroComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.mixin({
    data: function() {
      return {
        globalVar:'global'
      }
    }
  })





const app = new Vue({
    data:{
        title:''
    },
    el: '#app',
    router,
    store,
    moment,
    watch: {
        '$route' (to, from) {
          document.title = to.meta.title || 'Blog'
        }
      },
});
