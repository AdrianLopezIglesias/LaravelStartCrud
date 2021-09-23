import React, { Component } from "react";
import { lettersToIcons } from "./Helpers/letterToIcons";

class GameState extends Component {
  constructor(props) {
    super(props);
  }


  render() {
    let c = this.props.status;
    let ex = this.props.last;
    console.log(ex)
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
                  <td>
                    <span className={ex[l] < 0 ? 'danger' : 'success'}>
                      {isNaN(ex[l]) ? "" : Math.round(ex[l] * 100) / 100}
                    </span>
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
export default GameState;
