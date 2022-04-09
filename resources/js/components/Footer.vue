<template lang="pug">
v-footer(app height="72" inset)
	v-btn(
		v-if="selectedThoughts.length > 0"
		color="primary"
		fab
		small
		@click="showDialog = true"
	) 
		v-icon() mdi-pencil
	v-text-field(
		v-model="input",
		label=""
		hide-details="auto"
		dense
		flat
		outlined
		:solo="true"
		multiple
		v-on:keyup="handleKey"
		:delimiters="[' ']"
		v-on:keydown.enter="post()"
	)
	div(class="d-flex flex-row" tile flat)
		div(v-for="item in inputTags")
			v-chip(
				class="ma-2"
				close
				x-small
				color="green"
				outlined
				@click:close="removeInputTag(item)"
			) {{item}}
	div(class="d-flex flex-row" tile flat)
		div(v-for="item in excludedTags")
			v-chip(
				class="ma-2"
				close
				x-small
				color="red"
				outlined
				@click:close="removeExcludedTag(item)"
			) {{item}}
</template>

<script src="./Footer.js" />

