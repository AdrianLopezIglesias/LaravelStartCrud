import React, { useContext } from 'react';

// import { FormattedMessage } from 'react-intl';
import { Context } from './LanguageWrapper'
import { FormattedMessage } from 'react-intl';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Table from 'react-bootstrap/Table';
import TechTable from './TechTable';
import ProjectCard from './ProjectCard'
import proyectos from './bd/proyectos'
import { Link, Button, Element, Events, animateScroll as scroll, scrollSpy, scroller } from 'react-scroll'


export default function Projects() {
  const context = useContext(Context);


  return (
    <section id="projects">
      <Element name="projects"></Element>

      <h1>
        <FormattedMessage id="projects.header" />
      </h1>
      <Row>
        {proyectos.map(function(project, index) {
          return <ProjectCard
            key={index}
            project={project}
            title={<FormattedMessage id={project.title} />}
            description={<FormattedMessage id={project.description} />}
            tecnologies={project.tecnologies} />
        })}



      </Row>
    </section>
  );
}