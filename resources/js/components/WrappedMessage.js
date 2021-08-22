import { FormattedMessage } from 'react-intl';
import React from 'react';


const WrappedMessage = props => {
  const { message } = props;

  // manually check if a translation exists for this message in the current (non-default) locale
  // this allows us to match the containing "lang" span when we fallback to the default locale
  let locale = "en";

  return (
    <span lang={locale}>
      {/* <FormattedMessage {...message}  /> */}
    </span>
  );
};

export default WrappedMessage;