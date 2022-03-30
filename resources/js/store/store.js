import Vuex from 'vuex'
import Vue from 'vue'
Vue.use(Vuex)

import pensamientos from './pensamientos'

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