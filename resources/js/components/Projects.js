import React, { useContext } from 'react';
import { Context } from './LanguageWrapper'
import { FormattedMessage } from 'react-intl';
import Row from 'react-bootstrap/Row';
import ProjectCard from './ProjectCard'
import proyectos from './bd/proyectos'

let proyectos2 = window.proyectos;

export default function Projects() {
  const context = useContext(Context);
    let tecnologias = [];
    console.log(proyectos2)

  return (
    <section id="projects">
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