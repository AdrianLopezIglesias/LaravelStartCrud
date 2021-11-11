import Vue from 'vue'
import VueRouter from 'vue-router';
import routes from './routes/routes';
import vuetify from "./vuetify";

import App from "./App.vue";
const router = new VueRouter({ mode: 'history', routes });
import store from './store/store'
Vue.use(VueRouter);

new Vue({
  render: h => h(App),
  router,
	vuetify,
	store: store
}).$mount('#app');

