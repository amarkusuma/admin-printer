/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';

//IMPORT KEDUA COMPONENT TERSEBUT
import Messages from './components/Messages.vue';
import Form from './components/Form.vue';
import User from './components/UserComponent.vue';
import ExampleComponent from './components/ChatComponent.vue';
import router from './router';
import Example from './components/ExampleComponent.vue';
import MessageComponent from './components/MessageComponent';

import Vuetify from 'vuetify';

Vue.use(Vuetify);

import 'vuetify/dist/vuetify.min.css';

Vue.component('chat-component', ExampleComponent);
Vue.component('user-component', User);
Vue.component('dw-messages', Messages);
Vue.component('dw-form', Form);
Vue.component('example', Example);
Vue.component('message-component', MessageComponent);
// import VueRouter from 'vue-router';
// Vue.use(VueRouter);

// define routes for users
// const routes = [{
//     path: '/xample',
//     name: 'contoh',
//     component: Example,
// }, ];

// const router = new VueRouter({ routes });

const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify(),
    data: {
        //VARIABLE UNTUK MENAMPUNG DATA PESAN
        messages: [],
    },
    router,

    // //KETIKA FILE INI DI-LOAD ATAU AKAN DI-RENDER OLEH BROWSER
    // created() {
    //     //MAKA AKAN MENJALANKAN FUNGSI fetchMessage()
    //     this.fetchMessages();

    //     //DAN MENGGUNAKAN LARAVEL ECHO, KITA AKSES PRIVATE CHANNEL BERNAMA CHAT YANG NNTINYA AKAN DIBUAT
    //     //KEMUDIAN EVENTNYA KITA LISTEN ATAU PANTAU JIKA ADA DATA YANG DIKIRIM
    //     Echo.private('chat').listen('MessageSent', e => {
    //         //DATA YANG DITERIMA AKAN DITAMBAHKAN KE DALAM VARIABLE MESSAGES SEBELUMNYA
    //         this.messages.push({
    //             message: e.message.message,
    //             user: e.user,
    //         });
    //     });
    // },
    // methods: {
    //     //FUNGSI FETCH MESSAGE UNTUK MEMINTA DATA DARI DATABASE TERKAIT PESAN YANG SUDAH LAMPAU
    //     fetchMessages() {
    //         //MENGGUNAKAN AXIOS UNTUK MELAKUKAN AJAX REQUEST
    //         axios.get('/messages').then(response => {
    //             //SETIAP DATA YANG DITERIMA AKAN DITAMBAHKAN KE VARIABLE MESSAGES
    //             this.messages = response.data;
    //         });
    //     },

    //     //INGAT EMIT YANG DIKIRIM? AKAN DI-HANDLE DISINI
    //     //CARA TRACE-NYA GIMANA? PERHATIKAN FILE CHAT.BLADE.PHP, TERDAPAT ATTRIBUTE v-on:sent="addMessage" DI DALAM TAG DW-FORM
    //     //YANG BERARTI KETIKA EMIT BERNAMA SENT DITERIMA, MAKA AKAN MEMICU FUNGIS addMessage
    //     addMessage(message) {
    //         //PESAN YANG DITERIMA AKAN DITAMBAHKAN KE VARIABLE MESSAGE
    //         this.messages.push(message);

    //         //KEMUDIAN AKAN DISIMPAN KE DATABASE SEBAGAI LOG
    //         axios.post('/messages', message).then(response => {
    //             console.log(response.data);
    //         });
    //     },
    // },
});