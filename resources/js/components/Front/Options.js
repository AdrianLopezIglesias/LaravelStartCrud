import React, { Component } from 'react'
import Button from 'react-bootstrap/Button';
import { lettersToIcons } from "./Helpers/letterToIcons";
import OptionLogic from './OptionLogic'

export default class Options extends Component {
  constructor(props) {
    super(props);
  }

  render() {
    // let penal = this.props.penalization_value()
    // let select = (a) => this.props.selectOption(a)
    // let logic =
    //   <div>
    //     {
    //       this.props.logic.map(function (k, x) {
    //         return (
    //           <div key={x}>
    //             <div className="button-option">
    //             <p>(- {penal} a todo)</p>
    //               <table className="table">
    //                 <tbody onClick={() => select(x)}>
    //                   {k.map(function (l, i) {
    //                     return (
    //                       <tr key={i}>
    //                         <td className="w-20">{lettersToIcons(l.math.objective)}</td>
    //                         <td>{lettersToIcons(l.math.operation)}</td>
    //                       </tr>
    //                     )
    //                   })
    //                   }
    //                 </tbody>
    //               </table>
    //             </div>
    //             <br />
    //             <br />
    //           </div>
    //         )
    //       })}
    //   </div>
    let logic = <OptionLogic
      penalization_value={this.props.penalization_value}
      selectOption={this.props.selectOption}
      logic={this.props.logic}
    />
    let buttons

    let buttonsLost =
      <div>
        <p>Game lost</p>
        <Button onClick={() => this.props.resetGame()}>Play again</Button>
      </div>
    let ob = ""
    console.log(this.props.calculating)
    let op = ""
    if (this.props.logic[0] && this.props.calculating[0] && this.props.logic[0][this.props.calculating[0]]) {
      ob = lettersToIcons(this.props.logic[0][this.props.calculating[0]].math.objective)
      op = lettersToIcons(this.props.logic[0][this.props.calculating[0]].math.operation)
    }
    let checkingAnswer =
      <span className={this.props.calculating[1] > 0 ? "badge bg-success w-100" : "badge bg-danger w-100"}>
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
        {/* <div onClick={() => this.props.ignoreOption()} className="w-100 button-option" variant="outline-dark">Ignorar (- {this.props.penalization_value()} a todo)</div>
        <br /> */}
        <br />
        <div className="w-100">
          {logic}
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
