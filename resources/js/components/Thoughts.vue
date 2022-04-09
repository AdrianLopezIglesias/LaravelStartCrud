<template lang="pug">
.container-fluid( ref="container" )
	v-data-table(
		v-model="selectedThoughts",
		:headers="headers",
		:items="filteredThoughts",
		:loading="loading",
		limit="200",
		:options="options",
		:dense="true",
		:show-select="showSelect"
		hide-default-footer
		loading-text="Loading... Please wait",
		:hide-default-header="true"
		)
		template(v-slot:item.texto="{item}")
			div(
				v-on:click="editThought(item)"
			) {{item.texto}}
		template(v-slot:item.tags="{item}")
			div(class="d-flex flex-row" tile flat)
				div(v-for="x in item.tags")
					v-chip(
						x-small
						outlined
						@click="addInputTag(x)"
						@contextmenu="addExcludedTag($event, x)"
					) {{x}}
	EditThoughtDialog
	Footer
</template>

<script src="./Thoughts.js"/>
