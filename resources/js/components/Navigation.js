import React, { useContext } from 'react';

import Navbar from 'react-bootstrap/Navbar'
import NavDropdown from 'react-bootstrap/NavDropdown'
import Container from 'react-bootstrap/Container'
import Nav from 'react-bootstrap/Nav'
import { Context } from './LanguageWrapper'
import { FormattedMessage } from 'react-intl';
import Form from 'react-bootstrap/Form'
import paginationFactory, { PaginationProvider } from 'react-bootstrap-table2-paginator';
import * as Scroll from 'react-scroll';
import { Link, Button, Element, Events, animateScroll as scroll, scrollSpy, scroller } from 'react-scroll'


export default function Navigation(props) {
  const context = useContext(Context);

  var Scroll = require('react-scroll');
  var Element = Scroll.Element;
  var scroller = Scroll.scroller;


  // Somewhere else, even another file
  scroller.scrollTo('myScrollToElement', {
    duration: 1500,
    delay: 100,
    smooth: true,
    containerId: 'ContainerElementID',
    offset: 50, // Scrolls to element + 50 pixels down the page
  })


  return (
    <Navbar fixed="top" bg="dark" variant="dark" expand="sm">
      <Container>
        <Navbar.Brand href="#home">InteraSoft</Navbar.Brand>
        <Navbar.Toggle aria-controls="basic-navbar-nav" />
        <Navbar.Collapse id="basic-navbar-nav">
          <Nav className="me-auto">

            <Link
              className="nav-link"
              activeClass="active"
              to="about"
              spy={true}
              smooth={true}
              offset={-70}
              duration={500}>
              <FormattedMessage id="navigation.about" />
            </Link>

            <Link
              className="nav-link"
              activeClass="active"
              to="skills"
              spy={true}
              smooth={true}
              offset={-70}
              duration={500}>
              <FormattedMessage id="navigation.skills"/>
            </Link>

            <Link
              className="nav-link"
              activeClass="active"
              to="projects"
              spy={true}
              smooth={true}
              offset={-70}
              duration={500}>
              <FormattedMessage id="navigation.projects" />
            </Link>
            <Link
              className="nav-link"
              activeClass="active"
              to="contact"
              spy={true}
              smooth={true}
              offset={-70}
              duration={500}>
              <FormattedMessage id="navigation.contact" />
            </Link>

            {/* <NavDropdown title="Dropdown" id="basic-nav-dropdown">
              <NavDropdown.Item href="#action/3.1">Action</NavDropdown.Item>
              <NavDropdown.Item href="#action/3.2">Another action</NavDropdown.Item>
              <NavDropdown.Item href="#action/3.3">Something</NavDropdown.Item>
              <NavDropdown.Divider />
              <NavDropdown.Item href="#action/3.4">Separated link</NavDropdown.Item>
            </NavDropdown> */}
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