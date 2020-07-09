/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import 'vuetify/dist/vuetify.min.css';
import CKEditor from '@ckeditor/ckeditor5-vue';

//IMPORT KEDUA COMPONENT TERSEBUT
import Messages from './components/Messages.vue';
import Form from './components/Form.vue';
import ChatPrivate from './components/ChatComponent.vue';
import router from './router';
import Example from './components/ExampleComponent.vue';
import MessageComponent from './components/MessageComponent';
import InputPostingan from './components/InputPostingan';
import Coba from './components/CobaComponent';
import UserProfile from './components/UserProfile';
import Vuetify from 'vuetify';



Vue.use(Vuetify);
Vue.use(CKEditor);



Vue.component('chat-private', ChatPrivate);
Vue.component('dw-messages', Messages);
Vue.component('dw-form', Form);
Vue.component('example', Example);
Vue.component('message-component', MessageComponent);
Vue.component('input-postingan', InputPostingan);
Vue.component('coba', Coba);
Vue.component('user-profile', UserProfile);
// import VueRouter from 'vue-router';
// Vue.use(VueRouter);

// define routes for users
// const routes = [{
//     path: '/xample',
//     name: 'contoh',
//     component: Example,
// }, ];

// const router = new VueRouter({ routes });
Pusher.log = function(message) { window.console.log(message); }
const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify(),
    data: {
        //VARIABLE UNTUK MENAMPUNG DATA PESAN
        messages: [],

    },


});