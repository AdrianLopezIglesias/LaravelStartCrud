import React, { useContext } from 'react';
import LanguageWrapper from '../LanguageWrapper'
import { Context } from '../LanguageWrapper'
import Game from './Game'

import Container from 'react-bootstrap/Container'

import {BrowserRouter as Router,Switch,Route,} from "react-router-dom";

function Page() {
  const context = useContext(Context);
  return (
    <Router>
      <div>
        <LanguageWrapper>
          {/* <Navigation context={context} /> */}
          <Container>
            <Switch>
                <Game />
  
              {/* <Route path="/skills">
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
              </Route>     */}
            </Switch>


          </Container>
        </LanguageWrapper>
      </div>
    </Router>
  );
}

export default Page;

