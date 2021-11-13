<template lang="pug">
	v-dialog(v-model="dialog" persistent="" max-width="600px")
		template(v-slot:activator="{ on, attrs }")
			v-btn(color="primary" dark="" v-bind="attrs" v-on="on")
				| Nueva contratación
		v-card
			v-toolbar(color="primary" dark="") Nueva contratación
			v-card-text
				v-container
					v-row
						v-col(cols="12")
							v-text-field(label="Nombre*" required="" )

			v-card-actions
				v-spacer
				v-btn(color="blue darken-1" text="" @click="dialog = false")
					| Close
				v-btn(color="blue darken-1" text="" @click="submit ")
					| Save
</template>


<script>
export default{

}


</script>
