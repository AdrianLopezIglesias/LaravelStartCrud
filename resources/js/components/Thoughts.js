import { mapGetters } from "vuex";
import _ from 'lodash'
import Footer from "./Footer.vue";
import EditThoughtDialog from "./EditThoughtDialog.vue";

export default {
	components: {Footer, EditThoughtDialog},
	data() {
		return {
			headers: [
				{ text: "Texto", value: "texto", width:"70%" },
				{ text: "tags", value: "tags" },
			],
			options: {
				itemsPerPage: 5000,
			},
		};
	},
	computed: {
		...mapGetters({
			loading: "pensamientos/getLoading",
			filteredThoughts: "pensamientos/getFilteredThoughts",
		}),
		showSelect() {
			return false;
		},
	},
	watch: {
		filteredThoughts:{
			handler() {
				const container = this.$refs.container;
				this.$vuetify.goTo(container.scrollHeight*this.filteredThoughts.length)
			},
		}
	},
	methods: {
		getData() {
			this.$store.dispatch("pensamientos/get");
		},
		selectRow(item, row) {      
			let selectState = (row.isSelected) ? false : true;
			row.select(selectState);
		},
		editThought(p) {
			this.$store.commit("pensamientos/setEditThought", p);
			this.$store.commit("pensamientos/setEditDialog", true);
		},
		addInputTag(tag){
			this.$store.commit("pensamientos/addInputTag", tag);
		},
		addExcludedTag(event, tag){
			event.preventDefault();
			this.$store.commit("pensamientos/addExcludedTag", tag);
		},
	},
	mounted() {
		this.getData();
	},
};