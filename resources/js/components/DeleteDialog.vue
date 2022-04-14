DeleteDialog<template lang="pug">
v-dialog(v-model="dialog" width="500")
	v-card
		v-card-text
			p Eliminar las siguientes entradas: 		
			ul(v-for="item in selectedThoughts")
				li {{item.texto}}
		v-card-actions
			v-spacer
			v-btn(color="primary" @click="submit") Aceptar
</template>

<script>
import { mapGetters } from "vuex";

export default {
	data() {
		return {
			dialog: false
		};
	},
	methods: {
		submit(e) {
			this.$store.dispatch("pensamientos/deleteSelectedThoughts");
			this.dialog = false;
		},
		openDialog(){
			this.dialog = true;
		}
	},
	props: {
		selectedThoughts: {
			type: Array,
			default: () => [],
		},
	},
};
</script>