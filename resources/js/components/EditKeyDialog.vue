<template lang="pug">
v-dialog(v-model="editKeyDialog" width="500")
	v-card
		v-card-text
			br
			v-text-field(
                v-model="input",
                v-on:keydown.enter="post()"
                label="enter your secret encryption key"
                hide-details="auto"
                dense
                flat
                outlined
                solo
            )
		v-card-actions
			v-spacer
			v-btn(color="primary" @click="post") Confirmar
</template>

<script>

import { mapGetters } from "vuex";
import _ from 'lodash'

export default {
	components: {
	},
	data() {
		return {
            input: "",
		};
	},
	computed: {
		...mapGetters({
			editKeyDialog: "encryption/getEncryptionDialog",
		}),
	},
	watch: {

	},
	methods: {
        closeEditDialog() {
            this.$store.commit("encryption/closeEncryptionDialog");
        },
        post() {
            this.$store.commit("encryption/setEncryptionKey", this.input);
            this.closeEditDialog();
            this.$store.dispatch("pensamientos/get");
        },
	},
    mounted() {
        this.$store.commit("encryption/retrieveEncryptionKey");
        this.input = this.$store.state.encryption.encryptionKey;
    },
};

</script>
