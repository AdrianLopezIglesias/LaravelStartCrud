import React, { Component } from 'react';
import axios from 'axios'

export default class Pacientes extends React.Component {
	constructor(props) {
		super(props);
		this.state = {
			pacientes: [],
			page: 1,
			nombre: "",
		},
		this.buscarPorNombre = this.buscarPorNombre.bind(this);
	}

	componentDidMount() {
		if (this.state.nombre == "") {
			axios.get('/api/pacientes?page=' + this.state.page).then(x => { this.setState({ pacientes: x.data.data }) })
		}
	}
	buscarPorNombre(event) {
		this.setState({ nombre: event.target.value },
			() => {
				axios.get('/api/pacientes?nombre=' + this.state.nombre).then(x => {
					this.setState({ pacientes: x.data.data }, y => {
						console.log(this.state.nombre)
						console.log(x)

						// console.log('/api/pacientes?nombre=' + this.state.nombre)
						// console.log(this.state.pacientes.data)
					}
				)
				})
			}
				);
	}
	
	nextPage() {
		this.setState({ page: this.state.page++ }, function () {
			})
			axios.get('/api/pacientes?page=' + this.state.page).then(x => { this.setState({ pacientes: x.data.data }) })

	}

	render() {
		let lista_pacientes = "Buscando información";
		if ('data' in  this.state.pacientes) {
			
			lista_pacientes = this.state.pacientes.data.map(x => {
				return (
					<tr key={x.id}>
					<td>{x.nombre}</td>
				</tr>
			)
		})
	}

		return <div>
			<input type="text"  placeholder='buscar por nombre'  value={this.state.nombre} onChange={(e) => this.buscarPorNombre(e)}  />
			<p>Pacientes</p>
			<table>
				<tbody>
					{lista_pacientes}
				</tbody>
			</table>
			<a onClick={() => this.nextPage()}>next page</a>
		</div>

	}


}

