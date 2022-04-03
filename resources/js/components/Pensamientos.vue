<template lang="pug">
.container-fluid
	v-data-table(
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
			div(v-on:click="editPensamiento(item)") {{item.texto}}
		template(v-slot:item.metadata="{item}")
			div(class="d-flex flex-row" tile flat)
				div(v-for="x in item.metadata")
					v-chip(
						class="ma-2"
						x-small
						outlined
						@click="addMetadataItem(x)"
					) {{x}}
	//- v-dialog(v-model="editPensamientoDialog" width="500")
		v-card
			v-card-text
				br
				v-textarea(
					v-model="pensamientoEditado.texto",
					:items="palabras"
					label=""
					filled
					hide-details="auto"
					:dense="true"
					:solo="true"
					multiple
					:delimiters="[' ']"
					v-on:keydown.enter="post()"
				)
				v-combobox(
					:items="tags"
					hide-details="auto",
					v-model="tagSelector"
					:dense="true",
					filled
					v-on:change="addMetadataItemEdit"
				)
				template(v-for="x in pensamientoEditado.metadata")
					v-chip(
						class="ma-2"
						close
						x-small
						color="green"
						outlined
						@click:close="removeMetadataItemEdit(x)"
					) {{x}}
			v-card-actions
				v-spacer
				v-btn(color="danger" @click="closeEditPensamientoDialog") Cancelar
				v-btn(color="primary" @click="submitEditPensamiento") Actualizar
	Footer
</template>

<script>
import { mapGetters } from "vuex";
import hashtagHelper from '../helpers/hashTag';
import _ from 'lodash'
import Footer from "./Footer.vue";

export default {
	name: "DatatableComponent",
	components: {Footer},
	data() {
		return {
			value: "",
			metadata: [],
			headers: [
				{ text: "Texto", value: "texto", width:"70%" },
				{ text: "Metadata", value: "metadata" },
			],
			options: {
				itemsPerPage: 5000,
			},
			tagSelector: "",
			editPensamientoDialog: false,
			pensamientoEditado: {
				id: 0,
				texto: "",
				metadata: [],
			},

		};
	},
	computed: {
		...mapGetters({
			loading: "pensamientos/getLoading",
			words: "pensamientos/getWords",
			tags: "pensamientos/getTags",
			filteredThoughts: "pensamientos/getFilteredThoughts",
		}),
		showSelect() {
			return false;
		},

	},
	watch: {},
	methods: {
		post() {
			this.metadata = this.metadata.concat(hashtagHelper.getHashTag(this.value))
			this.value = hashtagHelper.removeHashTag(this.value)
			this.$store.dispatch("pensamientos/post", {
				texto: this.value,
				metadata: this.metadata,
			});
			this.value = "";
		},
		getData() {
			this.$store.dispatch("pensamientos/get");
		},
		addMetadataItem(e){
			this.metadata.push(e)
			this.$nextTick(() => {
				this.tagSelector  = ''
			})
		},
		selectRow(item, row) {      
			let selectState = (row.isSelected) ? false : true;
			row.select(selectState);
		},
		editPensamiento(p){
			console.log(p)
			this.pensamientoEditado = _.cloneDeep(p); 
			this.editPensamientoDialog = true; 
		},
		closeEditPensamientoDialog(p){
			this.editPensamientoDialog = false; 
		},
		submitEditPensamiento(p){
			this.editPensamientoDialog = false; 
			this.$store.dispatch("pensamientos/patch", {
				id: this.pensamientoEditado.id,
				texto: this.pensamientoEditado.texto,
				metadata: this.pensamientoEditado.metadata,
			});
		}

	},

	mounted() {
		this.getData();
	},
};
</script>