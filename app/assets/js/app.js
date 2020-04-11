require('../css/app.css');

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

import Vue from 'vue';
import App from './App.vue';

new Vue({
    el: '#app',
    render: h => h(App)
});