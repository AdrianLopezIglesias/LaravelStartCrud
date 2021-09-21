import React, { Component } from "react";
import { lettersToIcons } from "./Helpers/letterToIcons";

import Row from 'react-bootstrap/Row';


class Core extends Component {
  constructor(props) {
    super(props);
  }


  render() {
    let c = this.props.status;
    return (
      <div >
        <table className="table">
          <tbody>
            {Object.keys(this.props.status).map(function (l, i) {
              return (
                <tr key={i}>
                  <td>
                    {lettersToIcons(l)}
                  </td>
                  <td>
                    {Math.round(c[l] * 100) / 100}
                  </td>
                </tr>
              )
            })}
          </tbody>
        </table>
      </div>
    );
  }
}
export default Core;
