<template lang="pug">
div(v-if="selectedThoughts.length > 0")
	v-btn(		
		color="red"
		fab
		small
		@click="openDialog"
	) 
		v-icon() mdi-trash
	DeleteDialog(  ref="deleteDialog" :selectedThoughts="selectedThoughts" )
</template>

<script>
import { mapGetters } from "vuex";
import DeleteDialog from "./DeleteDialog.vue";

export default {
	components: {DeleteDialog},
	props: {
		selectedThoughts: {
			type: Array,
			default: () => [],
		},
	},
	data() {
		return {
		};
	},
	computed: {
		...mapGetters({
		}),
	},
	methods: {
		openDialog(){
			this.$refs.deleteDialog.openDialog()
		},
	},
	watch: {
		selectedThoughts(val) {
			console.log(val)
		},
	},
};
</script>