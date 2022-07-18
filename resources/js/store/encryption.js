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
        openEncryptionDialog: (state) => {
            state.encryptionDialog = true
        },
        closeEncryptionDialog: (state) => {
            state.encryptionDialog = false
        },
        setEncryptionKey: (state, payload) => {
            localStorage.setItem("key", payload);
            state.encryptionKey = payload
        },
        retrieveEncryptionKey: (state) => {
            if(localStorage.getItem("key") == null){
                state.encryptionKey = "password" + Math.floor( Math.random()*10000)
            } else {
                state.encryptionKey = localStorage.getItem("key")
            }
        }

    },
}

export default encryptionModule;