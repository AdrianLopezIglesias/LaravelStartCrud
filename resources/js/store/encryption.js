import thoughtsService from '../services/thoughtsService'
import hashtagHelper from '../helpers/hashTag';
import _ from 'lodash'
import encryption from '../helpers/encryption';

let encryptionModule = {
    namespaced: true,
    state: () => ({
        encryptionDialog: true,
        encryptionKey: ""
    }),
    getters: {
        getEncryptionDialog: state => {
            return state.encryptionDialog
        }
    },
    mutations: {
        setEncryptionDialog: (state, payload) => {
            state.encryptionDialog = payload
        },
        setEncryptionKey: (state, payload) => {
            state.encryptionKey = payload
        },
    },
}

export default encryptionModule;