import React, { useContext, useRef, useState } from 'react';
import { Context } from '../LanguageWrapper'
import { FormattedMessage } from 'react-intl';
import Col from 'react-bootstrap/Col';
import Card from 'react-bootstrap/Card'
import Modal from 'react-bootstrap/Modal'
import ClampLines from 'react-clamp-lines';

class ProjectCard2 extends Component {
  constructor(props) {
    super(props);
    this.state = {
      filters: {},
      tecnologias: Object.values(window.tecnologias),
    };
    this.experienciaFilter = 1;
    this.tipoFilter = "";
    this.nombreFilter = "";

    // axios.get('/api/adm/tecnologias')
    //     .then((response) => { console.log(Object.values(response.data)); this.setState({ tecnologias: Object.values(response.data) }) })
    //     .catch(function (error) { console.log(error); })
    //     .then(function () { });
  }
  
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
  // const project_description = this.props.intl.formatMessage({ id: "project" + props.project.id + ".description"})
  console.log("123");
  return (
    <Col lg={4}>
      <Card onClick={() => handleShow()}>
        <Card.Body >
          <img variant="bottom" src={props.project.mainimage} className="card-image-project" />
          <div className="cardText">
            <Card.Title>
              <FormattedMessage id={"project" + props.project.id + ".title"} />
            </Card.Title>
            {/* <ClampLines
              text={project_description}
              id="really-unique-id"
              lines={4}
              ellipsis="..."
              moreText="Expand"
              lessText="Collapse"
              className="custom-class"
              innerElement="p"
            /> */}
              {/* <FormattedMessage id={"project" + props.project.id + ".description"} /> */}
          </div>


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
          <p>URL del repositorio: {props.project.repositoryy}</p>
          {tecnologias}
          <img src={props.project.mainimage} className="d-block w-100" />
          <br />
          {imagenes}
        </Modal.Body>

      </Modal>
    </Col>
  );
}