import React, { useContext } from 'react';
import Navbar from 'react-bootstrap/Navbar'
import Container from 'react-bootstrap/Container'
import Nav from 'react-bootstrap/Nav'
import { Context } from '../LanguageWrapper'
import { FormattedMessage } from 'react-intl';
import Form from 'react-bootstrap/Form'
import { BrowserRouter as Router, Link} from "react-router-dom";


export default function Navigation(props) {
  const context = useContext(Context);

  return (
    <Navbar fixed="top" bg="light" variant="light" expand="sm">
      <Container>
              <Navbar.Brand><Link className="navbar-brand" to="/about"><img src="logo.png" className="navbar-logo"/>InteraSoft</Link></Navbar.Brand>
            
        <Navbar.Toggle aria-controls="basic-navbar-nav" />
        <Navbar.Collapse id="basic-navbar-nav">
          <Nav className="me-auto">

            <Link className="nav-link" to="/about"><FormattedMessage id="navigation.about" /></Link>
            <Link className="nav-link" to="/skills"><FormattedMessage id="navigation.skills" /></Link>
            <Link className="nav-link" to="/projects"><FormattedMessage id="navigation.projects" /></Link>
            <Link className="nav-link" to="/contact"><FormattedMessage id="navigation.contact" /></Link>

          </Nav>
          <Nav className="ml-auto">
            <Form.Select value={context.locale} onChange={context.selectLanguage}>
              <option value='en'>English</option>
              <option value='es'>Español</option>
            </Form.Select>
          </Nav>
        </Navbar.Collapse>
      </Container>
    </Navbar>
  );
}