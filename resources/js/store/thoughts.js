import thoughtsService from '../services/thoughtsService'
import hashtagHelper from '../helpers/hashTag';
import _ from 'lodash'

let thoughts = {
	namespaced: true,
	state: () => ({
		thoughts: [],
		words: [],
		tags: [],
		loading: false,
		error: false,
		inputTags: [],
		inputValue: "",
		excludedTags: [],
		editDialog: false,
		editedThought: {
			id: 0,
			texto: "",
			tags: [],
		},
		selectedThoughts: [],
	}), 
	getters: {
		getThoughts: state => {
			return state.thoughts;
		},
		getLoading: state => {
			return state.loading
		},
		getWords: state => {
			return state.words
		},
		getTags: state => {
			return state.tags
		},
		getFilteredThoughts: state =>  {
			let thoughts = state.thoughts;

			let tags = state.inputTags;
			let excludedTags = state.excludedTags;

			let ft = thoughts

			if (tags.length > 0) {
				ft = [];
				tags.forEach(x => {
					ft = thoughts.filter(
						(thought) => {
							if (_.isArray(thought.tags)) {
								return thought.tags.includes(x)
							}
						}
					);
				})
			}

			if (excludedTags.length > 0) {
				console.log(excludedTags)
				excludedTags.forEach(x => {
					ft = ft.filter(
						(thought) => {
							if (_.isArray(thought.tags)) {
								return !thought.tags.includes(x)
							}
						}
					);
				})
			}

			return ft;
		},
		getInputValue: state =>  {
			return state.inputValue;
		},
		getInputTags: state => {
			return state.inputTags;
		},
		getExcludedTags: state => {
			return state.excludedTags;
		},
		getEditDialog: state => {
			return state.editDialog;
		},
		getEditedThought: state => {
			return state.editedThought;
		},
		getSelectedThoughts: state => {
			return state.selectedThoughts;
		},

	},
	actions: {
		get(context) { 
			context.commit('setLoading', true);
			context.commit('setError', false);
			thoughtsService.get()
				.then(x => {
					context.commit('setThoughts', x.data.thoughts)	
					context.commit('setWords', x.data.words)	
					context.commit('setTags', x.data.tags)	
					context.commit('setLoading', false);
				})
				.catch(x => {
					context.commit('setError', true);
					context.commit('setLoading', false);
				})
		}, 
		post({ dispatch, commit, state }) {
			let data = {
				texto: state.inputValue,
				tags: state.inputTags
			}
			thoughtsService.post(data)
				.then(x => {
					dispatch('get')
					commit('setInputValue', "")
				})
				.catch(x => {
					console.error(x)
				})
		}, 
		patch(context, data) {
			thoughtsService.patch(data)
				.then(x => {
					context.dispatch('get')
				})
				.catch(x => {
					console.error(x)
				})
		}, 
		setInputValue({ commit }, value) {
			commit('setInputValue', value)
		}
	},
	mutations: {
		setThoughts(state, data) {
			state.thoughts = data
		},
		setLoading(state, data) {
			state.loading = data
		},
		setError(state, data) {
			state.error = data
		},
		setWords(state, data) {
			state.words = data
		},
		setTags(state, data) {
			state.tags = data
		},
		setInputTags(state, data) {
			state.inputTags = data
		},
		setExcludedTags(state, data) {
			state.excludedTags = data
		},
		setInputValue(state, data) {
			state.inputValue = data
		},
		addInputTag(state, tag) {
			if (!state.inputTags.includes(tag)) {
				state.inputTags.push(tag)
			}
		},
		addExcludedTag(state, tag) {
			if (!state.excludedTags.includes(tag)) {
				state.excludedTags.push(tag)
			}
		},
		removeExcludedTag(state, tag) {
			state.excludedTags = state.excludedTags.filter(x => x !== tag)
		},
		removeInputTag(state, tag) {
			state.inputTags = state.inputTags.filter(x => x !== tag)
		},
		setEditDialog(state, boolean) {
			state.editDialog = boolean
		},
		setEditThought(state, thought) {
			state.editedThought = thought
		},
		removeLastTag(state) {
			if (state.inputTags.length > 0) {
				state.inputTags.pop()
			} else {
				state.excludedTags.pop()
			}
		},
		setSelectedThoughts(state, thoughts) {
			state.selectedThoughts = thoughts
		}

	},

	modules: {

	}
}

export default thoughts; 