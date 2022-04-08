<template lang="pug">
v-dialog(v-model="editDialog" width="500")
	v-card
		v-card-text
			br
			v-textarea(
				v-model="localEditedThought.texto",
				label=""
				filled
				hide-details="auto"
				:dense="true"
				:solo="true"
				multiple
				:delimiters="[' ']"
				v-on:keydown.enter="post()"
			)
			v-combobox(
				:items="tags"
				hide-details="auto",
				v-model="tagSelector"
				:dense="true",
				filled
				v-on:change="addInputTag"
			)
			template(v-for="x in localEditedThought.tags")
				v-chip(
					class="ma-2"
					close
					x-small
					color="green"
					outlined
					@click:close="removeTag(x)"
				) {{x}}
		v-card-actions
			v-spacer
			v-btn(color="danger" @click="closeEditDialog") Cancelar
			v-btn(color="primary" @click="submitEditThought") Actualizar
</template>

<script src="./EditThoughtDialog.js"/>
