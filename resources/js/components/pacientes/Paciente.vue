<template lang="pug">
div
	.container-fluid
		h1 Paciente
		div
		
</template>

<script>
import axios from "axios";
export default {
	props:['data'],
  data() {
    return {
			nombre_search: "",
			telefono_search: "",
			dni_search: "",
      page: 1,
      totalPassengers: 0,
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
		customSearch() {
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
          this.totalPassengers = response.data.data.total;
          this.numberOfPages = response.data.data.last_page;
        });
		},

  },
  mounted() {
    this.readDataFromAPI();
		console.log(this.data)
  },
};
</script>
