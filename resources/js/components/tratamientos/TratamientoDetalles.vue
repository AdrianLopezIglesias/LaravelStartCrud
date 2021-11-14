<template lang="pug">
v-simple-table
		template(v-slot:default="")
			tbody
				tr
					td Area
					td {{ tratamiento.area.nombre }}
				tr
					td Nombre
					td {{ tratamiento.nombre }}
				tr
					td Descripcion
					td {{ tratamiento.descripcion }}
				tr
					td Sesiones
					td {{ tratamiento.sesiones }}
				tr
					td Duración de cada sesión
					td {{ tratamiento.duracion }}
				tr
					td Valor
					td {{ tratamiento.valor }}
				tr
					td Monto abonado

					v-text-field(
						label="Monto abonado*" 
						:rules="[() => contratacion.valor_pagado >= (tratamiento.valor/2) || 'Debe ser de al menos el 50% del valor total para contratar el servicio']"
						v-model="contratacion.valor_pagado"
						@click:append="show4 = !show4")
			v-card-actions
				v-spacer
					v-btn(color="blue darken-1" text="" @click="submit ")
						| Contratar servicio
							
</template>
<script>
import _ from "lodash";
import axios from "axios";


export default {
  props: {
    mensaje: {
      type: String,
      default: "String value",
    },
    tratamiento: {
      type: Object,
      default() {
        return {
					nombre: "",
          area: {
            nombre: ""
          },
        };
      },
    },
  },

	components: {
		
	},

	data() {
		return {
			paciente: {},
			contratacion: {        
				tratamiento_id: "",
				paciente_id   : "",
				valor_pagado  : ""
			},
		}
	},

	computed: {
		
	},

	methods: {
		submit() {
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
		},
	},

	mounted() {
		this.paciente = _.cloneDeep(this.$store.state.paciente)
	}
}	
</script>

