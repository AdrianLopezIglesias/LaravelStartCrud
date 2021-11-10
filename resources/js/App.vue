<template lang="pug">
v-app
	v-app-bar(color="primary" dark="")
	SideBar
		v-content
			v-container-fluid
				v-row.fill-height
					v-col
						transition(name="fade")
							router-view
</template>

<script lang="coffee">
import PacientesTable from "./components/pacientes/PacientesTableO"
import NavBar from "./components/ui/NavBar"
import SideBar from "./components/ui/SideBar"

export default
	name: "App"
	components: {
		PacientesTable,
		NavBar,
		SideBar
	}
</script>

