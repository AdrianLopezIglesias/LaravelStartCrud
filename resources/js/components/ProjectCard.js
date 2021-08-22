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

export default function ProjectCard(props) {
  const context = useContext(Context);



  return (
      <Col col={4}>
      <Card >
        <Card.Body>
          <Card.Title>
            {props.title}
          </Card.Title>
          <Card.Text>
            <WrappedMessage message={props.title} />

            Some quick example text to build on the card title and make up the bulk of
            the card's content.
          </Card.Text>
          <Button variant="primary">Go somewhere</Button>
        </Card.Body>
      </Card>
      </Col>
  );
}