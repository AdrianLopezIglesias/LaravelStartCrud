<template lang="pug">
div
	.container-fluid
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
import PacienteDatosPersonalesForm from './PacienteDatosPersonalesForm'
import axios from "axios";

export default {
  name: "DatatableComponent",
	components: {PacienteDatosPersonalesForm},
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
        { text: "Nombre", value: "nombre" },
        { text: "DNI", value: "datospersonales.dni" },
        { text: "Telefono", value: "datospersonales.telefono_principal" },
        { text: "Telefono alternativo", value: "datospersonales.telefono_emergencias" },
        { text: "Contrataciones", value: "contrataciones" },
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
			let url = "/api/pacientes?page=" +page + "&nombre=" + this.nombre_search + "&telefono=" + this.telefono_search + "&dni=" + this.dni_search;
      axios.get(url)
        .then((response) => {
          this.loading = false;
          this.pacientes = response.data.data.data;
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
