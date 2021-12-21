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

			v-card-actions
				v-spacer

							
</template>
<script>
import _ from "lodash";


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

	},

	mounted() {
		this.paciente = _.cloneDeep(this.$store.state.paciente)
	}
}	
</script>

