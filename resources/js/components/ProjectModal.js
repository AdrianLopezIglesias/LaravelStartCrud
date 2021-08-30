import React, { useContext, useState, useImperativeHandle } from 'react';
import { FormattedMessage } from 'react-intl';
import Modal from 'react-bootstrap/Modal'
import Button from 'react-bootstrap/Button'

function ProjectModal(props) {
    const [show, setShow] = useState(false);
    const handleShow = () => setShow(true);
    const handleClose = () => setShow(false);

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
        <>
            <Modal show={props.show} onHide={handleClose} backdrop={true} size="xl">
                <Modal.Header closeButton>
                    <Modal.Title>
                        <FormattedMessage id={props.project.title} />
                    </Modal.Title>
                </Modal.Header>
                <Modal.Body>
                    <Button variant="primary" onClick={handleClose}>
                        <FormattedMessage id="projects.modal.moredetails" />
                    </Button>
                    <p><FormattedMessage id={props.project.description} /></p>
                    Links
                    <ul>
                        <li>URL: {props.project.website}</li>
                    </ul>
                    {tecnologias}
                    {imagenes}
                </Modal.Body>
            </Modal>
        </>
    );
}
export default ProjectModal;