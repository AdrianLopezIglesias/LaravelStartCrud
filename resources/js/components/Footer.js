import { mapGetters } from "vuex";
import hashtagHelper from '../helpers/hashTag';
import _ from 'lodash'

export default {
	name: "Footer",
	components: {},
	data() {
		return {
			input: "",
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
			this.$store.dispatch("pensamientos/post")
		},
		removeMetadataItem(e){
			let index = this.inputTags.indexOf(e)
			this.inputTags.splice(index, 1)
		},
		handleKey(e){
			console.log(this.input)
			this.$store.dispatch("pensamientos/setInputValue", (this.input))
		}
	},
	mounted() {
	},
};