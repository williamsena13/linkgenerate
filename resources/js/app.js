/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('vc-home', require('./components/Home.vue').default);
Vue.component('vc-contato', require('./components/Contato.vue').default);


Vue.component('vc-index-redirections', require('./components/redirections/Index.vue').default);
Vue.component('vc-create-redirections', require('./components/redirections/Create.vue').default);
Vue.component('vc-modal-redirections', require('./components/redirections/Modal.vue').default);

Vue.component('vc-index-links', require('./components/links/Index.vue').default);
Vue.component('vc-create-links', require('./components/links/Create.vue').default);

const app = new Vue({
    el: '#app',
});
