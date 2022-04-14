import axios from 'axios'
const thoughtsService = {

	get: () => {
		return axios.get('/api/pensamientos');
	},
	
	post: async (data) => {
		return axios.post('/api/pensamientos', data);
	},
	updateSelectedThoughts: async (data) => {
		return axios.post('/api/pensamientos/edit-selected', data);
	},
	patch: async (data) => {
		return axios.patch('/api/pensamientos/'+data.id, data);
	},
	delete: async (ids) => {
		console.log(ids)
		return axios.post('/api/pensamientos/delete', ids);
	}
}
	
export default thoughtsService; 