import Vuex from 'vuex'
import Vue from 'vue'
Vue.use(Vuex)

import pensamientos from './thoughts'

const store = new Vuex.Store({
	state: {

	},
	mutations: {

	},
	modules: {
		pensamientos: pensamientos
	}

})

export default store