import axios from 'axios'
const pensamientosService = {

	get: () => {
		return axios.get('/api/pensamientos');
	},
	
	post: async (data) => {
		return axios.post('/api/pensamientos', data);
	},
	patch: async (data) => {
		return axios.patch('/api/pensamientos/'+data.id, data);
	}
}
	
export default pensamientosService; 