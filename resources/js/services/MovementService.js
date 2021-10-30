import axios from 'axios'

const getMovements = () => {

	return axios.get('/api/earth');
};

const followOrders = async (data) => {
	return axios.post('/api/calculate_position', data);
};

export { getMovements, followOrders }; 