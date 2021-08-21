import React, { useContext } from 'react';

// import { FormattedMessage } from 'react-intl';
import { Context } from './LanguageWrapper'
import { FormattedMessage } from 'react-intl';

export default function About() {
  const context = useContext(Context);



  return (
    <section id="about">
      <h2><FormattedMessage id="app.header" values={{ name: 'React.js' }} /></h2>
      <FormattedMessage id="app.content" />
    </section>
  );
}