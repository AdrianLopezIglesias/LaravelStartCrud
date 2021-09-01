import React, { useContext, useRef, useState } from 'react';
import { Context } from '../LanguageWrapper'
import { FormattedMessage } from 'react-intl';
import Col from 'react-bootstrap/Col';
import Card from 'react-bootstrap/Card'
import Modal from 'react-bootstrap/Modal'

export default function ProjectCard(props) {
    const context = useContext(Context);
    const [show, setShow] = useState(false);
    const handleClose = () => { setShow(false) };
    const handleShow = () => { setShow(true) };
    const imagenes = <div>
        {props.project.images.map(function (image, index) {
            return <div key={index} >
                <h4><FormattedMessage id={"projectimage" + image.id + ".title"} /></h4>
                <p><FormattedMessage id={"projectimage" + image.id + ".description"} /></p>
                <img
                    className="d-block w-75"
                    src={image.url}
                />
                <br></br>
            </div>
        })}
    </div>
    let tecnologias = "";
    if (props.project.techs) {
        tecnologias =
            <div><FormattedMessage id="projects.modal.techstack" />
                <ul>
                    {props.project.techs.split(',').map(function (tec, index) {
                        return <li key={index}>{tec}</li>
                    })}
                </ul>
            </div>
    }
    return (
        <Col lg={4}>
            <Card onClick={() => handleShow()}>
                <Card.Body >
                    <Card.Title>
                        <FormattedMessage id={"project" + props.project.id + ".title"} />
                    </Card.Title>
                    <Card.Text>
                        <FormattedMessage id={"project" + props.project.id + ".description"} />
                    </Card.Text>

                    <img variant="bottom" src={props.project.mainimage} className="card-image-project" />

                </Card.Body>
            </Card>
            <Modal show={show} onHide={handleClose} size={'lg'}>
                <Modal.Header closeButton>
                    <Modal.Title>
                        <FormattedMessage id={"project" + props.project.id + ".title"} />
                    </Modal.Title>
                </Modal.Header>
                <Modal.Body>
                    <p><FormattedMessage id={"project" + props.project.id + ".description"} /></p>
                    <p>URL del proyecto publicado: {props.project.url}</p>
                    <p>URL del repositorio: {props.project.website}</p>
                    {tecnologias}
                    <img src={props.project.mainimage} className="d-block w-100" />
                    <br />
                    {imagenes}
                </Modal.Body>

            </Modal>
        </Col>
    );
}