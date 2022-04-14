<template lang="pug">
v-text-field(
	v-model="input",
	v-on:keyup="handleKey"
	v-on:keydown.enter="post()"
	label=""
	hide-details="auto"
	dense
	flat
	outlined
	:color="formColor"
	solo
)
</template>

<script>
import { mapGetters } from "vuex";
import hashtagHelper from '../helpers/hashTag';
export default {
	props: ['text'],
	data() {
		return {
			input: "",
			localTags: [],
			localExcludedTags: [],
		};
	},
	watch: {
		input(newVal, oldVal) {
			this.$emit('input', newVal);
		},
		text(newVal, oldVal) {
			this.input = newVal;
		},
	},
	methods: {
		handleKey(e) {
			if (e.keyCode == 27) {
				this.$store.commit("pensamientos/removeLastTag")
			}
			if (e.keyCode == 32) {
				this.processInput();
			}
			this.$store.commit("pensamientos/setInputValue", (this.input))
		}, 
		processInput() {
			let tag = hashtagHelper.getHashTag(this.input);
			let excludedTags = hashtagHelper.getExcludedTag(this.input);
			if (tag) {
				this.$store.commit("pensamientos/addInputTag", tag)
				this.input = hashtagHelper.removeHashTag(this.input)
			}
			if (excludedTags) {
				this.input = hashtagHelper.removeExcludedTag(this.input)
				this.$store.commit("pensamientos/addExcludedTag", excludedTags)
			}
		},
		post() {
			this.processInput();
			if(this.editing){
				this.$store.dispatch("pensamientos/editSelectedThoughts")
			}else{
				this.$store.dispatch("pensamientos/post")
			}
			this.input = "";
		},
	},
	computed: {
		...mapGetters({
			selectedThoughts: "pensamientos/getSelectedThoughts",
		}),
		formColor() {
			if (this.editing) {
				return "green";
			}
			return "grey";
		},
		editing(){
			return count(this.selectedThoughts) > 0;
		}
	},
};
</script>