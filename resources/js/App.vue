<template>
  <div id="app">
		<NavBar/>
    <PacientesTable/>
  </div>
</template>

<script lang="coffee">
import PacientesTable from "./components/pacientes/PacientesTableO"
import NavBar from "./components/ui/NavBar"

export default
	name: "App"
	components: {
		PacientesTable,
		NavBar
	}
</script>

