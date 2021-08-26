import React, { useContext} from 'react';
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
import {Context} from './LanguageWrapper'


import Container from 'react-bootstrap/Container'

function Page() {
  const context = useContext(Context);

  return (
      <div>
      <LanguageWrapper>
        <Navigation context={context} />
        <br />
        <Container>
<br />
<br />
        <About />
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
  );
}

export default Page;

