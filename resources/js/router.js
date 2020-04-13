import Vue from 'vue';
import VueRouter from 'vue-router';
// import Messages from './components/Messages.vue';
// import Form from './components/Form.vue';
import Example from './components/ExampleComponent.vue';

Vue.use(VueRouter);

const routes = [{
    path: '/xample',
    name: 'contoh',
    component: Example,
}, ];

const router = new VueRouter({ routes });

export default router;