import Vuex from 'vuex'
import Vue from 'vue'
Vue.use(Vuex)

import pensamientos from './thoughts'
import encryptionModule from './encryption'

const store = new Vuex.Store({
    state: {

    },
    mutations: {

    },
    modules: {
        pensamientos: pensamientos,
        encryption: encryptionModule
    }

})

export default store