import React, { useContext } from 'react';

// import { FormattedMessage } from 'react-intl';
import { Context } from './LanguageWrapper'
import { FormattedMessage } from 'react-intl';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Table from 'react-bootstrap/Table';
import TechTable from './TechTable';

export default function About() {
  const context = useContext(Context);



  return (
    <section id="skills">
      <h2>
        <FormattedMessage id="skills.header" />
      </h2>
      <TechTable />
    </section>
  );
}