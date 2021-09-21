import React, { Component } from "react";
import Row from 'react-bootstrap/Row';
import Button from 'react-bootstrap/Button';
import Col from 'react-bootstrap/Col';
import { create, all } from 'mathjs'
import Chance from 'chance';
import { cssNumber } from "jquery";
import Core from './Core';

const chance = new Chance();
const config = {}
const math = create(all, config)
var _ = require('lodash');
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faCoffee, faAddressCard, faAngry, faAtom, faBatteryHalf, faBiking, faBone, faBrain, faCar, faCarrot, faCat, faChurch, faChild   } from '@fortawesome/free-solid-svg-icons'
const reactStringReplace = require('react-string-replace');

function lettersToIcons(string) {
  string = reactStringReplace(string, 'Z', (match, i) => (< FontAwesomeIcon key={string} icon={faCoffee} />))
  string = reactStringReplace(string, 'B', (match, i) => (< FontAwesomeIcon key={string} icon={faAddressCard} />))
  string = reactStringReplace(string, 'C', (match, i) => (< FontAwesomeIcon key={string} icon={faChild} />))
  string = reactStringReplace(string, 'D', (match, i) => (< FontAwesomeIcon key={string} icon={faChurch} />))
  string = reactStringReplace(string, 'E', (match, i) => (< FontAwesomeIcon key={string} icon={faCat} />))
  string = reactStringReplace(string, 'Y', (match, i) => (< FontAwesomeIcon key={string} icon={faCarrot} />))
  string = reactStringReplace(string, 'G', (match, i) => (< FontAwesomeIcon key={string} icon={faBrain} />))
  string = reactStringReplace(string, 'H', (match, i) => (< FontAwesomeIcon key={string} icon={faBiking} />))
  string = reactStringReplace(string, 'X', (match, i) => (< FontAwesomeIcon key={string} icon={faAtom} />))
  string = reactStringReplace(string, 'J', (match, i) => (< FontAwesomeIcon key={string} icon={faBone} />))
  string = reactStringReplace(string, 'K', (match, i) => (< FontAwesomeIcon key={string} icon={faCar} />))
  return string;

}

class Book extends Component {
  constructor(props) {
    super(props);
    this.state = {
      logic: [],
      core: this.initialVals,
      gameStatus: 'play',
      survived: 0
    }
  }

  
  initialVals = { Z: 10, B: 10, C: 10, D: 10, E: 10, Y: 10, G: 10, H: 10, X: 10, J: 10 }

  resetGame() {
    this.setState({
      logic: this.logicGenerator(),
      core: this.initialVals,
      gameStatus: 'play',
      survived: 0
    })
  }

  componentDidMount() {
    this.setState({
      logic: this.logicGenerator()
    })
  }

  generateOption() {
    let o = {
      // word: chance.word(),
      math: this.mathGeneration()
    }
    return o;
  }

  mathGeneration() {
    function randomMultiplyer() {
      return Math.round(Math.log(_.random(101, 130)/100) * 100) / 100
       
    }
    let math
    let letras = "ZBCDEYGHXJ"
    function o0() {
      return chance.character({ pool: '+-' }) + " " + _.random(1, 10)
    }
    function o1() {
      return chance.character({ pool: '+-' }) + " " + chance.character({ pool: letras }) + " " + "*" + randomMultiplyer()
    }
    function o2() {
      return chance.character({ pool: '+-' }) + " " + _.random(1, 10)
    }
    function s0() {
      return {
      objective: chance.character({ pool: letras }),
        operation: o0(),
      }
    }
    function s1() {
      return {
      objective: chance.character({ pool: letras }),
        operation: o1(),
      }
    }
      function s2() {
        return {
          objective: chance.character({ pool: letras }),
          operation: chance.character({ pool: '+-' }) + " (" + o0() +" " + o1() + " )"
          
        }

    }
    function s3() {
      return {
      objective: chance.character({ pool: letras }),
      operation: chance.character({ pool: '+-' }) +" "+ chance.character({ pool: letras }) +" "+ "*" + randomMultiplyer()
      }
    }
    math = [s0(), s1(), s2(), s3()]
    math = _.shuffle(math);
    return math[0];


  }

  logicGenerator() {
    let data = _.times(_.random(3, 7), () => this.generateOption());

    return data;
  }

  resolveOption() {
    let vals = {};
    _.forIn(this.state.core, function (value, key) {
      vals[key] = value; 
    });

    for (var i = 0; i < this.state.logic.length; i++) {
      let x = math.parse(this.state.logic[i].math.operation)
      let y = x.compile()
      let z = x.evaluate(vals)
      vals[this.state.logic[i].math.objective] = vals[this.state.logic[i].math.objective] + z
    }

    this.setState({
      core: vals,
      survived: this.state.survived + 1
    })
    this.checkLost(vals)

  }

  checkLost = (vals) => {
    let lost; 
    _.forIn(vals, function (value, key) {
      if (value < 0) {
        lost = true;
      }
    })
    
    if (lost) {
        this.setState({gameStatus: 'lost'})}
  }

  penalization_value() {
  return this.state.survived / 10 + 0.3
  } 

  penalization() {
    let penalization_value = this.penalization_value(); 
    let vals = {};
    _.forIn(this.state.core, function (value, key) {
      vals[key] = value - penalization_value; 
    });
    this.setState({
      core: vals,
      survived: this.state.survived + 1
    })
    this.checkLost(vals)

  }

  selectOption() {
    this.penalization();
    this.resolveOption();
    this.setState({
      logic: this.logicGenerator()
    })
  }

  ignoreOption() {
    this.penalization();
    this.setState({
      logic: this.logicGenerator()
    })
  }



  render() {

    const icon1 = <i className="fa fa-coffe" />


    let c = this.state.core;
    const core = 
      <ul>
        {Object.keys(this.state.core).map(function (l, i) {
          return (
            <li key={i}>
              {lettersToIcons(l)}
            {Math.round(c[l] * 100) / 100}
          </li>
          )
        })}
      </ul>
    
    const logic =
      <tbody onClick={() => this.selectOption()}>
        {this.state.logic.map(function (l, i) {
          return <tr key={i}><td>{lettersToIcons(l.math.objective)}</td><td>{lettersToIcons(l.math.operation)}</td></tr>
        })}
      </tbody>


    let buttons = "";

    if (this.state.gameStatus == 'play') {
      buttons =
        <div>
          <div onClick={() => this.ignoreOption()} className="w-100 button-option" variant="outline-dark">Ignorar (- {this.penalization_value()} a todo)</div>
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
        <Button onClick={() => this.resetGame()}>Play again</Button>
      </div>
    }
    return (
      <div>
        <h2>Turnos: {this.state.survived}</h2>
        <Core status={this.state.core}/>
        {buttons}


      </div>
    );
  }

}

export default Book;