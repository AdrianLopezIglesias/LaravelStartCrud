import React, { Component } from "react";
import { create, all } from 'mathjs'
import GameState from './GameState'; 
import { logicGenerator } from "./Helpers/logic";
import Options from './Options'

const config = {}
const math = create(all, config)
var _ = require('lodash');

class Game extends Component {
  constructor(props) {
    super(props);
    this.state = {
      logic: [],
      core: this.initialVals,
      last: this.initialVals,
      gameStatus: 'play',
      survived: 0
    }
  }
  initialVals = { Z: 10, B: 10, C: 10, D: 10, E: 10, Y: 10, G: 10, H: 10, X: 10, J: 10 }
  componentDidMount() {
    this.setState({
      logic: logicGenerator()
    })
  }

  resetGame = () => {
    this.setState({
      logic: logicGenerator(),
      core: this.initialVals,
      gameStatus: 'play',
      survived: 0
    })
  }

  resolveOption() {
    let vals = {};
    let vols = {}; 
    _.forIn(this.state.core, function (value, key) {
      vals[key] = value; 
    });

    for (var i = 0; i < this.state.logic.length; i++) {
      let x = math.parse(this.state.logic[i].math.operation)
      let y = x.compile()
      let z = x.evaluate(vals)
      let n = 0
      if (vols[this.state.logic[i].math.objective]) {
        n =  (vols[this.state.logic[i].math.objective])
      }
      vals[this.state.logic[i].math.objective] = vals[this.state.logic[i].math.objective] + z
      vols[this.state.logic[i].math.objective] =   + z
      console.log(vols)
    }

    this.setState({
      core: vals,
      last: vols, 
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

  penalization_value = () => {
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

  selectOption = () => {
    this.penalization();
    this.resolveOption();
    this.setState({
      logic: logicGenerator()
    })
  }

  ignoreOption = () => {
    this.penalization();
    this.setState({
      logic: logicGenerator()
    })
  }

  render() {
    let c = this.state.core;
    let l = this.state.last;

    return (
      <div>
        <h2>Turnos: {this.state.survived}</h2>
        <GameState status={c} last={l}/>
        <Options
          logic={this.state.logic}
          gameStatus={this.state.gameStatus}
          penalization_value={this.penalization_value}
          selectOption={this.selectOption}
          ignoreOption={this.ignoreOption} />
      </div>
    );
  }

}

export default Game;