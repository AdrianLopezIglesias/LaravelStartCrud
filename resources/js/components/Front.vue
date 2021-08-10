<template>
  <div>
  123
    <li v-for="teclado in teclados" :key="teclado.id">
      {{ teclado.nombre }}
    </li>
  </div>
</template>

<script>

export default {
  data: function () {
    return {
      teclados: [{ id: 1, nombre: "Ruben" }],
    };
  },
  mounted() {
  },
  async created(){
   this.teclados = await this.$api.teclados.fetch({});
  //  this.teclados = this.teclados.data;
  
  },
  methods: {
    loadTeclados: function () {
    },
  },
};
</script>
