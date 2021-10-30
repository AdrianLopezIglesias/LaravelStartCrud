import React, { useState, useEffect } from 'react';

import { IntlProvider } from 'react-intl';

//AXios
import axios from 'axios';

export const Context = React.createContext();

let Spanish = window.textos.es;
let English = window.textos.en;

const local = 'es';

let lang;

if (local === 'es') {
    lang = Spanish;
} else {
    lang = English;
}

const LanguageWrapper = (props) => {
    const [locale, setLocale] = useState(local);
    const [messages, setMessages] = useState(lang);

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