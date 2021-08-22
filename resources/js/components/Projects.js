import React, { useContext } from 'react';

// import { FormattedMessage } from 'react-intl';
import { Context } from './LanguageWrapper'
import { FormattedMessage } from 'react-intl';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Table from 'react-bootstrap/Table';
import TechTable from './TechTable';
import ProjectCard from './ProjectCard'

export default function Projects() {
  const context = useContext(Context);



  return (
    <section id="projects">
      <h2>
        <FormattedMessage id="projects.header" />
      </h2>
      <Row>
        <ProjectCard title="<FormattedMessage id='projects.header' />"></ProjectCard>
      <ProjectCard></ProjectCard>
      <ProjectCard></ProjectCard>
      </Row>
    </section>
  );
}