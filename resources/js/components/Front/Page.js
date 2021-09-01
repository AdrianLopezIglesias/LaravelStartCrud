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
import LanguageWrapper from '../LanguageWrapper'
import { Context } from '../LanguageWrapper'


import Container from 'react-bootstrap/Container'

//ROUTER
import {
  BrowserRouter as Router,
  Switch,
  Route,
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
              <Route path="/skills">
                <Skills />
              </Route>        
              <Route path="/projects">
                <Projects />
              </Route>
              <Route path="/contact">   
                <Contact />
              </Route>
              <Route path="/">    
                <About />
              </Route>    
            </Switch>


          </Container>
        </LanguageWrapper>
      </div>
    </Router>
  );
}

export default Page;

