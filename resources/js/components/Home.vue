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
						td(style={ width: '20%' }) Búsqueda por nombre
						td 
							input.form-control(
								type="text",
								v-model="paciente_search_nombre",
						  	@change="getPacientes"
						  )
					tr
						td(style={ width: '20%' }) Búsqueda por DNI
						td 
							input.form-control(
								type="text",
								v-model="paciente_search_dni",
								@change="getPacientes"
							)
					tr
						td(style={ width: '20%' }) Búsqueda por Teléfono
						td 
							input.form-control(
								type="text",
								v-model="paciente_search_telefono",
								@change="getPacientes"
							)
			br
			table.table
				thead
					tr
						th Nombre 
						th Genero
						th DNI
						th Domicilio
						th Telefono principal
						th Telefono de emergencias
						th Tratamientos
						th Acciones
				tbody
					tr(v-for="(paciente, index) in pacientes", :key="index") 
						td {{ paciente.nombre }}
						td {{ paciente.datospersonales.genero }}
						td {{ paciente.datospersonales.dni }}
						td {{ paciente.datospersonales.domicilio }}
						td {{ paciente.datospersonales.telefono_principal }}
						td {{ paciente.datospersonales.telefono_emergencias }}
						td {{ paciente.datospersonales.telefono_emergencias }}
						td
							a(class="btn btn-outline-secondary" :href="'/pacientes/'+paciente.id") 			
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      pacientes: [],
      paciente_search_nombre: "",
      paciente_search_dni: "",
      paciente_search_telefono: "",
    };
  },
  mounted() {
    this.getPacientes();
  },
  methods: {
    getPacientes() {
			let url =  "/api/pacientes" 
			url += "?nombre=" + this.paciente_search_nombre
			url += "&dni=" + this.paciente_search_dni
			url += "&telefono=" + this.paciente_search_telefono
			console.log(url)
      return axios
        .get(url)
        .then((x) => {
					console.log(x.data.data.data)
          this.pacientes = x.data.data.data;
        });
    },
  },
};
</script>
