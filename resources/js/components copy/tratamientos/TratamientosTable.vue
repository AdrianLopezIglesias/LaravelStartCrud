<template lang="pug">
div
	.container-fluid
		h1 Tratamientos
		div
			v-text-field(
				v-model="nombre_search"
				label="Búsqueda por nombre"
				hide-details="auto"
				v-on:change="customSearch()"
			)

			v-select(
				:items="areas"
				item-text="nombre" 
				item-value="id" 
				v-model="area_search"
				label="label"
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
				:server-items-length="totalPassengers"
				:options.sync="options"
				class="elevation-1"
				)
</template>

<script>
import axios from "axios";
export default {
  props: {
    action: {
      type: String,
      default: "show",
    },
},
  name: "DatatableComponent",
  data() {
    return {
			nombre_search: "",
			area_search: "",
      page: 1,
			areas: [],
      totalPassengers: 0,
      numberOfPages: 0,
      pacientes: [],
      loading: true,
      options: {},
      headers: [
        { text: "Nombre", value: "nombre", sort:"false" },
        { text: "Descripcion", value: "descripcion_corta", align: ' d-none d-lg-table-cell' },
        { text: "Sesiones", value: "sesiones" },
        { text: "Valor", value: "valor" },
        { text: "Área", value: "area.nombre" },
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
			switch (this.action) {
				case 'show':
					this.$store.commit('setPaciente', e);
					this.$router.push({ name: 'Paciente', params: {id: e.id, data: e } })
					break;
				case 'buy':
					console.log(e.id)
					this.$emit('buy', e)
					break;
			
				default:
					break;
			}
		},
		customSearch() {
      this.options.page = 1
			this.loading = true; 
			this.readDataFromAPI();
		},
		readDataFromAPI() {
			axios
      const { page, itemsPerPage } = this.options;
			let url = "/api/tratamientos?page=" +page + "&nombre=" + this.nombre_search + "&area=" + this.area_search;
      axios.get(url)
        .then((response) => {
          this.loading = false;
          this.pacientes = response.data.data.data;
          this.totalPassengers = response.data.data.total;
          this.numberOfPages = response.data.data.last_page;
        });
		},
		getAreas(){
      axios.get("/api/areas")
        .then((response) => {
          this.areas = response.data.data;
          console.log("🚀 ~ file: TratamientosTable.vue ~ line 99 ~ .then ~ this.areas", this.areas)
        });
		}
  },
  mounted() {
		this.getAreas()
    this.readDataFromAPI();
  },
};
</script>
