import React, { useContext } from 'react';

import Navbar from 'react-bootstrap/Navbar'
import NavDropdown from 'react-bootstrap/NavDropdown'
import Container from 'react-bootstrap/Container'
import Nav from 'react-bootstrap/Nav'
import { Context } from './LanguageWrapper'
import { FormattedMessage } from 'react-intl';
import Form from 'react-bootstrap/Form'
import paginationFactory, { PaginationProvider } from 'react-bootstrap-table2-paginator';


export default function Navigation(props) {
  const context = useContext(Context);

  return (
    <Navbar bg="light" expand="sm">
      <Container>
        <Navbar.Brand href="#home">InteraSoft</Navbar.Brand>
        <Navbar.Toggle aria-controls="basic-navbar-nav" />
        <Navbar.Collapse id="basic-navbar-nav">
          <Nav className="me-auto">
            <Nav.Link href="#home">
              <FormattedMessage
                id="navigation.home"
              />
            </Nav.Link>
            <NavDropdown title="Dropdown" id="basic-nav-dropdown">
              <NavDropdown.Item href="#action/3.1">Action</NavDropdown.Item>
              <NavDropdown.Item href="#action/3.2">Another action</NavDropdown.Item>
              <NavDropdown.Item href="#action/3.3">Something</NavDropdown.Item>
              <NavDropdown.Divider />
              <NavDropdown.Item href="#action/3.4">Separated link</NavDropdown.Item>
            </NavDropdown>
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