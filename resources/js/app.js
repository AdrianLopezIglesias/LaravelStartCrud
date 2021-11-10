require('./bootstrap');

window.Vue = require('vue').default;
import VueRouter from 'vue-router';

import routes from './routes/routes';
import Vue from 'vue'
import vuetify from "./vuetify";

import App from "./App.vue";
const router = new VueRouter({ mode: 'history', routes });


const app = new Vue({
	el: '#app',
	components: { App },
	router,
	vuetify,
  template: "<App/>"
});
