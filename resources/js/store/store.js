import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)
import axios from "axios";


const store = new Vuex.Store({
  state: {
		count: 0,
		paciente: {
			loading: true
		}
  },
  mutations: {
    increment (state) {
      state.count++
		},
		setPaciente(state, paciente) { 
			state.paciente = paciente
		},
		findPaciente(state, id) {
			let url = "/api/pacientes/"+id;
      console.log("🚀 ~ file: store.js ~ line 24 ~ findPaciente ~ id", id)
      axios.get(url)
				.then((response) => {
					state.paciente = response.data.data
        });
		},
  }
})

export default store