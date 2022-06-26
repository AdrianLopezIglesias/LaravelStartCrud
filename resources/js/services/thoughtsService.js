import axios from 'axios'
const instance = axios.create({
	withCredentials: true,
 })

const thoughtsService = {

	get: () => {
		console.log(instance);
		return instance.get('/api/pensamientos');
	},
	
	post: async (data) => {
		return instance.post('/api/pensamientos', data);
	},
	updateSelectedThoughts: async (data) => {
		return instance.post('/api/pensamientos/edit-selected', data);
	},
	patch: async (data) => {
		return instance.patch('/api/pensamientos/'+data.id, data);
	},
	delete: async (ids) => {
		console.log(ids)
		return instance.post('/api/pensamientos/delete', ids);
	}
}
	
export default thoughtsService; 