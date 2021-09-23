import React, { Component } from "react";
import { create, all } from 'mathjs'
import GameState from './GameState';
import { logicGenerator } from "./Helpers/logic";
import Options from './Options'

const config = {}
const math = create(all, config)
var _ = require('lodash');
const timer = ms => new Promise(res => setTimeout(res, ms))

class Game extends Component {
  constructor(props) {
    super(props);
    this.state = {
      logic: [],
      core: this.initialVals,
      last: this.initialVals,
      gameStatus: 'play',
      survived: 0,
      calculating: [0, "Z"]
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
      survived: 0,
      calculating: [0, 0]
    })
  }


  async resolveOption(t) {

    await this.penalization();
    this.setState({ gameStatus: 'calculating' })
    let vals = {};
    let vols = this.state.last;
    _.forIn(this.state.core, function (value, key) {
      vals[key] = value;
    });

    for (var i = 0; i < this.state.logic[t].length; i++) {

      if (this.state.gameStatus != "lost") {
        let ob = this.state.logic[t][i].math.objective;
        let x = math.parse(this.state.logic[t][i].math.operation)
        let y = x.compile()
        let z = x.evaluate(vals)
        this.setState({ calculating: [i, z] })
        let n = 0
        if (vols[ob]) {
          n = (vols[ob])
        }
        vals[ob] = vals[ob] + z
        vols[ob] = + z
        this.setState({
          core: vals,
          last: vols,
        })

    console.log(this.state.calculating)
        await timer(1500); // 
      }
      this.checkLost(vals)
    }
    if (this.state.gameStatus != "lost") {
      this.setState({
        survived: this.state.survived + 1,
        gameStatus: 'play',
        calculating: [0, 0]
      })
    }

  }

  checkLost = (vals) => {
    let lost;
    _.forIn(vals, function (value, key) {
      if (value < 0) {
        lost = true;
      }
    })

    if (lost) {
      this.setState({ gameStatus: 'lost' })
    }
  }

  penalization_value = () => {
    return Math.round((this.state.survived / 8 + 0.5) * 10)/10
  }

  async penalization() {
    console.log("appliying penalization")
    let penalization_value = this.penalization_value();
    let vals = {};
    let vols = {};

    _.forIn(this.state.core, function (value, key) {
      vals[key] = value - penalization_value;
      vols[key] = -penalization_value;
    });
    this.setState({
      core: vals,
      survived: this.state.survived + 1,
      last: vols
    })
    this.checkLost(vals)
    await timer(500); // 

    }



  selectOption = async (x) => {
    await this.resolveOption(x);
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
        <GameState status={c} last={l} />
        <Options
          logic={this.state.logic}
          gameStatus={this.state.gameStatus}
          calculating={this.state.calculating}
          penalization_value={this.penalization_value}
          selectOption={this.selectOption}
          resetGame={this.resetGame}
          ignoreOption={this.ignoreOption} />
      </div>
    );
  }

}

export default Game;