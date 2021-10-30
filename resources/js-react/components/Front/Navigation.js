import React, { useContext } from 'react';
import Navbar from 'react-bootstrap/Navbar'
import Container from 'react-bootstrap/Container'
import Nav from 'react-bootstrap/Nav'
import { BrowserRouter as Router, Link} from "react-router-dom";


export default function Navigation(props) {

	return (
    <Navbar fixed="top" bg="dark" variant="dark" expand="sm">
      <Container>
        <Navbar.Brand>
          <Link className="navbar-brand" to="/about">
          </Link>
        </Navbar.Brand>
            
        <Navbar.Toggle aria-controls="basic-navbar-nav" />
        <Navbar.Collapse id="basic-navbar-nav">
          <Nav className="me-auto">

            <Link className="nav-link" to="/about">Paz</Link>
            <Link className="nav-link" to="/skills">Dinero</Link>
            <Link className="nav-link" to="/projects">Salud</Link>
            <Link className="nav-link" to="/contact">Felicidad</Link>

          </Nav>
          <Nav className="ml-auto">

          </Nav>
        </Navbar.Collapse>
      </Container>
    </Navbar>
  );
}