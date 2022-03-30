<template lang = "pug">
	div
		v-dialog(v-model="dialog" persistent="" max-width="1200px")
			template(v-slot:activator="{ on, attrs }")
				v-btn(color="primary" dark="" v-bind="attrs" v-on="on")
					| Contratar nuevo servicio

			v-card
				v-toolbar(color="primary" dark="") Contratar nuevo tratamiento
				v-card-text
					v-container
						div(v-if="tratamiento")
							TratamientoDetalles(:tratamiento="tratamiento")
							v-text-field(
								label="Monto a abonar*" 
								:rules="[() => contratacion.valor_pagado >= (tratamiento.valor/2) || 'Debe ser de al menos el 50% del valor total para contratar el servicio']"
								v-model="contratacion.valor_pagado")
						div(v-else)
							TratamientosTable(action="buy" v-on:buy="buy")

				v-card-actions
					v-spacer
					v-btn( color="blue darken-1" text="" @click="dialog = false")
						| Close
					v-btn(v-if="tratamiento"  color="blue darken-1" text="" @click="submit ")
						| Contratar servicio

		ContratacionesTable(v-bind:paciente="$store.state.paciente" :reload="triggerChild")


</template>

<script>
import axios from "axios";

import ContratacionesTable   from "../contrataciones/ContratacionesTable.vue";
import TratamientosTable   from "../tratamientos/TratamientosTable.vue";
import TratamientoDetalles from "../tratamientos/TratamientoDetalles.vue";

export default {
	props     : ['paciente'],
	watch: { 
},
	components: {
    TratamientosTable,
		TratamientoDetalles,
		ContratacionesTable

  },
  data: () => ({
		triggerChild: 0,
    dialog      : false,
    tratamiento : false,
		contratacion: {        
			tratamiento_id: "",
			paciente_id   : "",
			valor_pagado  : ""
		},
    activePicker: null,
    date        : null,
    menu        : false,
  }),
  methods: {
		submit() {
			if(this.contratacion.valor_pagado < (this.tratamiento.valor/2)) {
				this.$vs.notify({
					title: 'Error',
					text : 'Debe ser de al menos el 50% del valor total para contratar el servicio',
					type : 'danger',
					icon : 'error'
				});
				return;
			}else{
				this.dialog = false;
				this.contratacion.tratamiento_id = this.tratamiento.id;
				this.contratacion.paciente_id    = this.paciente.id;
				if(this.contratacion.id) {
					let url = "/api/contratacions/" + this.contratacion.id;
					axios.put(url, this.tratamiento).then((response) => {
						console.log(response);
					});
					this.$store.commit("setPaciente", this.paciente);
				}else{
					this.dialog = false;
					let url = "/api/contratacions";
					axios.post(url, this.contratacion).then((response) => {
						console.log(response);
						this.$emit("pacienteCreado");
					});
				}
				this.triggerChild++;
			}

		},
		buy(e) {
			this.tratamiento = e;
		},
  },
};
</script>
