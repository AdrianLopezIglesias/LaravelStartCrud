<template lang="pug">
div(class="d-flex flex-row" tile flat)
	div(v-for="item in inputTags")
		v-chip(
			class="ma-2"
			close
			x-small
			color="green"
			outlined
			@click:close="removeInputTag(item)"
		) {{item}}
</template>

<script>
import { mapGetters } from "vuex";

export default {
	data() {
		return {
		};
	},
	computed: {
		...mapGetters({
			inputTags: "pensamientos/getInputTags",
		}),
	},
	methods: {
		removeInputTag(e) {
			this.$store.commit("pensamientos/removeInputTag", e)
		},
	},
};
</script>