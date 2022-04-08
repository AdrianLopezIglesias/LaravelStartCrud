
import { mapGetters } from "vuex";
import _ from 'lodash'

export default {
	name: "DatatableComponent",
	data() {
		return {
			tagSelector: "",
			editPensamientoDialog: false,
			localEditedThought: {
				id: 0,
				texto: "",
				tags: [],
			},

		};
	},
	computed: {
		...mapGetters({
			loading: "pensamientos/getLoading",
			words: "pensamientos/getWords",
			tags: "pensamientos/getTags",
			filteredThoughts: "pensamientos/getFilteredThoughts",
			editedThought: "pensamientos/getEditedThought",
			editDialog: "pensamientos/getEditDialog",
		}),
	},
	watch: {
		editDialog(val) {
			if (val == true) {
				this.localEditedThought = _.cloneDeep(this.editedThought);
			}
		},
	},
	methods: {
		addInputTag(tag) {
			this.localEditedThought.tags.push(tag);
		},
		removeTag(tag) {
			this.localEditedThought.tags = this.localEditedThought.tags.filter(x => x != tag);
		},
		closeEditDialog() {
			this.$store.commit("pensamientos/setEditDialog", false);
		},
		submitEditThought(p){
			this.$store.dispatch("pensamientos/patch", {
				id: this.localEditedThought.id,
				texto: this.localEditedThought.texto,
				tags: this.localEditedThought.tags,
			});
			this.closeEditDialog();
		}
	},
};
