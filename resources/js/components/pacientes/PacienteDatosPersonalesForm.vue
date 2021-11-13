<template lang="pug">
v-dialog(v-model="dialog" persistent="" max-width="600px")
		template(v-slot:activator="{ on, attrs }")
			v-btn(color="primary" dark="" v-bind="attrs" v-on="on")
				| Editar datos personales
		v-card
			v-toolbar(color="primary" dark="") Editar datos personales
			v-card-text
				v-container
					v-row
						v-col(cols="12")
							v-text-field(label="Nombre*" required="" v-model="paciente.nombre")
						v-col(cols="4")
							v-text-field(label="Dia Nacimiento*" required="" v-model="fecha_nacimiento_dia")
						v-col(cols="4")
							v-text-field(label="Mes Nacimiento*" required="" v-model="fecha_nacimiento_mes")
						v-col(cols="4")
							v-text-field(label="Año nacimiento*" required="" v-model="fecha_nacimiento_ano")

						v-col(cols="12" sm="6")
							v-select(
								v-model="paciente.datospersonales.genero" 
								:items="generos" 
								item-text="text" 
								item-value="text" 
								label="Género" 
								single-line="")

						v-col(cols="12")
							v-text-field(label="DNI*" required="" v-model="paciente.datospersonales.dni")
						v-col(cols="12")
							v-text-field(label="Teléfono principal*" required="" v-model="paciente.datospersonales.telefono_principal")
						v-col(cols="12")
							v-text-field(label="Teléfono de emergencias*" required="" v-model="paciente.datospersonales.telefono_emergencias")
								
			v-card-actions
				v-spacer
				v-btn(color="blue darken-1" text="" @click="dialog = false")
					| Close
				v-btn(color="blue darken-1" text="" @click="submit ")
					| Save
</template>

<script>
  import moment from 'moment'
import _ from "lodash";
import axios from "axios"

export default {
  data: () => ({
    dialog: false,
    activePicker: null,
    date: null,
    menu: false,
		generos: [
			{id: 1, text: "Masculino"},
			{id: 2, text: "Femenino"},
			{id: 3, text: "Otros"}
		]
  }),
  watch: {
    menu(val) {
      val && setTimeout(() => (this.activePicker = "YEAR"));
    },
  },
  computed: {
		fecha_nacimiento_dia: {
			get() {
				return this.paciente.datospersonales.fecha_nacimiento.split("/")[0]
			},
			set(value){
				let fecha_nacimiento = this.paciente.datospersonales.fecha_nacimiento.split("/")
				fecha_nacimiento[0] = value
				this.paciente.datospersonales.fecha_nacimiento = fecha_nacimiento.join("/")
			}
		},
		fecha_nacimiento_mes: {
			get() {
				return this.paciente.datospersonales.fecha_nacimiento.split("/")[1]
			},
			set(value){
				let fecha_nacimiento = this.paciente.datospersonales.fecha_nacimiento.split("/")
				fecha_nacimiento[1] = value
				this.paciente.datospersonales.fecha_nacimiento = fecha_nacimiento.join("/")
			}
		},
		fecha_nacimiento_ano: {
			get() {
				return this.paciente.datospersonales.fecha_nacimiento.split("/")[2]
			},
			set(value){
				let fecha_nacimiento = this.paciente.datospersonales.fecha_nacimiento.split("/")
				fecha_nacimiento[2] = value
				this.paciente.datospersonales.fecha_nacimiento = fecha_nacimiento.join("/")
			}
		},
    paciente: {
      get() {
        return _.cloneDeep(this.$store.state.paciente);
      },
    },
  },

  methods: {
    submit() {
			this.dialog = false; 
			let url = "/api/pacientes/"+this.paciente.id;
      axios.put(url, this.paciente).then(response => {
				console.log(response)
			})
			this.$store.commit('setPaciente', this.paciente);
    },

  },

  mounted() {
    // console.log("🚀 ~ file: PacienteDatosPersonalesForm.vue ~ line 51 ~ mounted ~ this.$store.state.paciente", this.$store.state.paciente)
    // this.paciente = _.cloneDeep(this.$store.state.paciente);
  },
};
</script>
