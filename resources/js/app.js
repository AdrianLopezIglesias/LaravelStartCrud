require('./bootstrap');

window.Vue = require('vue').default;

// Vue.component('home', require('./components/Home.vue').default);
// Vue.component('test', require('./components/Test.vue').default);
Vue.component('App', require('./App.vue').default);

const app = new Vue({
	el: '#app',
	components: { App	}
});
