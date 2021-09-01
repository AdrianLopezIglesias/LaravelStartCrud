import React, { useContext} from 'react';
import ReactDOM from 'react-dom';
//components
import Page from './Front/Page';
import './index.css';


/* react-intl imports */
import { IntlProvider } from 'react-intl';
import LanguageWrapper from './LanguageWrapper'



import 'bootstrap/dist/css/bootstrap.min.css';

function App(props) {


  return (
      <div>
    <LanguageWrapper>
        <Page />
    </LanguageWrapper>
      </div>
  );
}

export default App;

if (document.getElementById('App')) {
  ReactDOM.render(<App />, document.getElementById('App'));
}
