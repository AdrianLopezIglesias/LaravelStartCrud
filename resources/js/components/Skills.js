import React, { useContext } from 'react';

// import { FormattedMessage } from 'react-intl';
import { Context } from './LanguageWrapper'
import { FormattedMessage } from 'react-intl';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Table from 'react-bootstrap/Table';
import TechTable from './TechTable';
import { Link, Button, Element, Events, animateScroll as scroll, scrollSpy, scroller } from 'react-scroll'


export default function About() {
  const context = useContext(Context);



  return (
    <section id="skills">
      <Element name="skills"></Element>

      <h1>
        <FormattedMessage id="skills.header" />
      </h1>
      <TechTable />
    </section>
  );
}