<template lang="pug">
v-footer(app height="72" inset)
	v-text-field(
		v-model="input",
		label=""
		hide-details="auto"
		dense
		flat
		outlined
		:solo="true"
		multiple
		v-on:keydown="handleKey"
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
				@click:close="removeMetadataItem(item)"
			) {{item}}
</template>

<script src="./Footer.js" />

