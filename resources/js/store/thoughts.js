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
		excluded: []
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
			console.log(thoughts)
			let ft = thoughts
			if (tags.length > 0) {
				ft = [];
				tags.forEach(x => {
					ft = thoughts.filter(
						(thought) => {
							if (_.isArray(thought.tags)) {
								console.log(thought.tags.includes(x))
								return thought.tags.includes(x)
							}
						}
					);
				})
			}
			console.log(ft)

			return thoughts;
		},
		getInputValue: state =>  {
			return state.inputValue;
		},
		getInputTags: state => {
			return state.inputTags;
		}
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
		post({ commit, state }) {
			let tags = state.tags.concat(hashtagHelper.getHashTag(state.inputValue))
			let inputValue = hashtagHelper.removeHashTag(state.inputValue)
			let data = {
				texto: inputValue,
				tags: tags
			}
			thoughtsService.post(data)
				.then(x => {
					console.log(x)
					context.dispatch('get')
				})
				.catch(x => {
					console.error(x)
				})
		}, 
		patch(context, data) {
			thoughtsService.patch(data)
				.then(x => {
					console.log(x)
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
		setInputValue(state, data) {
			state.inputValue = data
		},

	},

	modules: {

	}
}

export default thoughts; 