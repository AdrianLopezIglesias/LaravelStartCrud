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

const key_space = 32
const key_enter = 13
const key_escape = 27

export default {
	data() {
		return {
			input: "",
			localTags: [],
			localExcludedTags: [],
		};
	},
	watch: {},
	methods: {
		handleKey(e) {
            switch (e.keyCode) {
                case key_escape:
                    this.$store.commit('pensamientos/setSelectedThoughts', []);
                    this.$store.commit("pensamientos/removeLastTag")
                    break;
                case key_space:
				    this.processInput();
                    break;
            
                default:
                    break;
            }
			this.$store.commit("pensamientos/setInputValue", (this.input))
		}, 
		processInput() {
			let inputTag = hashtagHelper.getHashTag(this.input);
			let excludedTags = hashtagHelper.getExcludedTag(this.input);

            this.cleanInput(); 
            this.resolveSelectedTags();
            this.resolveInputTag(inputTag);
            this.resolveExcludedTags(excludedTags);
		},
		post() {
            this.cleanInput(); 
            this.$store.commit('pensamientos/setSelectedThoughts', []);
			this.processInput();
            this.$store.dispatch("pensamientos/post")
			this.input = "";
		},
        cleanInput() {
            this.input = hashtagHelper.removeHashTag(this.input)
            this.input = hashtagHelper.removeExcludedTag(this.input)
        },
        resolveSelectedTags(){
			if(this.isEditing){
				this.$store.commit("pensamientos/addSelectedThoughtsTag", inputTag)
				this.$store.dispatch("pensamientos/updateSelectedThoughts")
			}
        },
        resolveInputTag(){
		    if (inputTag) {
				this.$store.commit("pensamientos/addInputTag", inputTag)
			}
        },
        resolveExcludedTags(){
			if (excludedTags) {
				this.$store.commit("pensamientos/addExcludedTag", excludedTags)
			}
        }
	},
	computed: {
		...mapGetters({
			selectedThoughts: "pensamientos/getSelectedThoughts",
		}),
		formColor() {
			if (this.isEditing) {
				return "green";
			}
			return "blue";
		},
		isEditing(){
			return (this.selectedThoughts.length) > 0;
		}
	},
};
</script>