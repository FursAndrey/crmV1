require('./bootstrap');

import { createApp } from 'vue';

import App from './components/Home.vue';
import Test_app from './components/Test.vue';

createApp(App).mount('#app');
createApp(Test_app).mount('#test_app');
