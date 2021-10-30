import React, { useContext } from 'react';
import { Context } from '../LanguageWrapper'
import { FormattedMessage } from 'react-intl';
import Row from 'react-bootstrap/Row';
import ProjectCard from './ProjectCard'
// import proyectos from './bd/proyectos'

let proyectos = window.proyectos;

export default function Projects() {
  const context = useContext(Context);

  return (
    <section id="projects">
      <h1>
        <FormattedMessage id="projects.header" />
      </h1>
      <Row>
        {proyectos.map(function(project, index) {
          return <ProjectCard key={index} project={project}/>
        })}
      </Row>
    </section>
  );
}