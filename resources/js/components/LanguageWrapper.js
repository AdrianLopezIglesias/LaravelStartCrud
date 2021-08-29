import React, { useState, useEffect } from 'react';

import { IntlProvider } from 'react-intl';

//AXios
import axios from 'axios';


import Spanish from './lang/es.json';
import English from './lang/en.json';

export const Context = React.createContext();




const local = 'es';

let lang;

if (local === 'es') {
    lang = Spanish;
} else {
    lang = English;
}

// local === 'es' ? lang = Spanish : lang = English;

const LanguageWrapper = (props) => {
    const [locale, setLocale] = useState(local);
    const [messages, setMessages] = useState(lang);

    useEffect(() => {
        axios.get('/api/adm/textos')
            .then(function (response) {
                Spanish = response.data.es
                English = response.data.en
                setMessages(Spanish);
            })
            .catch(function (error) {
                // handle error
                axios.get('/api/adm/textos')
                    .then(function (response) {
                        Spanish = response.data.es
                        English = response.data.en
                        console.log(Spanish);
                        setMessages(Spanish);
                    })
                console.log(error);
            })
            .then(function () {
                // always executed
            });
    }, []);

    function selectLanguage(e) {
        const newLocale = e.target.value;
        setLocale(newLocale);
        if (newLocale === 'en') {
            setMessages(English);
        } else {
            if (newLocale === 'es') {
                setMessages(Spanish);
            } else {
                setMessages(Arabic);
            }
        }
    }

    return (
        <Context.Provider value={{ locale, selectLanguage }}>
            <IntlProvider messages={messages} locale={locale}>
                {props.children}
            </IntlProvider>
        </Context.Provider>
    );
}
export default LanguageWrapper;