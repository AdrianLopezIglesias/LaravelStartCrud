import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)
import axios from "axios";


const store = new Vuex.Store({
  state: {
		count: 0,
		paciente: {
			loading: true,
			datospersonales: {
				fecha_nacimiento: '',
			}
		},
		valor_pagado: 0, 
  },
  mutations: {
    setValorPagado (state, value) {
			state.valor_pagado = value
		},
		async savePaciente(state, paciente) { 
			let url = "/api/pacientes/"+id;
      let response = await axios.post(url, paciente);
		},
		setPaciente(state, paciente) { 
			state.paciente = paciente
		},
		async findPaciente(state, id) {
			let url = "/api/pacientes/"+id;
			console.log("🚀 ~ file: store.js ~ line 24 ~ findPaciente ~ id", id)
			let response = await axios.get(url)
			state.paciente = response.data.data
		},
	}

})

export default store