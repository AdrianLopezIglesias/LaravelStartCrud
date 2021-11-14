<template lang="pug">
div
	.container-fluid
		h1 Servicios contratados
		div
			v-text-field(
				v-model="nombre_search"
				label="Búsqueda por nombre"
				hide-details="auto"
				v-on:change="customSearch()"
			)

			br
			v-data-table(
				@click:row="selectRow"
				:headers="headers"
				:items="pacientes"
				:loading="loading"
				item-key="id"
				loading-text="Loading... Please wait"
				:server-items-length="totalPacientes"
				:options.sync="options"
				class="elevation-1"
				)
</template>

<script>
import axios from "axios";

export default {
	props: ['paciente'],
	components: {},
  data() {
    return {
			nombre_search: "",
			telefono_search: "",
			dni_search: "",
      page: 1,
      totalPacientes: 0,
      numberOfPages: 0,
      pacientes: [],
      loading: true,
      options: {},
      headers: [
        { text: "Valor abonado", value: "valor_pagado" },
        { text: "Tratamiento", value: "tratamiento.nombre" },
        { text: "Citas agendadas", value: "citas" },
        { text: "Sesiones totales del tratamiento", value: "tratamiento.sesiones" },
        { text: "Duración de sesiones del tratamiento", value: "tratamiento.duracion" },
      ],
    };
  },
  watch: {
    options: {
      handler() {
				this.loading = true; 
        this.readDataFromAPI();
      },
    deep: true,
    },
  },
  methods: {
		selectRow(e){
			this.$store.commit('setPaciente', e);
			this.$router.push({ name: 'Paciente', params: {id: e.id, data: e } })
		},
		customSearch() {
			this.options.page = 1
			this.loading = true; 
			this.readDataFromAPI();
		},
		readDataFromAPI() {
			axios
      const { page, itemsPerPage } = this.options;
			let url = "/api/contratacions?page=" +page + "&paciente_id=" + this.paciente.id;
      axios.get(url)
        .then((response) => {
          console.log("🚀 ~ file: ContratacionesTable.vue ~ line 89 ~ .then ~ response", response)
          this.loading = false;
          this.pacientes = response.data.data.data;
          console.log("🚀 ~ file: ContratacionesTable.vue ~ line 81 ~ .then ~ response.data.data.data", response.data.data.data)
          this.totalPacientes = response.data.data.total;
          this.numberOfPages = response.data.data.last_page;
        });
		},

  },
  mounted() {
    this.readDataFromAPI();
  },
};
</script>
