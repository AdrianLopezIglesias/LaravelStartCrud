<template lang="pug">
v-combobox(
	:items="tags"
	hide-details="auto",
	v-model="tagSelector"
	:dense="true",
	filled
	v-on:change="addInputTag"
)
</template>

<script>
export default {
	props: ['tags'],
	data() {
		return {
			tagSelector: "",
		};
	},
	methods: {
		addInputTag() {
			this.$emit("add-input-tag", this.tagSelector);
			this.tagSelector = "";
		},
	},
};
</script>