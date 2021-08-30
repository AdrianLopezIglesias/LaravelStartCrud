import React, { useContext, useState, useEffect  } from 'react';

// import { FormattedMessage } from 'react-intl';
import { Context } from './LanguageWrapper'
import { FormattedMessage } from 'react-intl';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Table from 'react-bootstrap/Table';
import TechTable from './TechTable';
import { Link, Button, Element, Events, animateScroll as scroll, scrollSpy, scroller } from 'react-scroll'



export default function Skills() {
    const context = useContext(Context);

    const [tecnologias, setTecnologias] = useState([]);

    useEffect(() => {
        console.log("hola")
        axios.get('/api/adm/tecnologias')
            .then(function (response){ console.log(Object.values(response.data)); setTecnologias(Object.values(response.data)) })
            .catch(function (error) { console.log(error); })
            .then(function () { });
        }, []);

    return (
        <section id="skills">
            <Element name="skills"></Element>

            <h1>
                <FormattedMessage id="skills.header" />
            </h1>
            <TechTable tecnologias={tecnologias} />
        </section>
    );
}