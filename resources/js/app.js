/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'Vuex';
Vue.use(Vuex);

//Vuex
const store = new Vuex.Store({
  state:{
    item:{}
  },
  mutations:{
    setItem(state,obj){
      state.item = obj;
    }
  }
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('navbar', require('./components/Navbar.vue').default); //Menu do site
Vue.component('dashboard', require('./components/backend/Dashboard.vue').default); //Dashboad simples do ADMIN
Vue.component('widgets', require('./components/backend/Widgets.vue').default); //Widgets do ADMIN
Vue.component('box', require('./components/backend/Box.vue').default); //Box do ADMIN
Vue.component('modal', require('./components/modal/Modal.vue').default); //Modal do ADMIN
Vue.component('modallink', require('./components/modal/ModalLink.vue').default); //LinkModal do ADMIN
Vue.component('formulario', require('./components/backend/Formulario.vue').default); //Modelo Formuláro do ADMIN
Vue.component('tabela-lista', require('./components/backend/TabelaLista.vue').default); //Lista de tabela para exibir no backend
Vue.component('base-auto', require('./components/BaseAuto.vue').default); //A base e um conjuto de itens para facilitar no uso do Bootstrap
Vue.component('card', require('./components/Card.vue').default); //Card para exibir os artigos


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store
});
