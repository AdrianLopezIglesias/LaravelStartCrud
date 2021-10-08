import React, { Component } from "react";
import { lettersToIcons } from "./Helpers/letterToIcons";
import Row from 'react-bootstrap/Row'
import Col from 'react-bootstrap/Col'

class GameState extends Component {
  constructor(props) {
    super(props);
  }

  render() {
    let c = this.props.status;
    let ex = this.props.last;

    let so = this.props.selectedOption
    let logic = this.props.logic
    let calc = this.props.calculating

    let ob = ""
    let vp = ""



    if (logic[so] && logic[so][calc[0]]) {
      ob = logic[so][calc[0]].math.objective
      vp = ex[ob]
    } else {
      ob = "Todo"
    }


    let currentClass

    let defineStyle = (l) => {
      let style
      if (l == calc[2]) {
        if (calc[1] > 0) {
          style =  "success"
        }
        else {
          style =  "danger"
        }
      }
      if (calc[0] == 99) {
        style = "danger"
      }
      return style
    }
  

    return (
        <Row >

          {Object.keys(this.props.status).map(function (l, i) {
            return (
              <Col key={i} className="p-2" xs={3}>
                <div className="pt-2 pb-2 border text-center button-option">
                  <span className={defineStyle(l)}>
                  {lettersToIcons(l)}
                </span>
                <br />
                  <span className={defineStyle(l)}>
                    {Math.round(c[l] * 100) / 100} {"  "}
                  </span>
                </div>

              </Col>
            )
          })}

        </Row>
    );
  }
}
export default GameState;
