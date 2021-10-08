import React, { Component } from 'react'
import Button from 'react-bootstrap/Button';
import { lettersToIcons } from "./Helpers/letterToIcons";
import Carousel from 'react-bootstrap/Carousel'

export default class OptionLogic extends Component {
  constructor(props) {
    super(props);
    this.state = {
      index: 0
    }
  }


  

  render() {
    let penal = this.props.penalization_value()
    let select = (a) => this.props.selectOption(a)
    let index = this.state.index
    let logic_ops = this.props.logic
    let handleSelect


    let logic =
      <div>
        <div className="w-100">
          <div>
            <Carousel interval={100000} variant="dark" indicators={false} controls={true} touch={false}>

              {
              logic_ops.map(function (k, x) {
                return (
                  <Carousel.Item key={x}>
                    <p>Opcion {x +1} de {logic_ops.length}</p>

                  <div id={"logicOption" + x} className="option-logic">
                    <div className="button-option border">
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
                    </div>
     
                  </Carousel.Item>

                )
              })}
      </Carousel>
          </div>
        </div>
      </div>
    return (
      <div>
        <p>Todas las opciones cuestan - {penal} a todo)</p>
        {logic}
      </div>
    )
  }
}