import pensamientosService from '../services/pensamientosService'

let pensamientos = {
	namespaced: true,
	state: () => ({
		pensamientos: [],
		palabras: [],
		meta: [],
		loading: false,
		error: false,
		tags: []
	}), 
	getters: {
		getPensamientos: state => {
			return state.pensamientos;
		},
		getLoading: state => {
			return state.loading
		},
		getPalabras: state => {
			return state.palabras
		},
		getMeta: state => {
			return state.meta
		},
		getTags: state => {
			return state.tags
		}
	},
	actions: {
		get(context) { 
			context.commit('setLoading', true);
			context.commit('setError', false);
			pensamientosService.get()
				.then(x => {
					context.commit('setPensamientos', x.data.pensamientos)	
					context.commit('setPalabras', x.data.palabras)	
					context.commit('setMeta', x.data.meta)	
					context.commit('setTags', x.data.etiquetas)	
					console.log(x.data.etiquetas)
					context.commit('setLoading', false);
					console.log(x)
				})
				.catch(x => {
					context.commit('setError', true);
					console.error(x)
				})
		}, 
		post(context, data) {
			pensamientosService.post(data)
				.then(x => {
					console.log(x)
					context.dispatch('get')
				})
				.catch(x => {
					console.error(x)
				})
		}, 
		patch(context, data) {
			pensamientosService.patch(data)
				.then(x => {
					console.log(x)
					context.dispatch('get')
				})
				.catch(x => {
					console.error(x)
				})
		}, 
		login() { } 
	},
	mutations: {
		setPensamientos(state, data) {
			state.pensamientos = data
		},
		setLoading(state, data) {
			state.loading = data
		},
		setError(state, data) {
			state.error = data
		},
		setPalabras(state, data) {
			state.palabras = data
		},
		setMeta(state, data) {
			state.meta = data
		},
		setTags(state, data) {
			state.tags = data
		}

	},

	modules: {

	}
}

export default pensamientos; 