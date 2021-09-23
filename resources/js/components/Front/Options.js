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
          return (
            <tr key={i}>
              <td>{lettersToIcons(l.math.objective)}</td>
              <td>{lettersToIcons(l.math.operation)}</td>
            </tr>
          )
        })}
      </tbody>

    let buttons

    let buttonsLost =
      <div>
        <p>Game lost</p>
        <Button onClick={() => this.props.resetGame()}>Play again</Button>
      </div>
    let ob = ""
    let op = ""
    if (this.props.logic[0]) {
      ob = lettersToIcons(this.props.logic[this.props.calculating[0]].math.objective)
      op = lettersToIcons(this.props.logic[this.props.calculating[0]].math.operation)
    }
    let checkingAnswer =
      <span className={this.props.calculating[1] > 0 ? "badge bg-success" : "badge bg-danger"}>
      <table className="table">
        <tbody>
        <tr>
        <td>{lettersToIcons(ob)}</td>
        
        <td>{lettersToIcons(op)}</td>
      </tr>
        </tbody>
      </table>
      </span>
    
    let buttonsPlay =
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
      ;
    switch (this.props.gameStatus) {
      case "play":
        buttons = buttonsPlay; 
        break;
      case "calculating":
        buttons = checkingAnswer
        break;
      case "lost":
        buttons = buttonsLost; 
        break;
    
      default:
        break;
    }


    return (
      <div>
        {buttons}
      </div>
    )
  }
}
