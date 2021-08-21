import React, { useContext} from 'react';
import ReactDOM from 'react-dom';
//components
import About from './About';
import Navigation from './Navigation';
// import Contact from './Contact';
// import Projects from './Projects';
// import Skills from './Skills';

/* react-intl imports */
import { IntlProvider } from 'react-intl';
import LanguageWrapper from './LanguageWrapper'
import {Context} from './LanguageWrapper'




function Page() {
  const context = useContext(Context);

  return (
      <div>
    <LanguageWrapper>
        <Navigation context={context}/>

        <About />
        {/* <Projects />
        <Skills />
        <Stack />
        <Contact /> */}
    </LanguageWrapper>
      </div>
  );
}

export default Page;

