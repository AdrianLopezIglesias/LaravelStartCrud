import React, { Component } from 'react'
import Button from 'react-bootstrap/Button';
import { lettersToIcons } from "./Helpers/letterToIcons";

export default class OptionLogic extends Component {
  constructor(props) {
    super(props);
  }

  render() {
    let penal = this.props.penalization_value()
    let select = (a) => this.props.selectOption(a)
    let logic =
      <div>
        {
          this.props.logic.map(function (k, x) {
            return (
              <div key={x}>
                <div className="button-option">
                  <p>(- {penal} a todo)</p>
                  <table className="table">
                    <tbody onClick={() => select(x)}>
                      {k.map(function (l, i) {
                        return (
                          <tr key={i}>
                            <td className="w-20">{lettersToIcons(l.math.objective)}</td>
                            <td>{lettersToIcons(l.math.operation)}</td>
                          </tr>
                        )
                      })
                      }
                    </tbody>
                  </table>
                </div>
                <br />
                <br />
              </div>
            )
          })}
      </div>
    return (
      <div>
    {logic}
      </div>
  )
  }
}