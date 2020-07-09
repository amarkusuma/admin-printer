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
<<<<<<< HEAD
=======
    },
<<<<<<< HEAD

>>>>>>> 14019f05d6ab53588dd7fbf976718bce3070c0df

    },


<<<<<<< HEAD
=======
=======
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

>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4
    //         //KEMUDIAN AKAN DISIMPAN KE DATABASE SEBAGAI LOG
    //         axios.post('/messages', message).then(response => {
    //             console.log(response.data);
    //         });
    //     },
    // },
>>>>>>> 14019f05d6ab53588dd7fbf976718bce3070c0df
});