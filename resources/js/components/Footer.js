import { mapGetters } from "vuex";
import hashtagHelper from '../helpers/hashTag';
import _ from 'lodash'

export default {
	name: "Footer",
	components: {},
	data() {
		return {
			input: "",
			localInputTags: [],
			localExcludedTags: []
		};
	},
	computed: {
		...mapGetters({
			words: "pensamientos/getWords",
			tags: "pensamientos/getTags",
			inputTags: "pensamientos/getInputTags",
			inputValue: "pensamientos/getInputValue",
			excludedTags: "pensamientos/getExcludedTags",
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
		post() {
			this.processInput();
			this.$store.dispatch("pensamientos/post")
			this.input = "";
		},
		removeInputTag(e) {
			this.$store.commit("pensamientos/removeInputTag", e)
		},
		removeExcludedTag(e) {
			this.$store.commit("pensamientos/removeExcludedTag", e)
		},
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
				this.localInputTags.push(tag)
				this.$store.commit("pensamientos/setInputTags", (this.localInputTags))
				this.input = hashtagHelper.removeHashTag(this.input)
			}
			if (excludedTags) {
				this.localExcludedTags.push(excludedTags)
				this.input = hashtagHelper.removeExcludedTag(this.input)
				this.$store.commit("pensamientos/setExcludedTags", (this.localExcludedTags))
			}
		}
	},
	mounted() {
	},
};