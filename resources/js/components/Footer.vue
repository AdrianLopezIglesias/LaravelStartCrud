<template lang="pug">
v-footer(app height="72" inset)
	v-text-field(
		v-model="value",
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
		div(v-for="item in inputTags")
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
			value: "",
		};
	},
	computed: {
		...mapGetters({
			loading: "pensamientos/getLoading",
			words: "pensamientos/getWords",
			tags: "pensamientos/getTags",
			filteredThoughts: "pensamientos/getFilteredThoughts",
			inputTags: "pensamientos/getInputTags",
			inputValue: "pensamientos/getInputValue",
		}),
	},
	watch: {},
	methods: {
		post() {
			// this.inputTags = this.inputTags.concat(hashtagHelper.getHashTag(this.value))
			// this.value = hashtagHelper.removeHashTag(this.value)
			// this.$store.dispatch("pensamientos/post", {
			// 	texto: this.value,
			// 	inputTags: this.inputTags,
			// });
			// this.value = "";
		},
		removeMetadataItem(e){
			let index = this.inputTags.indexOf(e)
			this.inputTags.splice(index, 1)
		},
		handleKey(e){

		}
	},
	mounted() {
	},
};
</script>

