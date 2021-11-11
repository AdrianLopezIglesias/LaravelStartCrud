<template lang="pug">
div
	.container-fluid
		h1 Paciente
		div
		v-card
			v-tabs(background-color="teal" dark vertical)
				v-tabs-slider(color="teal")
				v-tab Agenda
				v-tab Datos personales
				v-tab Contrataciones
				v-tab Comunicaciones
				v-tab Datos comerciales
				v-tab-item
					v-card(flat)
						v-card-text
							PacienteAgenda
				v-tab-item(flat)
					v-card
						v-card-text
							PacienteDatosPersonales(v-bind:paciente="$store.state.paciente") 

</template>

<script>
import PacienteAgenda from './PacienteAgenda'
import PacienteDatosPersonales from './PacienteDatosPersonales'
export default {
	props:['data'],
	components: {
		PacienteAgenda,
		PacienteDatosPersonales,
	},
  data() {
    return {
      loading: true,
    };
  },

  methods: {
  },
  async mounted() {
		await this.$store.commit('findPaciente', this.$route.params.id);
		console.log(this.paciente)
  },
};
</script>
