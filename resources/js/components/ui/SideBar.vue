<template lang="pug">
v-navigation-drawer(permanent="" clipped app expand-on-hover="" id="app-drawer")
		v-list
			v-list-item.px-2
				v-list-item-avatar
					v-img(src="https://randomuser.me/api/portraits/women/85.jpg")
			v-list-item(link="")
				v-list-item-content
					v-list-item-title.text-h6  Sandra Adams 
					v-list-item-subtitle sandra_a88@gmail.com
		v-divider

		v-list
			v-list-item(v-for="item in items" :key="item.title" link="" :to="item.href")
				v-list-item-icon
					v-icon(color="primary") {{ item.icon }}
				v-list-item-content
					v-list-item-title.primary--text {{ item.title }}


</template>
<script>
export default {
	data() {
		return {

			items: [
				{
					title: 'Pacientes', icon: 'mdi-view-dashboard', href: '/pacientes'
			},
			{
				title: 'Tratamientos', icon: 'mdi-view-dashboard', href: '/tratamientos'
			}
		]
	}
	}
};
</script>
