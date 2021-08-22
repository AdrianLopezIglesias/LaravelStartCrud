import React, { useContext } from 'react';

// import { FormattedMessage } from 'react-intl';
import { Context } from './LanguageWrapper'
import { FormattedMessage } from 'react-intl';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';

export default function About() {
  const context = useContext(Context);



  return (
    <section id="about">
      <h2>
        <FormattedMessage id="about.header"/>
      </h2>
      <Row >
        <Col md={8}>
          <FormattedMessage id="about.content" />
          <ul>
            <li><FormattedMessage id="about.content.item1" />
            </li>
            <li><FormattedMessage id="about.content.item2" />
            </li>
            <li><FormattedMessage id="about.content.item3" />
            </li>
            <li><FormattedMessage id="about.content.item4" />
            </li>
          </ul>
        </Col>
        <Col md={4}>
          <img className="about-image" src="https://media-exp1.licdn.com/dms/image/C4D03AQGBCnVo7-fhMw/profile-displayphoto-shrink_800_800/0/1617415665189?e=1634774400&v=beta&t=OYWpRjOxe10c9084N2w7CuovRoMbhnHUiglIkgctQx4"></img>
        </Col>
      </Row>

      
    </section>
  );
}