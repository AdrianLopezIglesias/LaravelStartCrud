import axios from 'axios'
const pensamientosService = {

	get: () => {
		return axios.get('/api/pensamientos');
	},
	
	post: async (data) => {
		return axios.post('/api/pensamientos', data);
	}
}
	
export default pensamientosService; 