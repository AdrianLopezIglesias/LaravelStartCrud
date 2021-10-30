import React, { useContext } from 'react';
import Pacientes from './Pacientes'
import About from './About'
import Container from 'react-bootstrap/Container'
import Navigation from './Navigation'

import {BrowserRouter as Router,Switch,Route,} from "react-router-dom";

function Page() {
  return (
    <Router>
      <div>
				<Container>
					<Navigation />
					<br/>
					<br/>
					<br/>
            <Switch>
              <Route path="/contact">   
              </Route>
              <Route path="/">    
                <Pacientes />
              </Route>    
            </Switch>
          </Container>
      </div>
    </Router>
  );
}

export default Page;

