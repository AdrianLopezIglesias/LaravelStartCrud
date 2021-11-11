<template lang="pug">
div
	v-simple-table
		template(v-slot:default="")
			tbody
				tr
					td Nombre
					td {{ paciente.nombre }}
				tr
					td Fecha de nacimiento
					td {{ paciente.datospersonales.fecha_nacimiento }}
				tr
					td Género
					td {{ paciente.datospersonales.genero }}
				tr
					td DNI
					td {{ paciente.datospersonales.dni }}
				tr
					td Teléfono principal
					td {{ paciente.datospersonales.telefono_principal }}
				tr
					td Teléfono de emergencias
					td {{ paciente.datospersonales.telefono_emergencias }}
				tr
					td Dirección de e-mail
					td {{ paciente.datospersonales.email }}

</template>

<script>
export default {
	props:['paciente'],
  data() {
    return {
    };
  },
	  mounted() {
		console.log(this.paciente)
  },
};
</script>
