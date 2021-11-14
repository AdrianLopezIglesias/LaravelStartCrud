<template lang = "pug">
	div
		v-dialog(v-model="dialog" persistent="" max-width="1200px")
			template(v-slot:activator="{ on, attrs }")
				v-btn(color="primary" dark="" v-bind="attrs" v-on="on")
					| Contratar nuevo tratamiento
			v-card
				v-toolbar(color="primary" dark="") Contratar nuevo tratamiento
				v-card-text
					v-container
						div(v-if="tratamiento")
							TratamientoDetalles(:tratamiento="tratamiento" v-on="on")
						div(v-else)
							TratamientosTable(action="buy" v-on:buy="buy")

				div(v-if="!tratamiento")
					v-card-actions
						v-spacer
						v-btn(color="blue darken-1" text="" @click="dialog = false")
							| Close
		ContratacionesTable(v-bind:paciente="$store.state.paciente")


</template>

<script>
import ContratacionesTable   from "../contrataciones/ContratacionesTable.vue";

import TratamientosTable   from "../tratamientos/TratamientosTable.vue";
import TratamientoDetalles from "../tratamientos/TratamientoDetalles.vue";
export default {
	props     : ['paciente'],
	components: {
    TratamientosTable,
		TratamientoDetalles,
		ContratacionesTable

  },
  data: () => ({
    dialog      : false,
    tratamiento : false,

    activePicker: null,
    date        : null,
    menu        : false,
  }),
  methods: {

		buy(e) {
			this.tratamiento = e;
		},
  },
};
</script>
