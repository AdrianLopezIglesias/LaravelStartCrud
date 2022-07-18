import crypto from 'crypto-js';
const algorithm = 'aes-256-cbc'; //Using AES encryption
let password = localStorage.getItem("key");

export default {
    //Encrypting text
    encrypt(text) {
        password = localStorage.getItem("key");
        const result = crypto.AES.encrypt(text, password);
        return result.toString();
    },


    encryptTags(tags) {
        let encryptedTags = []
        tags.forEach(tag => {
            tag = this.encrypt(tag);
            encryptedTags.push(tag);
        })
        return encryptedTags;
    },

    // Decrypting text
    decrypt(text) {
        try {
            password = localStorage.getItem("key");
            const result = crypto.AES.decrypt(text, password);
            let decryptedText = result.toString(crypto.enc.Utf8);
            if (decryptedText != "") {
                return decryptedText
            }
        } catch (e) {}
        return "";
    },

    decryptTags(tags) {
        let decryptedTags = []
        tags.forEach(tag => {
            tag = this.decrypt(tag);
            decryptedTags.push(tag);
        })
        return decryptedTags;
    },

    decryptThoughts(thoughts) {
        let decryptedThoughts = []

        thoughts.forEach(thought => {
            if(this.decrypt(thought.texto) == ""){
                return
            }
                thought.texto = this.decrypt(thought.texto);
                thought.tags = this.decryptTags(thought.tags);
                decryptedThoughts.push(thought);
            })
            // return thoughts
        return decryptedThoughts;
    },


}