import React, { useContext } from 'react';
import ReactDOM from 'react-dom';
//components
import About from './About';
import Navigation from './Navigation';
// import Contact from './Contact';
import Projects from './Projects';
import Skills from './Skills';
import Contact from './Contact';

/* react-intl imports */
import { IntlProvider } from 'react-intl';
import LanguageWrapper from './LanguageWrapper'
import { Context } from './LanguageWrapper'


import Container from 'react-bootstrap/Container'

//ROUTER
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";


function Page() {
  const context = useContext(Context);

  return (
    <Router>
      <div>
        <LanguageWrapper>
          <Navigation context={context} />
          <br />
          <Container>
          <Switch>
            <Route path="/about">
              <About />
            </Route>
            <Route path="/users">
              <Users />
            </Route>
            <Route path="/">
              <Home />
            </Route>
          </Switch>



            <br />
            <br />
            <Skills />
            <br />
            <br />
            <Projects />
            <br />
            <br />
            {/* <Stack /> */}
            <Contact />
            <br />
            <br />
          </Container>
        </LanguageWrapper>
      </div>
    </Router>
  );
}

export default Page;

