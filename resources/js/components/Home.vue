<template lang="pug">
div
  .container-fluid
    div
      br
      h2 ACE
      br
      table.table
        tbody
          tr
            td(style={ width: '20%' }) Búsqueda por nombre
            td 
              input.form-control(
                type="text",
                v-model="paciente_search_nombre",
                @change="getPacientes"
              )
          tr
            td(style={ width: '20%' }) Búsqueda por DNI
            td 
              input.form-control(
                type="text",
                v-model="paciente_search_dni",
                @change="getPacientes"
              )
      br
      table.table
        thead
          th
            td Nombre del paciente
        tbody
          tr(v-for="(paciente, index) in pacientes", :key="index") 
            td {{ paciente.nombre }}
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      pacientes: [],
      paciente_search_nombre: "",
      paciente_search_dni: "",
    };
  },
  mounted() {
    this.getPacientes();
  },
  methods: {
    getPacientes() {
      console.log(this.paciente_search_nombre);
      return axios
        .get(
          "/api/pacientes?nombre=" +
            this.paciente_search_nombre +
            "&dni=" +
            this.paciente_search_dni
        )
        .then((x) => {
          this.pacientes = x.data.data.data;
        });
    },
  },
};
</script>
