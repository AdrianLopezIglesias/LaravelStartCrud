<template lang="pug">
div
	.container-fluid
		div
			v-text-field(
				v-model="value",
				:items="palabras"
				label=""
				filled
				hide-details="auto"
				:dense="true"
				:solo="true"
				multiple
				v-on:keydown="handleKey"
				:delimiters="[' ']"
				v-on:keydown.enter="post()"
			)
			div(class="d-flex flex-row" tile flat)
				div(v-for="item in metadata")
					v-chip(
						class="ma-2"
						close
						small
						color="green"
						outlined
						@click:close="removeMetadataItem(item)"
					) {{item}}
			v-data-table(
				:headers="headers",
				:items="filteredPensamientos",
				:loading="loading",
				limit="200",
				:options="options",
				:dense="true",
				show-select
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
			v-dialog(v-model="editPensamientoDialog" width="500")
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
								small
								color="green"
								outlined
								@click:close="removeMetadataItemEdit(x)"
							) {{x}}
					v-card-actions
						v-spacer
						v-btn(color="danger" @click="closeEditPensamientoDialog") Cancelar
						v-btn(color="primary" @click="submitEditPensamiento") Actualizar
</template>

<script>
import { mapGetters } from "vuex";
import hashtagHelper from '../helpers/hashTag';
import _ from 'lodash'

export default {
	name: "DatatableComponent",
	components: {},
	data() {
		return {
			value: "",
			metadata: [],
			headers: [
				{ text: "Texto", value: "texto" },
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
			pensamientos: "pensamientos/getPensamientos",
			loading: "pensamientos/getLoading",
			palabras: "pensamientos/getPalabras",
			tags: "pensamientos/getTags",
		}),
		filteredPensamientos() {
			let pensamientos = this.pensamientos;
			let metadata = this.metadata;
			let value = this.value;

			if (metadata.length > 0) {
				metadata.forEach(x => {
					pensamientos = pensamientos.filter(
						(pensamiento) => {
							if(_.isArray(pensamiento.metadata)) {
								return pensamiento.metadata.includes(x)
							}
						}
					);
				})
			}

			return pensamientos;

		}
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
		handleKey(e){
		},
		removeMetadataItem(e){
			let index = this.metadata.indexOf(e)
			this.metadata.splice(index, 1)
		},
		removeMetadataItemEdit(e){
			let index = this.pensamientoEditado.metadata.indexOf(e)
			this.pensamientoEditado.metadata.splice(index, 1)
		},
		addMetadataItem(e){
			this.metadata.push(e)
			this.$nextTick(() => {
				this.tagSelector  = ''
			})
		},
		addMetadataItemEdit(e){
			this.pensamientoEditado.metadata.push(e)
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

<style>
    .theme--light.v-data-table tbody tr.v-data-table__selected {
        background: #f5c17d70 !important;
    }
    .theme--dark.v-data-table tbody tr.v-data-table__selected {
        background: #a17b4970 !important;
    }
    .theme--dark.v-data-table tbody tr.v-data-table__selected:hover {
        background: #a17b49c2 !important;
    }
    .theme--light.v-data-table tbody tr.v-data-table__selected:hover {
        background: #ffd296d2 !important;
    }
</style>