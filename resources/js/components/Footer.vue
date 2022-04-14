<template lang="pug">
v-footer(app height="72" inset)
	DeleteButton( :selectedThoughts="selectedThoughts" )
	ThoughtEditor
	Tags( )
	div(class="d-flex flex-row" tile flat)
		div(v-for="item in excludedTags")
			v-chip(
				class="ma-2"
				close
				x-small
				color="red"
				outlined
				@click:close="removeExcludedTag(item)"
			) {{item}}
</template>

<script>
import { mapGetters } from "vuex";
import _ from 'lodash'
import ThoughtEditor from "./ThoughtEditor.vue";
import DeleteButton from "./DeleteButton.vue";
import Tags from "./Tags.vue";

export default {
	components: {ThoughtEditor, Tags, DeleteButton},
	data() {
		return {
			input: "",
			localInputTags: [],
			localExcludedTags: [],
			deleteDialog: false,
		};
	},
	computed: {
		...mapGetters({
			words: "pensamientos/getWords",
			tags: "pensamientos/getTags",
			inputTags: "pensamientos/getInputTags",
			inputValue: "pensamientos/getInputValue",
			excludedTags: "pensamientos/getExcludedTags",
			selectedThoughts: "pensamientos/getSelectedThoughts",
		}),
	},
	watch: {
		inputTags(val) {
			this.localInputTags = val;
		},
		excludedTags(val) {
			this.localExcludedTags = val;
		},
	},
	methods: {
		removeInputTag(e) {
			this.$store.commit("pensamientos/removeInputTag", e)
		},
		removeExcludedTag(e) {
			this.$store.commit("pensamientos/removeExcludedTag", e)
		},

	},
	mounted() {
	},
};
</script>

