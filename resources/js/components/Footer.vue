<template lang="pug">
v-footer(app height="72" inset)
	v-text-field(
		v-model="value",
		:items="palabras"
		label=""
		hide-details="auto"
		dense
		flat
		outlined
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
				x-small
				color="green"
				outlined
				@click:close="removeMetadataItem(item)"
			) {{item}}
</template>

<script>
import { mapGetters } from "vuex";
import hashtagHelper from '../helpers/hashTag';
import _ from 'lodash'

export default {
	name: "Footer",
	components: {},
	data() {
		return {

		};
	},
	computed: {
		...mapGetters({
			pensamientos: "pensamientos/getPensamientos",
			loading: "pensamientos/getLoading",
			palabras: "pensamientos/getPalabras",
			tags: "pensamientos/getTags",
		}),
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
		removeMetadataItem(e){
			let index = this.metadata.indexOf(e)
			this.metadata.splice(index, 1)
		},
	},
	mounted() {
	},
};
</script>

