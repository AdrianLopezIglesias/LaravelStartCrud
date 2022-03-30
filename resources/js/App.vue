<template lang="pug">
	v-app
		v-main
			v-row.fill-height
				v-col
					transition(name="fade")
						router-view
		v-footer
</template>


<script lang="coffee">
import Pensamientos from "./components/Pensamientos"

export default
	name: "App"
	components: {
		Pensamientos,
	}
</script>

