import Vue from 'vue'
import App from './App.vue'
//import Vue Router
import VueRouter from 'vue-router'



//menggunkan Vue Router di Vue JS
Vue.use(VueRouter);

// Importa Bootstrap
import 'bootstrap/dist/css/bootstrap.css'
import 'jquery/dist/jquery.min'
import 'popper.js/dist/popper.min'
import 'bootstrap/dist/js/bootstrap.min'

//import components

import Home from './components/Home';

import LinksIndex from './components/links/Index';
import LinksCreate from './components/links/Create'
import LinksEdit from './components/links/Edit'

import GridItens from './components/links/GridItens'


Vue.component('grid-itens', GridItens)

Vue.config.productionTip = false

const router = new VueRouter({
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
        path: '/links',
        name: 'index',
        component: LinksIndex
      },
    {
      path: '/create',
      name: 'create',
      component: LinksCreate
    },
    {
      path: '/edit/:id',
      name: 'edit',
      component: LinksEdit
    }
  ],
  mode: 'history'
})

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
