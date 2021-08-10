require('./bootstrap');


window.Vue = require('vue');
import "./plugins/mixins";

Vue.component('front-page', require('./components/Front.vue').default);

const app = new Vue({
  el: '#app',
});