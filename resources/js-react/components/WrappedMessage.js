import { FormattedMessage } from 'react-intl';
import React from 'react';

const WrappedMessage = props => {
  const { message } = props;
  let locale = "en";

  return (
    <span lang={locale}>
      <FormattedMessage {...message}  />
    </span>
  );
};

export default WrappedMessage;