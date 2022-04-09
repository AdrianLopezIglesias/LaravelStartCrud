
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
		}),
		editDialog: {
			get: function() {
				return this.$store.getters["pensamientos/getEditDialog"];
			},
			set: function (value) {
				return this.$store.commit("pensamientos/setEditDialog", value);
			}

		}			
	},
	watch: {
		editDialog(val) {
			if (val == true) {
				this.localEditedThought = _.cloneDeep(this.editedThought);
			}
			if (val == false) {
				this.submitEditThought();
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
		submitEditThought(){
			this.$store.dispatch("pensamientos/patch", {
				id: this.localEditedThought.id,
				texto: this.localEditedThought.texto,
				tags: this.localEditedThought.tags,
			});
		}
	},
};
