import Vue from 'vue';
import VueRouter from 'vue-router';
// import Messages from './components/Messages.vue';
// import Form from './components/Form.vue';
import Example from '../components/ExampleComponent.vue';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [{
            path: '/example',
            name: 'example',
            component: Example,
        },
        // {
        //     path: '/user/:id',
        //     name: 'User',
        //     component: User,
        // },
    ],
});