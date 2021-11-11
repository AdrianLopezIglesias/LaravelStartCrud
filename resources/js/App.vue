<template lang="pug">
	v-app
		SideBar
		v-main
			v-row.fill-height
				v-col
					transition(name="fade")
						router-view
		v-footer
</template>
https://www.codeply.com/p/AtcbXz9Ybg
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

