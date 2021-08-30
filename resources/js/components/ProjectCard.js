import React, { useContext, useRef, useState } from 'react';
import { Context } from './LanguageWrapper'
import { FormattedMessage } from 'react-intl';
import Col from 'react-bootstrap/Col';
import Card from 'react-bootstrap/Card'
import ProjectModal from './ProjectModal'
import Modal from 'react-bootstrap/Modal'
import Button from 'react-bootstrap/Button'

export default function ProjectCard(props) {
    const context = useContext(Context);
    const [show, setShow] = useState(false);

    const handleClose = () => {setShow(false)};
    const handleShow = () => { setShow(true)};



    const imagenes = <div>
        {props.project.images.map(function (image, index) {
            return <div key={index} >
                <img
                    className="d-block w-75"
                    src={"/images/" + image.url}
                />
                <br></br>
            </div>
        })}
    </div>

    const tecnologias =
        <div><FormattedMessage id="projects.modal.techstack" />
            <ul>
                {props.project.tecnologies.map(function (tec, index) {
                    return <li key={index}>{tec}</li>
                })}
            </ul>
        </div>
    return (
        <Col lg={4}>
            <Card onClick={() => handleShow()}>
                <Card.Body >
                    <Card.Title>
                        <FormattedMessage id={props.project.title} />
                    </Card.Title>
                    <Card.Text>
                        <FormattedMessage id={props.project.description} />
                    </Card.Text>

                    <img variant="bottom" src={"/images/" + props.project.images[0].url} className="card-image-project" />

                </Card.Body>
            </Card>
            <Modal show={show} onHide={handleClose} size={'lg'}>
                <Modal.Header closeButton>
                    <Modal.Title>
                        <FormattedMessage id={props.project.title} />
                    </Modal.Title>
                </Modal.Header>
                <Modal.Body>

                    <p><FormattedMessage id={props.project.description} /></p>
                    <p>URL del proyecto publicado: {props.project.website}</p>
                    <p>URL del repositorio: {props.project.website}</p>
                    {tecnologias}
                    {imagenes}
                </Modal.Body>

            </Modal>
        </Col>
    );
}