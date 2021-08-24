import React, { useContext, useState } from 'react';

// import { FormattedMessage } from 'react-intl';
import { Context } from './LanguageWrapper'
import { FormattedMessage } from 'react-intl';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Table from 'react-bootstrap/Table';
import TechTable from './TechTable';
import ProjectCard from './ProjectCard'
import Modal from 'react-bootstrap/Modal'
import Button from 'react-bootstrap/Button'
import Carousel from 'react-bootstrap/Carousel'
export default function ProjectModal(props) {
  const [show, setShow] = useState(false);

  const handleClose = () => setShow(false);
  const handleShow = () => setShow(true);
  const imagenes = <div>
    {props.project.images.map(function (image, index) {
      return <div key={index} >
        <h3><FormattedMessage id={image.title} /></h3>
        <p><FormattedMessage id={image.description} /></p>
        <img
          className="d-block w-100 mh-400  center fit-image"
          src={"/images/" + image.url}
          alt={image.title}
        />
        <br></br>
      </div>
    })}
  </div>

  console.log(props.project.tecnologies);

  const tecnologias =
    <div>Tecnologias utilizadas
      <ul>
        {props.project.tecnologies.map(function (tec, index) {
          return <li key={index}>{tec}</li>
        })}
      </ul>
    </div>

  const video =
    <div>
      {props.project.video ? <iframe class="video-project" src={props.project.video}></iframe> : ""}
    </div>

  return (
    <>
      <Button variant="primary" onClick={handleShow}>
        Ver más detalles
      </Button>

      <Modal show={show} onHide={handleClose} size="xl">
        <Modal.Header closeButton>
          <Modal.Title>
            <FormattedMessage id={props.project.title} />
          </Modal.Title>
        </Modal.Header>
        <Modal.Body>

          <p><FormattedMessage id={props.project.description} /></p>
          Links
          <ul>
            <li>URL: {props.project.website}</li>
            <li>User: {props.project.user}</li>
            <li>Password: {props.project.password}</li>
            <li>Repository: {props.project.repository}</li>
          </ul>
          {tecnologias}

          {imagenes}

          {video}
        </Modal.Body>

      </Modal>
    </>
  );
}