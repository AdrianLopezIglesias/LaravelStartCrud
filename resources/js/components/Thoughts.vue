<template lang="pug">
.container-fluid( ref="container" )
	EditKeyDialogVue
	v-data-table(
		v-model="localSelectedThoughts",
		:headers="headers",
		:items="filteredThoughts",
		:loading="loading",
		limit="200",
		:options="options",
		:dense="true",
		:show-select="showSelect"
		hide-default-footer
		loading-text="Loading... Please wait",
		:hide-default-header="true"
		)
		template(v-slot:item.texto="{item}")
			div(
				v-on:click="editThought(item)"
			) {{item.texto}}
		template(v-slot:item.tags="{item}")
			div(class="d-flex flex-row" tile flat)
				div(v-for="x in item.tags")
					v-chip(
						x-small
						outlined
						@click="addInputTag(x)"
						@contextmenu="addExcludedTag($event, x)"
					) {{x}}
	EditThoughtDialog
	Footer
</template>

<script>
import { mapGetters } from "vuex";
import _ from 'lodash'
import Footer from "./Footer.vue";
import EditThoughtDialog from "./EditThoughtDialog.vue";
import EditKeyDialogVue from "./EditKeyDialog.vue";

export default {
	components: {Footer, EditThoughtDialog, EditKeyDialogVue},
	data() {
		return {
			headers: [
				{ text: "Texto", value: "texto", width:"70%" },
				{ text: "tags", value: "tags", width: "20%" },
			],
			options: {
				itemsPerPage: 5000,
			},
			localSelectedThoughts: [],
		};
	},
	computed: {
		...mapGetters({
			loading: "pensamientos/getLoading",
			filteredThoughts: "pensamientos/getFilteredThoughts",
			selectedThoughts: "pensamientos/getSelectedThoughts",
		}),
		showSelect() {
			return true;
		},
	},
	watch: {
		filteredThoughts:{
			handler() {
				const container = this.$refs.container;
				this.$vuetify.goTo(container.scrollHeight*this.filteredThoughts.length)
			},
		},
		localSelectedThoughts: {
			handler() {
				this.$store.commit("pensamientos/setSelectedThoughts", this.localSelectedThoughts);
			}
		},
		selectedThoughts: {
			handler() {
				console.log(this.selectedThoughts)
				this.localSelectedThoughts = this.selectedThoughts;
			}
		},
	},
	methods: {
		getData() {
			this.$store.dispatch("pensamientos/get");
		},
		selectRow(item, row) {      
			let selectState = (row.isSelected) ? false : true;
			row.select(selectState);
		},
		editThought(p) {
			this.$store.commit("pensamientos/setEditThought", p);
			this.$store.commit("pensamientos/setEditDialog", true);
		},
		addInputTag(tag){
			this.$store.commit("pensamientos/addInputTag", tag);
		},
		addExcludedTag(event, tag){
			event.preventDefault();
			this.$store.commit("pensamientos/addExcludedTag", tag);
		},
	},
	mounted() {
		this.getData();
	},
};
</script>
