/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import '@fortawesome/fontawesome-free/css/all.css'
import Vue from 'vue';

require('./bootstrap');

window.Vue = require('vue');

Vue.component('vc-index', require('./components/Index.vue').default);

Vue.component('vc-home', require('./components/Home.vue').default);
Vue.component('vc-navbar', require('./components/Navbar.vue').default);
Vue.component('vc-contato', require('./components/Contato.vue').default);

Vue.component('vc-requisitos-funcionais', require('./components/requisitos/Funcionais').default);
Vue.component('vc-requisitos-tecnicos', require('./components/requisitos/Tecnicos').default);

Vue.component('vc-index-redirections', require('./components/redirections/Index.vue').default);
Vue.component('vc-create-redirections', require('./components/redirections/Create.vue').default);
Vue.component('vc-modal-redirections', require('./components/redirections/Modal.vue').default);

Vue.component('vc-index-links', require('./components/links/Index.vue').default);
Vue.component('vc-create-links', require('./components/links/Create.vue').default);

const app = new Vue({
    el: '#app',
});
