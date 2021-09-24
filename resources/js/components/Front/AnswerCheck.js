import { cssNumber } from 'jquery';
import React, { Component } from 'react'
import { lettersToIcons } from "./Helpers/letterToIcons";

export default class OptionLogic extends Component {
  constructor(props) {
    super(props);
  }

  render() {
    let so = this.props.selectedOption
    let ob = ""
    let op = ""
    let logic = this.props.logic
    let calc = this.props.calculating


    if ([calc[0]] && [calc[0]] != 99) {
      ob = lettersToIcons(logic[so][calc[0]].math.objective)
      op = lettersToIcons(logic[so][calc[0]].math.operation)
    } else {
      ob = "Todo"
      op = "-" + this.props.penalization_value(); 
    }

   return (
     <span className={calc[1] > 0 ? "card border-success w-100" : "card border-danger w-100"}>
        <table className="table">
          <tbody>
           <tr>
             <td className={calc[1] > 0 ? "success  column-20" : "danger  column-20"}>{ob}</td>
             <td className={calc[1] > 0 ? "success  column-40" : "danger column-40"}>{op}</td>
            </tr>
          </tbody>
        </table>
      </span>
    )
  }
}