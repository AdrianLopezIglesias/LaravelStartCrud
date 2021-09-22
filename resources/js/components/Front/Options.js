import React, { Component } from 'react'
import Button from 'react-bootstrap/Button';
import { lettersToIcons } from "./Helpers/letterToIcons";


export default class Options extends Component {
  constructor(props) {
    super(props);
  }


  render() {
    let logic =
      <tbody onClick={() => this.props.selectOption()}>
        {this.props.logic.map(function (l, i) {
          return <tr key={i}><td>{lettersToIcons(l.math.objective)}</td><td>{lettersToIcons(l.math.operation)}</td></tr>
        })}
      </tbody>


    let buttons = "";
    if (this.props.gameStatus == 'play') {
      buttons =
        <div>
          <div onClick={() => this.props.ignoreOption()} className="w-100 button-option" variant="outline-dark">Ignorar (- {this.props.penalization_value()} a todo)</div>
          <br />
          <br />
          <div className="w-100 button-option" variant="outline-dark">
            <table className="table">
              {logic}
            </table>
          </div>
        </div>
    } else {
      buttons = <div>
        <p>Game lost</p>
        <Button onClick={() => this.props.resetGame()}>Play again</Button>
      </div>
    }

    return (
      <div>
        {buttons}
      </div>
    )
  }
}
