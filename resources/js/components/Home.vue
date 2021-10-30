<template lang="pug">
div
	.container-fluid
		div
			br
			h2 ACE
			br
			table.table
				tbody
					tr
						td(style={width: '20%'}) Búsqueda por nombre
						td 
							input(type='text' class='form-control' v-model='paciente_search_nombre' @change="getPacientes")
			br
			table.table
				thead
					th
						td Nombre del paciente
				tbody
					tr(v-for="(paciente, index) in pacientes" :key="index") 
						td {{paciente.nombre}}
</template>

<script>
import axios from 'axios'
export default {
  data() {
    return {
      pacientes: [],
			paciente_search_nombre: ""
    };
  },
  mounted() {
		this.getPacientes()
		console.log(this.paciente_search_nombre)
  },
  methods: {
		getPacientes(){
			console.log(this.paciente_search_nombre)
			if(this.paciente_search_nombre != ""){
				return axios.get('/api/pacientes?nombre=' + this.paciente_search_nombre).then(x => {this.pacientes = x.data.data.data; console.log(x)})
			}
			axios.get('/api/pacientes').then(x => {this.pacientes = x.data.data.data; console.log(x)})
		}
	}
}
</script>
