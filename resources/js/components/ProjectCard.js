import React, { useContext } from 'react';

// import { FormattedMessage } from 'react-intl';
import { Context } from './LanguageWrapper'
import { FormattedMessage } from 'react-intl';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Table from 'react-bootstrap/Table';
import Card from 'react-bootstrap/Card'
import Button from 'react-bootstrap/Button'
import WrappedMessage from './WrappedMessage'
import ProjectModal from './ProjectModal'
import images from './bd/images'

export default function ProjectCard(props) {
  const context = useContext(Context);



  return (
      <Col  md={4}>
      <Card >
        <Card.Img variant="top" src={"/images/" + props.project.images[0].url} />
        <Card.Body >
          <Card.Title>
            <FormattedMessage id={props.project.title} />
          </Card.Title>
          <Card.Text>
            <FormattedMessage id={props.project.description} />
          </Card.Text>
          <ProjectModal
            title={props.title}
            project={props.project} />
            
        </Card.Body>
      </Card>
      </Col>
  );
}